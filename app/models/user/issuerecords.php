<?php
namespace Model\User ;
class IssueRecords 
{
    public static function user_all( $username )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM issuerecords WHERE username = ? ");
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
}