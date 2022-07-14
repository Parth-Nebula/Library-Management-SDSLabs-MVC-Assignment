<?php
namespace Model\Admin ;
class History 
{
    public static function insert ( $book_title , $client_name , $request_date , $accept_date , $issue_date , $return_date )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("INSERT INTO history (title, username, requestdate, acceptdate, issuedate, returndate) values ( ? , ? , ? , ? , ? , ? )");
        $statement->execute( [ $book_title , $client_name , $request_date , $accept_date , $issue_date , $return_date ] );
    }
}