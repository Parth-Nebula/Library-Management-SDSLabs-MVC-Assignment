<?php
namespace Model\Admin ;
class AdminRequests 
{
    public static function admin_all ( $admin_name )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Username, HashedSaltedPassword, Salt FROM AdminRequests WHERE Username = ? ");
        $statement->execute([$admin_name]);
        $row = $statement->fetch();
        return $row;
    }
    public static function all_username ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Username FROM AdminRequests ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function insert ( $admin_name  , $password , $salt )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare(" INSERT INTO AdminRequests ( Username, HashedSaltedPassword, Salt ) VALUES ( ? , ? , ? ) ");
        $statement->execute( [ $admin_name  , $password , $salt ] ) ;
    }
    public static function admin_delete ( $admin_name )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM AdminRequests WHERE Username= ?");
        $statement->execute([$admin_name]);
    }
}