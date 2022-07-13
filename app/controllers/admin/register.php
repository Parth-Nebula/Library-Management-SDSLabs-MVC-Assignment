<?php
namespace Controller\Admin ;
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
        for ( $i = 0 ; $i < strlen( $_POST["username"]) ; $i++ )
        {
            if ( $_POST["username"][$i] == " " )
            {
                echo \View\Loader::make()->render
                (  
                "templates/admin/spaceInusername.twig" ,
                );
                $flag = 1 ;
                break ;
            }
        }
        if ( strlen( $_POST["password"]) < 8 and $flag == 0)
        {
            echo \View\Loader::make()->render
            (  
            "templates/admin/shortPassword.twig" ,
            );
            $flag = 2 ;
        }
        else if ( $flag == 0 ) 
        {
            $admins = \Model\Admin\Admins::admin_all ( $_POST["username"] ) ;
            if ( $admins )
            {
                echo \View\Loader::make()->render
                (  
                "templates/admin/Alreadyexists.twig" ,
                );
            }
            else
            {
                $some_Random_salt_Number = rand ( 1E+10 , 9E+10 ) ;
                $some_Random_salt = (string)$some_Random_salt_Number ;
                $password_and_salt = $_POST["password"] . $some_Random_salt ;
                $some_hash = base64_encode ( hash ( "sha256" , $password_and_salt , true ) ) ;
                \Model\Admin\AdminRequests::insert ( $_POST["username"] , $some_hash , $some_Random_salt ) ;
                echo \View\Loader::make()->render
                (  
                    "templates/admin/Registrationsuccessful.twig" ,
                );
            }
        }
    }
}