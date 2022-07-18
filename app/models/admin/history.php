<?php
namespace Model\Admin ;
class History 
{
    public static function insert ( $book_title , $client_name , $request_date , $accept_date , $issue_date , $return_date )
    {
        $db = \DB::get_instance();
        $query = "INSERT INTO History " ;
        $query.= "( Title, Username, RequestDate, AcceptDate, IssueDate, ReturnDate ) " ;
        $query.= "VALUES ( ? , ? , ? , ? , ? , ? )" ;
        $statement = $db->prepare($query);
        $statement->execute( [ $book_title , $client_name , $request_date , $accept_date , $issue_date , $return_date ] );
    }
}