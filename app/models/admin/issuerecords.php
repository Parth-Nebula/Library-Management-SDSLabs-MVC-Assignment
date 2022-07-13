<?php
namespace Model\Admin ;
class IssueRecords
{
    public static function insert ( $booktitle , $clientname , $requestdate , $replydate )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("INSERT INTO issuerecords (title, username, requestdate, acceptdate, issuedate) VALUES ( ? ,? , ? , ? , CURDATE() ) ");
        $statement->execute( [ $booktitle , $clientname , $requestdate , $replydate ] ) ;
    }
    public static function clientbook_delete ( $clientname , $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM issuerecords WHERE username = ? AND title = ? ");
        $statement->execute( [ $clientname , $booktitle ] ) ;
    }
}