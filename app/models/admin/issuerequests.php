<?php
namespace Model\Admin ;
class IssueRequests 
{
    public static function status_one_all ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM issuerequests WHERE status = 1 ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function client_book_all ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM issuerequests WHERE username = ? and title = ? ");
        $statement->execute([$client_name , $book_title]);
        $row = $statement->fetch();
        return $row;
    }
    public static function client_book_status_one_all( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM issuerequests WHERE username = ? and title = ? AND status = 1 ");
        $statement->execute([$client_name , $book_title]);
        $row = $statement->fetch();
        return $row;
    }
    public static function client_book_update_status_one ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE issuerequests SET status=1, replydate=CURDATE() WHERE username = ? AND title = ? ");
        $statement->execute([$client_name , $book_title]);
    }
    public static function client_book_update_status_two ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE issuerequests SET status=2, replydate=CURDATE() WHERE username = ? AND title = ? ");
        $statement->execute([$client_name , $book_title]);
    }
    public static function client_book_status_one_delete ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM issuerequests WHERE status=1 AND username = ? AND title = ? ");
        $statement->execute([$client_name , $book_title]);
    }
}