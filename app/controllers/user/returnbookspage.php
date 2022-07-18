<?php
namespace Controller\User;
class ReturnBooksPage {
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
            $issue_records_and_return_requests = \Model\User\Joins::issue_records_return_requests($_SESSION["Username"]) ;
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