<?php
namespace Controller\User ;
class Register 
{
    public function get() 
    {
        echo \View\Loader::make()->render
            (  
            "templates/admin/Register.twig" ,
            );
    }
    public function post() 
    {
        $flag = 0 ;
        for ( $i = 0 ; $i < strlen( $_POST["Username"]) ; $i++ )
        {
            if ( $_POST["Username"][$i] == " " )
            {
                echo \View\Loader::make()->render
                (  
                "templates/user/spaceInUsername.twig" ,
                );
                $flag = 1 ;
                break ;
            }
        }
        if ( strlen( $_POST["Password"]) < 8 and $flag == 0)
        {
            echo \View\Loader::make()->render
            (  
            "templates/user/shortPassword.twig" ,
            );
            $flag = 2 ;
        }
        else if ( $flag == 0 ) 
        {
            $admins = \Model\User\Users::user_all ( $_POST["Username"] ) ;
            if ( $admins )
            {
                echo \View\Loader::make()->render
                (  
                "templates/user/Alreadyexists.twig" ,
                );
            }
            else
            {
                $some_random_salt_number = rand ( 1E+10 , 9E+10 ) ;
                $some_random_salt = (string)$some_random_salt_number ;
                $password_and_salt = $_POST["Password"] . $some_random_salt ;
                $some_hash = base64_encode ( hash ( "sha256" , $password_and_salt , true ) ) ;
                \Model\User\Users::insert ( $_POST["Username"] , $some_hash , $some_random_salt ) ;
                echo \View\Loader::make()->render
                (  
                    "templates/user/Registrationsuccessful.twig" ,
                );
            }
        }
    }
}