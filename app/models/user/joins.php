<?php
namespace Model\User ;
class Joins 
{
    public static function issue_records_return_requests ( $username )
    {
        $db = \DB::get_instance();
        $query = "SELECT IssueRecords.Title, Issuerecords.Username, Issuerecords.RequestDate, Issuerecords.AcceptDate, Issuerecords.IssueDate, ReturnRequests.ReturnDate " ;
        $query.= "FROM IssueRecords LEFT JOIN ReturnRequests " ;
        $query.= "ON IssueRecords.Title = ReturnRequests.Title WHERE IssueRecords.Username = ?" ;
        $statement = $db->prepare($query);
        $statement->execute([$username]);
        $rows = $statement->fetchAll();
        return $rows;
    }
}