<?php
namespace Controller\User ;
class LoginPage 
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
        echo \View\Loader::make()->render
            (  
            "templates/user/Login.twig" ,
            );
    }
}