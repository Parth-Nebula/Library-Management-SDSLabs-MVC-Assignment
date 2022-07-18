<?php
namespace Model\User ;
class ReturnRequests 
{
    public static function insert ( $username , $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare(" INSERT INTO ReturnRequests ( Username, Title, ReturnDate ) VALUES ( ? , ? , CURDATE() ) ");
        $statement->execute([$username , $book_title]);
    }
}