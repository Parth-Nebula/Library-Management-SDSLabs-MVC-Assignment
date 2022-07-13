<?php
namespace Model\User ;
class Users 
{
    public static function user_all( $username )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? ");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        return $row;
    }
    public static function insert ( $username  , $password , $salt )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare(" INSERT INTO users (username, hashedsaltedpassword, salt) VALUES ( ? , ? , ? ) ");
        $stmt->execute( [ $username  , $password , $salt ] ) ;
    }
}