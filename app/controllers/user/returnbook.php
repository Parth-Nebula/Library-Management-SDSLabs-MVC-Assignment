<?php
namespace Controller\User;
class ReturnBook {
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
            \Model\User\ReturnRequests::insert( $_POST["username"] , $_POST["title"]) ;
            $issue_records_and_return_requests = \Model\User\Joins::issuerecords_returnrequests($_POST["username"]) ;
            echo \View\Loader::make()->render
            (  
                "templates/user/Returnbooks.twig" ,
                array
                (
                    "userReturnbooks" => $issue_records_and_return_requests ,
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