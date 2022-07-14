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
        $session_status = \Controller\Admin\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $session_status )
        {
            $issue_request = \Model\Admin\IssueRequests::clientbookstatusone_all( $_POST["clientname"] , $_POST["booktitle"] ) ;
            if ( $issue_request )
            {
                \Model\Admin\IssueRecords::insert( $_POST["booktitle"] , $_POST["clientname"] , $issue_request["requestdate"] , $issue_request["replydate"] ) ;
                \Model\Admin\IssueRequests::clientbookstatusone_delete ( $_POST["clientname"] , $_POST["booktitle"] ) ;
            }
            $givable_books = \Model\Admin\IssueRequests::statusone_all(); 
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