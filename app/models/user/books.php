<?php
namespace Model\User ;
class Books 
{
    public static function all()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title , Quantity , QuantityAvailable FROM Books ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function book_update_quantity_available_plus_one( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE Books SET QuantityAvailable = QuantityAvailable + 1 WHERE Title= ? ") ;
        $statement->execute([$book_title]);
    }
     public static function book_update_quantity_available_minus_one( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE Books SET QuantityAvailable = QuantityAvailable - 1 WHERE Title= ? ") ;
        $statement->execute([$book_title]);
    }
}