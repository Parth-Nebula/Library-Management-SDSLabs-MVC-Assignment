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
        $session_status = \Controller\User\Session::check( $_POST["username"] , $_POST["temppassword"] ) ;
        if ( $session_status )
        {
            $user_info = \Model\User\Users::user_all($_POST["username"]) ;
            $books_issued = \Model\User\History::user_all( $_POST["username"] ) ;
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