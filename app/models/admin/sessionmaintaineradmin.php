<?php
namespace Model\Admin ;
class SessionMaintainerAdmin 
{
    public static function insert ( $admin_name , $some_random_hash , $some_random_salt )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO sessionmaintaineradmin (username, hashedsaltedtemppassword, salt) values ( ? , ? , ? ) " ) ;
        $stmt->execute([ $admin_name , $some_random_hash , $some_random_salt ]) ;
    }
    public static function admin_all ( $admin_name )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM sessionmaintaineradmin WHERE username = ? ");
        $stmt->execute([$admin_name]);
        $row = $stmt->fetch();
        return $row ;
    }
    public static function admin_delete ( $admin_name )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" DELETE FROM sessionmaintaineradmin WHERE username = ? " );
        $stmt->execute([$admin_name]);
    }
}