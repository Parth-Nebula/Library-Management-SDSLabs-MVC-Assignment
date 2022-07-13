<?php
namespace Controller\Admin ;
class Session 
{
    public static function create ( $adminname )
    {
        $some_random_password_number = rand ( 1E+10 , 9E+10 ) ;
        $some_random_password = (string)$some_random_password_number ;
        $some_random_salt_number = rand ( 1E+10 , 9E+10 ) ;
        $some_random_salt = (string)$some_random_salt_number ;
        $some_random_password_and_some_random_salt = $some_random_password . $some_random_salt ;
        $some_random_hash = base64_encode ( hash ( "sha256" , $some_random_password_and_some_random_salt , true ) ) ;
        \Model\Admin\SessionMaintainerAdmin::admin_delete( $adminname ) ;
        \Model\Admin\SessionMaintainerAdmin::insert( $adminname , $some_random_hash , $some_random_salt ) ;
        return $some_random_password ;
    }
    public static function check ( $adminname , $temp_password )
    {
        $session_data = \Model\Admin\SessionMaintainerAdmin::admin_all( $adminname ) ;
        if ( !$session_data )
        {
            return 0 ;
        }
        $temp_password_and_salt = $temp_password . $session_data["salt"] ;
        $some_random_hash = base64_encode ( hash ( "sha256" , $temp_password_and_salt , true ) ) ;
        if ( $some_random_hash == $session_data["hashedsaltedtemppassword"] )
        {
            return 1 ;
        }
        else
        {
            return 0 ;
        }
    }
    public static function destroy ( $adminname )
    {
        \Model\Admin\SessionMaintainerAdmin::admin_delete( $adminname ) ;
    }
}