<?php
namespace Controller\Admin;
class TakeABook  {
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
            if ( $_POST["action"] == 1 ) 
            {
                $issue_data = \Model\Admin\Joins::issue_records_return_requests( $_POST["clientname"] , $_POST["booktitle"] ) ;
                if ( $issue_data )
                {
                    \Model\Admin\History::insert( $issue_data["title"] , $issue_data["username"] , $issue_data["requestdate"] , $issue_data["acceptdate"] , $issue_data["issuedate"] , $issue_data["returndate"] ) ;
                    \Model\Admin\IssueRecords::client_book_delete ( $issue_data["username"] , $issue_data["title"] ) ;
                    \Model\Admin\ReturnRequests::client_book_delete ( $issue_data["username"] , $issue_data["title"] ) ;
                    \Model\Admin\Books::book_update_quantity_available_plus_one( $issue_data["title"] ) ;
                    $issue_date = new \DateTime($issue_data["issuedate"]);
                    $return_date = new \DateTime($issue_data["returndate"]);
                    $interval = $issue_date->diff($return_date);
                    $days = $interval->days ;
                    if ( $days > 7 )
                    {
                        $days = $days - 7 ;
                        \Model\Admin\Users::client_update_fine( $issue_data["username"] , $days ) ;
                    }
                }
                else
                {
                    echo \View\Loader::make()->render
                    (  
                        "templates/admin/sessionTimeout.twig" ,
                    );
                }
            }
            else if ( $_POST["action"] == 2 )
            {
                \Model\Admin\ReturnRequests::client_book_delete ( $_POST["clientname"] , $_POST["booktitle"] ) ;
            }
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