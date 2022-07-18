<?php
namespace Model\Admin ;
class ReturnRequests 
{
    public static function all ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title, Username, ReturnDate FROM ReturnRequests ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function client_book_delete ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM ReturnRequests WHERE Username = ? AND Title = ? " ) ;
        $statement->execute([$client_name , $book_title]);
    }
}