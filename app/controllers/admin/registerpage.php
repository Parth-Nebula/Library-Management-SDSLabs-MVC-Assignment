<?php
namespace Controller\Admin ;
class RegisterPage 
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
        echo \View\Loader::make()->render
            (  
            "templates/admin/Register.twig" ,
            );
    }
}