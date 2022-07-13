<?php
namespace Model\User ;
class IssueRequests 
{
    public static function user_all( $username )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM issuerequests WHERE username = ? ");
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public static function userbook_all( $username , $booktitle )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM issuerequests WHERE username = ? AND title = ? ");
        $stmt->execute([$username , $booktitle]);
        $row = $stmt->fetch();
        return $row;
    }
    public static function insert( $username , $booktitle )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" INSERT INTO issuerequests (username, title, requestdate ) VALUES ( ? , ? , CURDATE() ) ");
        $stmt->execute([$username , $booktitle]);
    }
    public static function userbook_delete ( $username , $booktitle )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" DELETE FROM issuerequests WHERE username = ? AND title = ? " );
        $stmt->execute([$username , $booktitle]);
    }
}