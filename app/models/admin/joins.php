<?php
namespace Model\Admin ;
class Joins 
{
    public static function issuerequests_books ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT issuerequests.* , books.quantityavailable FROM issuerequests LEFT JOIN books ON issuerequests.title = books.title ;");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function issuerecords_returnrequests ( $clientname , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM issuerecords CROSS JOIN returnrequests where issuerecords.title = returnrequests.title AND issuerecords.username = returnrequests.username AND returnrequests.username = ? AND returnrequests.title = ? ");
        $statement->execute( [ $clientname , $book_title ] );
        $row = $statement->fetch();
        return $row;
    }
}