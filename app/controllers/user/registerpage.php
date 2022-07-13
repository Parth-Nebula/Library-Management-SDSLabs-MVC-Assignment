<?php
namespace Controller\User ;
class RegisterPage 
{
    public function get() 
    {
        echo \View\Loader::make()->render
            (  
            "templates/user/Register.twig" ,
            );
    }
    public function post() 
    {
        echo \View\Loader::make()->render
            (  
            "templates/user/Register.twig" ,
            );
    }
}