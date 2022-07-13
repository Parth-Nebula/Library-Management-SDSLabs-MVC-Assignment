<?php
namespace Controller\User;
class RequestedBooksPage {
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
            $requests_made = \Model\User\IssueRequests::user_all( $_POST["username"] ) ;
            echo \View\Loader::make()->render
            (  
                "templates/user/Requestedbooks.twig" ,
                array
                (
                    "requestsmade" => $requests_made ,
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