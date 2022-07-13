<?php
namespace Model\Admin ;
class SessionMaintainerAdmin 
{
    public static function insert ( $adminname , $someRandomhash , $someRandomsalt )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO sessionmaintaineradmin (username, hashedsaltedtemppassword, salt) values ( ? , ? , ? ) " ) ;
        $stmt->execute([ $adminname , $someRandomhash , $someRandomsalt ]) ;
    }
    public static function admin_all ( $adminname )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM sessionmaintaineradmin WHERE username = ? ");
        $stmt->execute([$adminname]);
        $row = $stmt->fetch();
        return $row ;
    }
    public static function admin_delete ( $adminname )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" DELETE FROM sessionmaintaineradmin WHERE username = ? " );
        $stmt->execute([$adminname]);
    }
}