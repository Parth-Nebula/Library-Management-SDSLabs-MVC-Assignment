<?php
namespace Controller\Admin;
class BooksAddPage {
    public function get() 
    {
        echo \View\Loader::make()->render
        (  
            "templates/admin/Login.twig" ,
        );
    }
    public function post() 
    {   
        $session_status = \Controller\Admin\Session::check() ;
        if ( $session_status )
        {
            echo \View\Loader::make()->render
            (  
                "templates/admin/Addbooks.twig" ,
                 array
                (
                    "data" => "" ,
                )
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