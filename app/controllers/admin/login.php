<?php
namespace Controller\Admin ;
class Login 
{
    public function get() 
    {
        echo \View\Loader::make()->render
        (  
            "templates/admin/Login.twig" ,
        );
    }
    public function post() 
    {   
        $user_details = \Model\Admin\Admins::admin_all($_POST["Username"]) ;
        if ( !$user_details )
        {
            $request_details = \Model\Admin\AdminRequests::admin_all( $_POST["Username"] ) ;
            if ( $request_details )
            {
                $password_and_salt = $_POST["Password"] . $request_details["Salt"] ;
                $hash = base64_encode ( hash ( "sha256" , $password_and_salt , true ) ) ;
                if ( $request_details["HashedSaltedPassword"] == $hash )
                {
                    echo \View\Loader::make()->render
                    (
                        "templates/admin/notAcceptedyet.twig"
                    );
                }
                else
                {
                    echo \View\Loader::make()->render
                    (
                        "templates/admin/Notadmin.twig"
                    );
                }
            }
            else 
            {
                echo \View\Loader::make()->render
                (
                    "templates/admin/Notadmin.twig"
                );
            }
        }
        else 
        {
            $password_and_salt = $_POST["Password"] . $user_details["Salt"] ;
            $hash = base64_encode ( hash ( "sha256" , $password_and_salt , true ) ) ;
            if ( $user_details["HashedSaltedPassword"] == $hash )
            {
                \Controller\Admin\Session::create($_POST["Username"]);
                echo \View\Loader::make()->render
                (
                    "templates/admin/Loginsuccessful.twig",
                    array
                    (
                        "username" => $_POST["Username"] ,
                    )
                );
            }
            else 
            {
                echo \View\Loader::make()->render
                (
                    "templates/admin/wrongPassword.twig"
                );
            }
        }
    }
}