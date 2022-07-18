<?php
namespace Controller\User ;
class Session 
{
    public static function create ( $username )
    {
        session_start() ;
        if ( isset( $_SESSION["Username"] ) )
        {
            session_destroy() ;
            session_start() ;
        }
        $_SESSION["Username"] = $username ;
    }
    public static function check ()
    {
        session_start() ;
        if ( !isset( $_SESSION["Username"] ) )
        {
            session_destroy() ;
            return 0 ;
        }
        else
        {
            return 1 ;
        }
    }
    public static function destroy ()
    {
        session_destroy() ;
    }
}