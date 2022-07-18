<?php
namespace Controller\User;
class HistoryPage {
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
            $user_info = \Model\User\Users::user_all($_SESSION["Username"]) ;
            $books_issued = \Model\User\History::user_all( $_SESSION["Username"] ) ;
            echo \View\Loader::make()->render
            (  
                "templates/user/History.twig" ,
                array
                (
                    "userinfo" => $user_info ,
                    "booksissued" => $books_issued ,
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