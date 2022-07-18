<?php
namespace Controller\User ;
class Login 
{
    public function get() 
    {
        echo \View\Loader::make()->render
        (  
            "templates/user/Login.twig" ,
        );
    }
    public function post() 
    {
        $user_details = \Model\User\Users::user_all($_POST["Username"]) ;
        if ( !$user_details )
        {
            echo \View\Loader::make()->render
            (
                "templates/user/Notuser.twig"
            );
        }
        else 
        {
            $password_and_salt = $_POST["Password"] . $user_details["Salt"] ;
            $hash = base64_encode ( hash ( "sha256" , $password_and_salt , true ) ) ;
            if ( $user_details["HashedSaltedPassword"] == $hash )
            {
                \Controller\User\Session::create($_POST["Username"]);
                echo \View\Loader::make()->render
                (
                    "templates/user/Loginsuccessful.twig",
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
                    "templates/user/wrongPassword.twig"
                );
            }
        }
    }
}