<?php
namespace Controller\User;
class RequestBook {
    public function get() 
    {
        echo \View\Loader::make()->render
        (  
            "templates/user/Login.twig" ,
        );
    }
    public function post() 
    {   
        $session_status = \Controller\User\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $session_status )
        {
            \Model\User\IssueRequests::insert($_POST["username"] , $_POST["booktitle"]) ;
            $books = \Model\User\Books::all() ;
            $requests_made = \Model\User\IssueRequests::user_all( $_POST["username"] ) ;
            $issued_books = \Model\User\IssueRecords::user_all( $_POST["username"] ) ;
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