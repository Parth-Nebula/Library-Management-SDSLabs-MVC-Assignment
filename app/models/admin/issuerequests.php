<?php
namespace Model\Admin ;
class IssueRequests 
{
    public static function status_one_all ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title, Username, Status, RequestDate, ReplyDate FROM IssueRequests WHERE Status = 1 ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function client_book_all ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title, Username, Status, RequestDate, ReplyDate FROM IssueRequests WHERE Username = ? and Title = ? ");
        $statement->execute([$client_name , $book_title]);
        $row = $statement->fetch();
        return $row;
    }
    public static function client_book_status_one_all( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title, Username, Status, RequestDate, ReplyDate FROM IssueRequests WHERE Username = ? and Title = ? AND Status = 1 ");
        $statement->execute([$client_name , $book_title]);
        $row = $statement->fetch();
        return $row;
    }
    public static function client_book_update_status_one ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE IssueRequests SET Status=1, replydate=CURDATE() WHERE Username = ? AND Title = ? ");
        $statement->execute([$client_name , $book_title]);
    }
    public static function client_book_update_status_two ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE IssueRequests SET Status=2, replydate=CURDATE() WHERE Username = ? AND Title = ? ");
        $statement->execute([$client_name , $book_title]);
    }
    public static function client_book_status_one_delete ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM IssueRequests WHERE Status=1 AND Username = ? AND Title = ? ");
        $statement->execute([$client_name , $book_title]);
    }
}