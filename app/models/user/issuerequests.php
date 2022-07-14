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
    public static function userbook_all( $username , $book_title )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM issuerequests WHERE username = ? AND title = ? ");
        $stmt->execute([$username , $book_title]);
        $row = $stmt->fetch();
        return $row;
    }
    public static function insert( $username , $book_title )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" INSERT INTO issuerequests (username, title, requestdate ) VALUES ( ? , ? , CURDATE() ) ");
        $stmt->execute([$username , $book_title]);
    }
    public static function userbook_delete ( $username , $book_title )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" DELETE FROM issuerequests WHERE username = ? AND title = ? " );
        $stmt->execute([$username , $book_title]);
    }
}