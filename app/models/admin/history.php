<?php
namespace Model\Admin ;
class History 
{
    public static function insert ( $booktitle , $clientname , $requestdate , $acceptdate , $issuedate , $returndate )
    {
        $db = \DB::get_instance();
        $statement = $db->prepare("INSERT INTO history (title, username, requestdate, acceptdate, issuedate, returndate) values ( ? , ? , ? , ? , ? , ? )");
        $statement->execute( [ $booktitle , $clientname , $requestdate , $acceptdate , $issuedate , $returndate ] );
    }
}