<?php
namespace Model\Admin ;
class Books 
{
    public static function all ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title , Quantity , QuantityAvailable FROM Books ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function book_all( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title , Quantity , QuantityAvailable FROM Books WHERE Title = ? ");
        $statement->execute( [ $book_title ] );
        $row = $statement->fetch();
        return $row;
    }
    public static function insert ( $book_title , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare(" INSERT INTO Books ( Title , Quantity , QuantityAvailable ) VALUES ( ? , ? , ? ) ") ;
        $statement->execute( [ $book_title , $quantity , $quantity ] ) ;
    }
    public static function book_update_quantity ( $book_title , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE Books SET Quantity = Quantity + ? WHERE Title= ? ") ;
        $statement->execute( [ $quantity , $book_title ] ) ;
    }
    public static function book_update_quantity_available ( $book_title , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE Books SET QuantityAvailable = QuantityAvailable + ? WHERE Title= ? ") ;
        $statement->execute( [ $quantity , $book_title ] );
    }
    public static function book_update_quantity_available_plus_one ( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE Books SET QuantityAvailable = QuantityAvailable + 1 WHERE Title= ? ") ;
        $statement->execute([$book_title]);
    }
    public static function book_update_quantity_available_minus_one ( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE Books SET QuantityAvailable = QuantityAvailable - 1 WHERE Title= ? ") ;
        $statement->execute([$book_title]);
    }
    public static function book_delete ( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM Books WHERE Title= ? ") ;
        $statement->execute([$book_title]);
    }
}