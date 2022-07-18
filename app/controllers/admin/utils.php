<?php
namespace Controller\Admin ;
class Session 
{
    public static function create ( $adminname )
    {
        session_start() ;
        if ( isset( $_SESSION["AdminName"] ) )
        {
            session_destroy() ;
            session_start() ;
        }
        $_SESSION["AdminName"] = $adminname ;
    }
    public static function check ()
    {
        session_start() ;
        if ( !isset( $_SESSION["AdminName"] ) )
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