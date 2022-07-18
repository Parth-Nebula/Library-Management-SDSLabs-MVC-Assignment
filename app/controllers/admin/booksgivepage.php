<?php
namespace Controller\Admin;
class BooksGivePage {
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
            $givable_books = \Model\Admin\IssueRequests::status_one_all(); 
            echo \View\Loader::make()->render
            (  
                "templates/admin/Givebooks.twig" ,
                 array
                (
                    "givablebooks" => $givable_books ,
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