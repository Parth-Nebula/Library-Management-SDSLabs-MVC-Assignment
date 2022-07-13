<?php
namespace Model\User ;
class SessionMaintainer 
{
    public static function insert ( $username , $someRandomhash , $someRandomsalt )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO sessionmaintainer (username, hashedsaltedtemppassword, salt) values ( ? , ? , ? ) " ) ;
        $stmt->execute([ $username , $someRandomhash , $someRandomsalt ]) ;
    }
    public static function user_all ( $username )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM sessionmaintainer WHERE username = ? ");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        return $row ;
    }
    public static function user_delete ( $username )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" DELETE FROM sessionmaintainer WHERE username = ? " );
        $stmt->execute([$username]);
    }
}