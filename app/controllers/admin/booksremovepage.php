<?php
namespace Controller\Admin;
class BooksRemovePage {
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
            $books = \Model\Admin\Books::all() ; 
            echo \View\Loader::make()->render
            (  
                "templates/admin/Removebooks.twig" ,
                 array
                (
                    "books" => $books ,
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