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
        $session_status = \Controller\Admin\Session::check() ;
        if ( $session_status )
        {
            if ( $_POST["Action"] == 1 ) 
            {
                $issue_data = \Model\Admin\Joins::issue_records_return_requests( $_POST["ClientName"] , $_POST["BookTitle"] ) ;
                if ( $issue_data )
                {
                    \Model\Admin\History::insert( $issue_data["Title"] , $issue_data["Username"] , $issue_data["RequestDate"] , $issue_data["AcceptDate"] , $issue_data["IssueDate"] , $issue_data["ReturnDate"] ) ;
                    \Model\Admin\IssueRecords::client_book_delete ( $issue_data["Username"] , $issue_data["Title"] ) ;
                    \Model\Admin\ReturnRequests::client_book_delete ( $issue_data["Username"] , $issue_data["Title"] ) ;
                    \Model\Admin\Books::book_update_quantity_available_plus_one( $issue_data["Title"] ) ;
                    $issue_date = new \DateTime($issue_data["IssueDate"]);
                    $return_date = new \DateTime($issue_data["ReturnDate"]);
                    $interval = $issue_date->diff($return_date);
                    $days = $interval->days ;
                    if ( $days > 7 )
                    {
                        $days = $days - 7 ;
                        \Model\Admin\Users::client_update_fine( $issue_data["Username"] , $days ) ;
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
            else if ( $_POST["Action"] == 2 )
            {
                \Model\Admin\ReturnRequests::client_book_delete ( $_POST["ClientName"] , $_POST["BookTitle"] ) ;
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