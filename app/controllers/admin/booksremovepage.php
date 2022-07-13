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
        $sessionstatus = \Controller\Admin\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $sessionstatus )
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