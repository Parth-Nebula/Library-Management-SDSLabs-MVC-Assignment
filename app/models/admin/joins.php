<?php
namespace Model\Admin ;
class Joins 
{
    public static function issue_requests_books ()
    {
        $db = \DB::get_instance();
        $query = "SELECT IssueRequests.Title, IssueRequests.Username, IssueRequests.Status, IssueRequests.RequestDate, IssueRequests.ReplyDate , Books.QuantityAvailable " ;
        $query.= "FROM IssueRequests LEFT JOIN Books " ;
        $query.= "ON IssueRequests.Title = Books.Title" ;
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function issue_records_return_requests ( $client_name , $book_title )
    {
        $db = \DB::get_instance();
        $query = "SELECT IssueRecords.Title, Issuerecords.Username, Issuerecords.RequestDate, Issuerecords.AcceptDate, Issuerecords.IssueDate, ReturnRequests.Title, ReturnRequests.Username, ReturnRequests.ReturnDate " ;
        $query.= "FROM IssueRecords CROSS JOIN ReturnRequests " ;
        $query.= "WHERE IssueRecords.Title = ReturnRequests.Title AND Issuerecords.Username = ReturnRequests.Username AND ReturnRequests.Username = ? AND ReturnRequests.Title = ?" ;
        $statement = $db->prepare($query);
        $statement->execute( [ $client_name , $book_title ] );
        $row = $statement->fetch();
        return $row;
    }
}