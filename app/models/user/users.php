<?php
namespace Model\User ;
class Users 
{
    public static function user_all( $username )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Username, HashedSaltedPassword, Salt, Fine FROM Users WHERE Username = ? ");
        $statement->execute([$username]);
        $row = $statement->fetch();
        return $row;
    }
    public static function insert ( $username  , $password , $salt )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("INSERT INTO Users ( Username, HashedSaltedPassword, Salt) VALUES ( ? , ? , ? ) ");
        $statement->execute( [ $username  , $password , $salt ] ) ;
    }
}