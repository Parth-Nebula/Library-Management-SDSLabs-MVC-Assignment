<?php
namespace Model\User ;
class IssueRequests 
{
    public static function user_all( $username )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title, Username, Status, RequestDate, ReplyDate FROM IssueRequests WHERE Username = ? ");
        $statement->execute([$username]);
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function user_book_all( $username , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title, Username, Status, RequestDate, ReplyDate FROM IssueRequests WHERE Username = ? AND Title = ? ");
        $statement->execute([$username , $book_title]);
        $row = $statement->fetch();
        return $row;
    }
    public static function insert( $username , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare(" INSERT INTO IssueRequests ( Username , Title , RequestDate ) VALUES ( ? , ? , CURDATE() ) ");
        $statement->execute([$username , $book_title]);
    }
    public static function user_book_delete ( $username , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare(" DELETE FROM IssueRequests WHERE Username = ? AND Title = ? " );
        $statement->execute([$username , $book_title]);
    }
}