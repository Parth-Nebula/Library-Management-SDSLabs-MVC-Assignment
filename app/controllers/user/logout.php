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
        $session_status = \Controller\User\Session::Check() ;
        if ( $session_status )
        {
            \Controller\User\Session::destroy( $_SESSION["Username"] ) ;
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