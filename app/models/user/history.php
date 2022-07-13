<?php
namespace Model\User ;
class History 
{
    public static function user_all( $username )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM history WHERE username = ? ");
        $stmt->execute([$username]);
        $rows = $stmt->fetchALL();
        return $rows;
    }
}