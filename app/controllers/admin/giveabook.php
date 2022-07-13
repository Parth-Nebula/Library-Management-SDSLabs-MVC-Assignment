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
        $sessionstatus = \Controller\Admin\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $sessionstatus )
        {
            $issuerequest = \Model\Admin\IssueRequests::clientbookstatusone_all( $_POST["clientname"] , $_POST["booktitle"] ) ;
            if ( $issuerequest )
            {
                \Model\Admin\IssueRecords::insert( $_POST["booktitle"] , $_POST["clientname"] , $issuerequest["requestdate"] , $issuerequest["replydate"] ) ;
                \Model\Admin\IssueRequests::clientbookstatusone_delete ( $_POST["clientname"] , $_POST["booktitle"] ) ;
            }
            $givablebooks = \Model\Admin\IssueRequests::statusone_all(); 
            echo \View\Loader::make()->render
            (  
                "templates/admin/Givebooks.twig" ,
                 array
                (
                    "givablebooks" => $givablebooks ,
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