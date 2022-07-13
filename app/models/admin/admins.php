<?php
namespace Model\Admin ;
class Admins 
{
    public static function admin_all ( $adminname )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM admins WHERE username = ? ");
        $statement->execute([$adminname]);
        $row = $statement->fetch();
        return $row;
    }
    public static function all_username ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT username FROM admins ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function insert ($clientname)
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("INSERT INTO admins SELECT * FROM adminrequests WHERE username= ?");
        $statement->execute([$clientname]);
    }
}