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
        $sessionstatus = \Controller\Admin\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $sessionstatus )
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