<?php
namespace Model\User ;
class Books 
{
    public static function all()
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM books ");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public static function book_update_quantityavailableplusone( $book_title )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE books SET quantityavailable = quantityavailable + 1 WHERE title= ? ") ;
        $stmt->execute([$book_title]);
    }
     public static function pook_update_quantityavailableminusone( $book_title )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE books SET quantityavailable = quantityavailable - 1 WHERE title= ? ") ;
        $stmt->execute([$book_title]);
    }
}