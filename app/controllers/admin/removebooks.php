<?php
namespace Controller\Admin;
class RemoveBooks {
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
            if ( is_numeric($_POST["QuantityFilled"]) and  (int)$_POST["QuantityFilled"] >= 0 ) 
            {
                    $book = \Model\Admin\Books::book_all ( $_POST["BookTitle"] ) ;
                    if ( $book["QuantityAvailable"] >= $_POST["QuantityFilled"]  and  $book["Quantity"] > $_POST["QuantityFilled"] )
                    {
                        \Model\Admin\Books::book_update_Quantity ( $_POST["BookTitle"] , "-".$_POST["QuantityFilled"] ) ;
                        \Model\Admin\Books::book_update_Quantity_available ( $_POST["BookTitle"] , "-".$_POST["QuantityFilled"] ) ;
                        $success_status = "Removal Successful" ; 
                    }
                    else if ( $book["QuantityAvailable"] == $_POST["QuantityFilled"]  and  $book["Quantity"] == $_POST["QuantityFilled"] )
                    {
                        \Model\Admin\Books::book_delete ( $_POST["BookTitle"] ) ;
                        $success_status = "Removal Successful" ; 
                    }
                    else
                    {
                        $success_status = "Removal Failed" ;
                    }
            }
            else
            {
                $success_status = "Removal Failed" ;
            }
            $books = \Model\Admin\Books::all() ; 
            echo \View\Loader::make()->render
            (  
                "templates/admin/Removebooks.twig" ,
                 array
                (
                    "books" => $books ,
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