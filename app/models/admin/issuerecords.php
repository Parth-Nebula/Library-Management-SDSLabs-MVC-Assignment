<?php
namespace Model\Admin ;
class IssueRecords
{
    public static function insert ( $book_title , $clientname , $request_date , $reply_date )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("INSERT INTO issuerecords (title, username, requestdate, acceptdate, issuedate) VALUES ( ? ,? , ? , ? , CURDATE() ) ");
        $statement->execute( [ $book_title , $clientname , $request_date , $reply_date ] ) ;
    }
    public static function clientbook_delete ( $clientname , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM issuerecords WHERE username = ? AND title = ? ");
        $statement->execute( [ $clientname , $book_title ] ) ;
    }
}