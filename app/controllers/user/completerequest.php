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
        $session_status = \Controller\User\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $session_status )
        {
            $request = \Model\User\IssueRequests::userbook_all( $_POST["username"] , $_POST["booktitle"] ) ;
            if ( $request["status"] == 1 )
            {
                \Model\User\Books::book_update_quantityavailableplusone( $_POST["booktitle"] ) ;
            }
            \Model\User\IssueRequests::userbook_delete( $_POST["username"] , $_POST["booktitle"] ) ;
            $requestsmade = \Model\User\IssueRequests::user_all( $_POST["username"] ) ;
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