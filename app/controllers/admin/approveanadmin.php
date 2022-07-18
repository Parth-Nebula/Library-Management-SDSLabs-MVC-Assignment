<?php
namespace Controller\Admin;
class ApproveAnAdmin {
    public function get() 
    {
        echo \View\Loader::make()->render
        (  
            "templates/admin/Login.twig" ,
        );
    }
    public function post() 
    {
        $session_status = \Controller\Admin\Session::check() ;
        if ( $session_status )
        {
            if ( $_POST["Action"] == 1)
            {
                if ( ! ( \Model\Admin\Admins::admin_all( $_POST["AdminUsername"] ) ) )
                {
                    \Model\Admin\Admins::insert($_POST["AdminUsername"]) ;
                }
                \Model\Admin\AdminRequests::admin_delete( $_POST["AdminUsername"]) ;
            }
            else if ( $_POST["Action"] == 2 )
            {
                \Model\Admin\AdminRequests::admin_delete( $_POST["AdminUsername"]) ;
            }
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