<?php
namespace Model\Admin ;
class IssueRequests 
{
    public static function statusone_all ()
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM issuerequests WHERE status = 1 ");
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;
    }
    public static function clientbook_all ( $clientname , $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM issuerequests WHERE username = ? and title = ? ");
        $statement->execute([$clientname , $booktitle]);
        $row = $statement->fetch();
        return $row;
    }
    public static function clientbookstatusone_all( $clientname , $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("SELECT * FROM issuerequests WHERE username = ? and title = ? AND status = 1 ");
        $statement->execute([$clientname , $booktitle]);
        $row = $statement->fetch();
        return $row;
    }
    public static function clientbook_update_statusone ( $clientname , $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE issuerequests SET status=1, replydate=CURDATE() WHERE username = ? AND title = ? ");
        $statement->execute([$clientname , $booktitle]);
    }
    public static function clientbook_update_statustwo ( $clientname , $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("UPDATE issuerequests SET status=2, replydate=CURDATE() WHERE username = ? AND title = ? ");
        $statement->execute([$clientname , $booktitle]);
    }
    public static function clientbookstatusone_delete ( $clientname , $booktitle )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("DELETE FROM issuerequests WHERE status=1 AND username = ? AND title = ? ");
        $statement->execute([$clientname , $booktitle]);
    }
}