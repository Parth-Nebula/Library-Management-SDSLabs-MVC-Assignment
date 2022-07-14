<?php
namespace Controller\Admin;
class ActOnARequest 
{
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
            $request = \Model\Admin\IssueRequests::clientbook_all( $_POST["clientname"] , $_POST["booktitle"] ) ;
            if ( $request )
            {
                if ( $_POST["action"] == 1 )
                {
                    if ( $request["status"] == 2 or $request["status"] == 0 )
                    {
                        \Model\Admin\Books::book_update_quantityavailableminusone( $_POST["booktitle"] ) ;
                        \Model\Admin\IssueRequests::clientbook_update_statusone ( $_POST["clientname"] , $_POST["booktitle"] ) ;
                    }
                }
                else if ( $_POST["action"] == 2)
                {
                    if ( $request["status"] == 1 )
                    {
                        \Model\Admin\Books::book_update_quantityavailableplusone( $_POST["booktitle"] ) ;
                        \Model\Admin\IssueRequests::clientbook_update_statustwo ( $_POST["clientname"] , $_POST["booktitle"] ) ; 
                    }
                    if ( $request["status"] == 0 )
                    {
                        \Model\Admin\IssueRequests::clientbook_update_statustwo ( $_POST["clientname"] , $_POST["booktitle"] ) ;
                    }
                }
            }
            $requested_books_with_amount = \Model\Admin\Joins::issuerequests_books();
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