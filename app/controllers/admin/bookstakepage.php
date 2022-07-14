<?php
namespace Controller\Admin;
class BooksTakePage {
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
            $return_requests = \Model\Admin\ReturnRequests::all() ; 
            echo \View\Loader::make()->render
            (  
                "templates/admin/Takebooks.twig" ,
                 array
                (
                    "takebooks" => $return_requests ,
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