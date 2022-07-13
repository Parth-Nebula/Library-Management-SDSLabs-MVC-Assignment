<?php
namespace Model\Admin ;
class AdminRequests 
{
    public static function admin_all ( $adminname )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM adminrequests WHERE username = ? ");
        $statement->execute([$adminname]);
        $row = $statement->fetch();
        return $row;
    }
    public static function all_username ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT username FROM adminrequests ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function insert ( $adminname  , $password , $salt )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare(" INSERT INTO adminrequests (username, hashedsaltedpassword, salt) VALUES ( ? , ? , ? ) ");
        $statement->execute( [ $adminname  , $password , $salt ] ) ;
    }
    public static function admin_delete ( $adminname )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM adminrequests WHERE username= ?");
        $statement->execute([$adminname]);
    }
}