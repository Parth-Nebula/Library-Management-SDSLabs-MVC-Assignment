<?php
namespace Controller\Admin;
class GiveABook {
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
            $issue_request = \Model\Admin\IssueRequests::client_book_status_one_all( $_POST["ClientName"] , $_POST["BookTitle"] ) ;
            if ( $issue_request )
            {
                \Model\Admin\IssueRecords::insert( $_POST["BookTitle"] , $_POST["ClientName"] , $issue_request["RequestDate"] , $issue_request["ReplyDate"] ) ;
                \Model\Admin\IssueRequests::client_book_status_one_delete ( $_POST["ClientName"] , $_POST["BookTitle"] ) ;
            }
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