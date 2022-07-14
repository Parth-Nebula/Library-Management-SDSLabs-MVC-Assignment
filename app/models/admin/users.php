<?php
namespace Model\Admin ;
class Users 
{
    public static function client_update_fine ( $client_name , $days )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE users SET fine = fine + ? WHERE username = ? ");
        $statement->execute( [ $days , $client_name] );
    }
}