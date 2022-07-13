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
    public static function book_all( $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM books WHERE title = ? ");
        $statement->execute( [ $booktitle ] );
        $row = $statement->fetch();
        return $row;
    }
    public static function insert ( $booktitle , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare(" INSERT INTO books (title , quantity , quantityavailable) VALUES ( ? , ? , ? ) ") ;
        $statement->execute( [ $booktitle , $quantity , $quantity ] ) ;
    }
    public static function book_update_quantity ( $booktitle , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE books SET quantity = quantity + ? WHERE title= ? ") ;
        $statement->execute( [ $quantity , $booktitle ] ) ;
    }
    public static function book_update_quantityavailable ( $booktitle , $quantity )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE books SET quantityavailable = quantityavailable + ? WHERE title= ? ") ;
        $statement->execute( [ $quantity , $booktitle ] );
    }
    public static function book_update_quantityavailableplusone ( $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE books SET quantityavailable = quantityavailable + 1 WHERE title= ? ") ;
        $statement->execute([$booktitle]);
    }
    public static function book_update_quantityavailableminusone ( $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE books SET quantityavailable = quantityavailable - 1 WHERE title= ? ") ;
        $statement->execute([$booktitle]);
    }
    public static function book_delete ( $title )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM books WHERE title= ? ") ;
        $statement->execute([$title]);
    }
}