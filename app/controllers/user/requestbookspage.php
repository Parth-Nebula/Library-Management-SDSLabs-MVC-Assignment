<?php
namespace Controller\User;
class RequestBooksPage {
    public function get() 
    {
        echo \View\Loader::make()->render
        (  
            "templates/user/Login.twig" ,
        );
    }
    public function post() 
    {
        $session_status = \Controller\User\Session::check() ;
        if ( $session_status )
        {
            $books = \Model\User\Books::all() ;
            $requests_made = \Model\User\IssueRequests::user_all( $_SESSION["Username"] ) ;
            $issued_books = \Model\User\IssueRecords::user_all( $_SESSION["Username"] ) ;
            echo \View\Loader::make()->render
            (  
                "templates/user/Requestbooks.twig" ,
                array
                (
                    "books" => $books ,
                    "requestsmade" => $requests_made ,
                    "issuedbooks" => $issued_books ,
                )
            );
        }
        else
        {
            echo \View\Loader::make()->render
            (  
                "templates/user/sessionTimeout.twig" ,
            );
        }
    }
}