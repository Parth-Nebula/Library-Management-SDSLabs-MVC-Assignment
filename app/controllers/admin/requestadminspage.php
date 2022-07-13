<?php
namespace Controller\Admin;
class RequestAdminsPage {
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
            $requests = \Model\Admin\AdminRequests::all_username(); 
            $admins = \Model\Admin\Admins::all_username();
            echo \View\Loader::make()->render
            (  
                "templates/admin/Adminrequests.twig" ,
                 array
                (
                    "requests" => $requests ,
                    "admins" => $admins ,
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