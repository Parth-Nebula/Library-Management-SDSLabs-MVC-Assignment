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
    public static function book_update_quantityavailableplusone( $booktitle )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE books SET quantityavailable = quantityavailable + 1 WHERE title= ? ") ;
        $stmt->execute([$booktitle]);
    }
     public static function pook_update_quantityavailableminusone( $booktitle )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE books SET quantityavailable = quantityavailable - 1 WHERE title= ? ") ;
        $stmt->execute([$booktitle]);
    }
}