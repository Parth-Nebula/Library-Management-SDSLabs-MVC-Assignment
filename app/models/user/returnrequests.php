<?php
namespace Model\User ;
class ReturnRequests 
{
    public static function insert ( $username , $book_title )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" INSERT INTO returnrequests (username, title, returndate ) VALUES ( ? , ? , CURDATE() ) ");
        $stmt->execute([$username , $book_title]);
    }
}