<?php
namespace Controller\Admin;
class Logout {
    public function get() 
    {
        echo \View\Loader::make()->render
        (  
            "templates/admin/Login.twig" ,
        );
    }
    public function post() 
    {   
        $session_status = \Controller\Admin\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $session_status )
        {
            \Controller\Admin\Session::destroy( $_POST["username"] ) ;
            echo \View\Loader::make()->render
            (  
                "templates/user/Logoutsuccessful.twig" ,
            );
        }
        else
        {
            echo \View\Loader::make()->render
            (  
                "templates/admin/sessionTimeout.twig" ,
            );
        }
    }
}