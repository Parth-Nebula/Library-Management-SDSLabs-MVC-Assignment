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
    public static function book_update_quantity_available_plus_one( $book_title )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE books SET quantityavailable = quantityavailable + 1 WHERE title= ? ") ;
        $stmt->execute([$book_title]);
    }
     public static function book_update_quantity_available_minus_one( $book_title )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE books SET quantityavailable = quantityavailable - 1 WHERE title= ? ") ;
        $stmt->execute([$book_title]);
    }
}