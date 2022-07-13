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
        $userdetails = \Model\User\Users::user_all($_POST["username"]) ;
        if ( !$userdetails )
        {
            echo \View\Loader::make()->render
            (
                "templates/user/Notuser.twig"
            );
        }
        else 
        {
            $password_and_salt = $_POST["password"] . $userdetails["salt"] ;
            $hash = base64_encode ( hash ( "sha256" , $password_and_salt , true ) ) ;
            if ( $userdetails["hashedsaltedpassword"] == $hash )
            {
                $temp_password = \Controller\User\Session::Create($_POST["username"]);
                echo \View\Loader::make()->render
                (
                    "templates/user/Loginsuccessful.twig",
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
                    "templates/user/wrongPassword.twig"
                );
            }
        }
    }
}