<?php
namespace Model\User ;
class IssueRecords 
{
    public static function user_all( $username )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title, Username, RequestDate, AcceptDate, IssueDate FROM IssueRecords WHERE Username = ? ");
        $statement->execute([$username]);
        $rows = $statement->fetchAll();
        return $rows;
    }
}