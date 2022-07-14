<?php
namespace Model\Admin ;
class Joins 
{
    public static function issue_requests_books ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT issuerequests.* , books.quantityavailable FROM issuerequests LEFT JOIN books ON issuerequests.title = books.title ;");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function issue_records_return_requests ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM issuerecords CROSS JOIN returnrequests where issuerecords.title = returnrequests.title AND issuerecords.username = returnrequests.username AND returnrequests.username = ? AND returnrequests.title = ? ");
        $statement->execute( [ $client_name , $book_title ] );
        $row = $statement->fetch();
        return $row;
    }
}