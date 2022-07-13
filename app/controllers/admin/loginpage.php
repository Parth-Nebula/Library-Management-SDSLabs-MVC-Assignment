<?php
namespace Controller\Admin ;
class LoginPage 
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
        echo \View\Loader::make()->render
            (  
            "templates/user/Login.twig" ,
            );
    }
}