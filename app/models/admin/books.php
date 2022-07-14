<?php
namespace Model\Admin ;
class Books 
{
    public static function all ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM books ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function book_all( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM books WHERE title = ? ");
        $statement->execute( [ $book_title ] );
        $row = $statement->fetch();
        return $row;
    }
    public static function insert ( $book_title , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare(" INSERT INTO books (title , quantity , quantityavailable) VALUES ( ? , ? , ? ) ") ;
        $statement->execute( [ $book_title , $quantity , $quantity ] ) ;
    }
    public static function book_update_quantity ( $book_title , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE books SET quantity = quantity + ? WHERE title= ? ") ;
        $statement->execute( [ $quantity , $book_title ] ) ;
    }
    public static function book_update_quantityavailable ( $book_title , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE books SET quantityavailable = quantityavailable + ? WHERE title= ? ") ;
        $statement->execute( [ $quantity , $book_title ] );
    }
    public static function book_update_quantityavailableplusone ( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE books SET quantityavailable = quantityavailable + 1 WHERE title= ? ") ;
        $statement->execute([$book_title]);
    }
    public static function book_update_quantityavailableminusone ( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE books SET quantityavailable = quantityavailable - 1 WHERE title= ? ") ;
        $statement->execute([$book_title]);
    }
    public static function book_delete ( $book_title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM books WHERE title= ? ") ;
        $statement->execute([$book_title]);
    }
}