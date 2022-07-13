<?php
namespace Controller\User;
class Logout 
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
        $session_status = \Controller\User\Session::Check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $session_status )
        {
            \Controller\User\Session::End( $_POST["username"] ) ;
            echo \View\Loader::make()->render
            (  
                "templates/user/Logoutsuccessful.twig" ,
            );
        }
        else
        {
            echo \View\Loader::make()->render
            (  
                "templates/user/sessionTimeout.twig" ,
            );
        }
    }
}