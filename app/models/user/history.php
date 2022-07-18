<?php
namespace Model\User ;
class History 
{
    public static function user_all( $username )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT Title, Username, RequestDate, AcceptDate, IssueDate, ReturnDate  FROM History WHERE Username = ? ");
        $statement->execute([$username]);
        $rows = $statement->fetchALL();
        return $rows;
    }
}