<?php
namespace Controller\Admin;
class RequestIssuePage {
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