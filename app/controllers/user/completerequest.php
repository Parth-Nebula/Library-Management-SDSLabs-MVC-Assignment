<?php
namespace Controller\User;
class CompleteRequest {
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
            $request = \Model\User\IssueRequests::user_book_all( $_SESSION["Username"] , $_POST["BookTitle"] ) ;
            if ( $request["Status"] == 1 )
            {
                \Model\User\Books::book_update_quantity_available_plus_one( $_POST["BookTitle"] ) ;
            }
            \Model\User\IssueRequests::user_book_delete( $_SESSION["Username"] , $_POST["BookTitle"] ) ;
            $requestsmade = \Model\User\IssueRequests::user_all( $_SESSION["Username"] ) ;
            echo \View\Loader::make()->render
            (  
                "templates/user/Requestedbooks.twig" ,
                array
                (
                    "requestsmade" => $requestsmade ,
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