<?php
namespace Model\Admin ;
class IssueRecords
{
    public static function insert ( $book_title , $client_name , $request_date , $reply_date )
    {
        $db = \DB::get_instance();
        $query = "INSERT INTO IssueRecords " ;
        $query.= "( Title, Username, RequestDate, AcceptDate, IssueDate ) " ;
        $query.= "VALUES ( ? ,? , ? , ? , CURDATE() )" ;
        $statement = $db->prepare($query);
        $statement->execute( [ $book_title , $client_name , $request_date , $reply_date ] ) ;
    }
    public static function client_book_delete ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM IssueRecords WHERE Username = ? AND Title = ? ");
        $statement->execute( [ $client_name , $book_title ] ) ;
    }
}