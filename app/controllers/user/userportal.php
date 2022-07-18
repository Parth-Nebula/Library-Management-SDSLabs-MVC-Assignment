<?php
namespace Controller\User;
class UserPortal {
    public function get() 
    {
        echo \View\Loader::make()->render
        (  
            "templates/user/Login.twig" ,
        );
    }
    public function post() 
    {   
        $session_status = \Controller\User\Session::check() ;
        if ( $session_status )
        {
            echo \View\Loader::make()->render
            (  
                "templates/user/Portal.twig" ,
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