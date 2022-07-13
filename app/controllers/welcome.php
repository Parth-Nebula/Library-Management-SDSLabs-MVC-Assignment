<?php
namespace Controller ;
class Welcome 
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