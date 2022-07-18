<?php
namespace Model\Admin ;
class Admins 
{
    public static function admin_all ( $admin_name )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Username, HashedSaltedPassword, Salt FROM Admins WHERE Username = ? ");
        $statement->execute([$admin_name]);
        $row = $statement->fetch();
        return $row;
    }
    public static function all_username ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Username FROM Admins ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function insert ($client_name)
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("INSERT INTO Admins SELECT Username, HashedSaltedPassword, Salt FROM Adminrequests WHERE Username= ?");
        $statement->execute([$client_name]);
    }
}