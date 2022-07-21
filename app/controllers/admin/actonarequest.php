<?php
namespace Controller\Admin;
class ActOnARequest 
{
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
            $request = \Model\Admin\IssueRequests::client_book_all( $_POST["ClientName"] , $_POST["BookTitle"] ) ;
            if ( $request )
            {
                if ( $_POST["Action"] == 1 )
                {
                    $books_available = \Model\Admin\Books::book_all( $_POST["BookTitle"] ) ;
                    if ( ( $request["Status"] == 2 or $request["Status"] == 0 ) and ($books_available["QuantityAvailable"] != 0 ) )
                    {
                        \Model\Admin\Books::book_update_quantity_available_minus_one( $_POST["BookTitle"] ) ;
                        \Model\Admin\IssueRequests::client_book_update_status_one ( $_POST["ClientName"] , $_POST["BookTitle"] ) ;
                    }
                }
                else if ( $_POST["Action"] == 2)
                {
                    if ( $request["Status"] == 1 )
                    {
                        \Model\Admin\Books::book_update_quantity_available_plus_one( $_POST["BookTitle"] ) ;
                        \Model\Admin\IssueRequests::client_book_update_status_two ( $_POST["ClientName"] , $_POST["BookTitle"] ) ; 
                    }
                    if ( $request["Status"] == 0 )
                    {
                        \Model\Admin\IssueRequests::client_book_update_status_two ( $_POST["ClientName"] , $_POST["BookTitle"] ) ;
                    }
                }
            }
            $requested_books_with_amount = \Model\Admin\Joins::issue_requests_books();
            echo \View\Loader::make()->render
            (  
                "templates/admin/Issuesrequest.twig" ,
                 array
                (
                    "issuesrequest" => $requested_books_with_amount ,
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