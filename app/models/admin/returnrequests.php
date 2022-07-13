<?php
namespace Model\Admin ;
class ReturnRequests 
{
    public static function all ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM returnrequests ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function clientbook_delete ( $clientname , $title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM returnrequests WHERE username = ? AND title = ? " ) ;
        $statement->execute([$clientname , $title]);
    }
}