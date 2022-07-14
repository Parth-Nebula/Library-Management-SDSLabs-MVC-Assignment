<?php
namespace Controller\Admin;
class AddBooks {
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
        $success_status = "" ;
        if ( $session_status )
        {
            $book = \Model\Admin\Books::book_all ( $_POST["booktitle"] ) ;
            if ( $book )
            {
                \Model\Admin\Books::book_update_quantity ( $_POST["booktitle"] , $_POST["quantity"] ) ;
                \Model\Admin\Books::book_update_quantity_available ( $_POST["booktitle"] , $_POST["quantity"] ) ;
                $success_status = "Successfully Added" ;
            }
            else
            {
                \Model\Admin\Books::insert ( $_POST["booktitle"] , $_POST["quantity"] ) ;
                $success_status = "Successfully Added" ;
            }
            echo \View\Loader::make()->render
            (  
                "templates/admin/Addbooks.twig" ,
                 array
                (
                    "data" => $success_status ,
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