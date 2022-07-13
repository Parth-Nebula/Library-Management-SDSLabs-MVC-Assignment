<?php
namespace Model\User ;
class Joins 
{
    public static function issuerecords_returnrequests ( $username )
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT issuerecords.*, returnrequests.returndate FROM issuerecords LEFT JOIN returnrequests ON issuerecords.title = returnrequests.title WHERE issuerecords.username = ? ") ;
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
}