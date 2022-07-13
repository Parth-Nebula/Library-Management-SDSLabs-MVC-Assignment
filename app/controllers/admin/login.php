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
        $user_details = \Model\Admin\Admins::admin_all($_POST["username"]) ;
        if ( !$user_details )
        {
            $request_details = \Model\Admin\AdminRequests::admin_all( $_POST["username"] ) ;
            if ( $request_details )
            {
                $password_and_salt = $_POST["password"] . $request_details["salt"] ;
                $hash = base64_encode ( hash ( "sha256" , $password_and_salt , true ) ) ;
                if ( $request_details["hashedsaltedpassword"] == $hash )
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
            $password_and_salt = $_POST["password"] . $user_details["salt"] ;
            $hash = base64_encode ( hash ( "sha256" , $password_and_salt , true ) ) ;
            if ( $user_details["hashedsaltedpassword"] == $hash )
            {
                $temp_password = \Controller\Admin\Session::Create($_POST["username"]);
                echo \View\Loader::make()->render
                (
                    "templates/admin/Loginsuccessful.twig",
                    array
                    (
                        "username" => $_POST["username"] ,
                        "tempPassword" => $temp_password ,
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