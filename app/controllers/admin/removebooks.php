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
        $session_status = \Controller\Admin\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $session_status )
        {
            $book = \Model\Admin\Books::book_all ( $_POST["booktitle"] ) ;
             if ( $book["quantityavailable"] >= $_POST["quantityfilled"]  and  $book["quantity"] > $_POST["quantityfilled"] )
            {
                \Model\Admin\Books::book_update_quantity ( $_POST["booktitle"] , "-".$_POST["quantityfilled"] ) ;
                \Model\Admin\Books::book_update_quantityavailable ( $_POST["booktitle"] , "-".$_POST["quantityfilled"] ) ;
            }
            else if ( $book["quantityavailable"] == $_POST["quantityfilled"]  and  $book["quantity"] == $_POST["quantityfilled"] )
            {
                \Model\Admin\Books::book_delete ( $_POST["booktitle"] ) ;
            }
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