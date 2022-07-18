<?php
namespace Model\Admin ;
class Users 
{
    public static function client_update_fine ( $client_name , $days )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE Users SET Fine = Fine + ? WHERE Username = ? ");
        $statement->execute( [ $days , $client_name] );
    }
}