<?php
namespace Model\Admin ;
class IssueRecords
{
    public static function insert ( $book_title , $client_name , $request_date , $reply_date )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("INSERT INTO issuerecords (title, username, requestdate, acceptdate, issuedate) VALUES ( ? ,? , ? , ? , CURDATE() ) ");
        $statement->execute( [ $book_title , $client_name , $request_date , $reply_date ] ) ;
    }
    public static function client_book_delete ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM issuerecords WHERE username = ? AND title = ? ");
        $statement->execute( [ $client_name , $book_title ] ) ;
    }
}