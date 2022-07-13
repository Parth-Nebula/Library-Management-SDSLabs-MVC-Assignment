<?php


namespace Model\Admin ;

class utils 

{
    
    public static function sessioncreate ( $username )
        
    {
        
        $someRandompasswordNumber = rand ( 1E+10 , 9E+10 ) ;

        $someRandompassword = (string)$someRandompasswordNumber ;

        $someRandomsaltNumber = rand ( 1E+10 , 9E+10 ) ;

        $someRandomsalt = (string)$someRandomsaltNumber ;


        $someRandompasswordandsomeRandomsalt = $someRandompassword ;

        $someRandompasswordandsomeRandomsalt .= $someRandomsalt ;


        $someRandomhash = base64_encode ( hash ( "sha256" , $someRandompasswordandsomeRandomsalt , true ) ) ;
        
        
        
        $db = \DB::get_instance();
        
        
        $stmt = $db->prepare("DELETE FROM sessionmaintaineradmin WHERE username = ? ") ;
        
        $stmt->execute([$username]) ;
        
        
        $stmt = $db->prepare("INSERT INTO sessionmaintaineradmin (username, hashedsaltedtemppassword, salt) values ( ? , ? , ? ) " ) ;
        
        $stmt->execute([ $username , $someRandomhash , $someRandomsalt ]) ;
        
        
        return $someRandompassword ;
        
    }
    
    public static function sessioncheck ( $username , $temppassword )
        
    {
        
        $db = \DB::get_instance();
        
        $stmt = $db->prepare("SELECT * FROM sessionmaintaineradmin WHERE username = ? ");
        
        $stmt->execute([$username]);
        
        $rows = "" ;
        
        $row = $stmt->fetch();
        
        if ( !$row )
            
        {
            
            return 0 ;
            
        }
        
        
        
        $temppasswordandsalt = $temppassword ;
            
        $temppasswordandsalt.=$row["salt"] ;
        
        $someRandomhash = base64_encode ( hash ( "sha256" , $temppasswordandsalt , true ) ) ;
        
        
        if ( $someRandomhash == $row["hashedsaltedtemppassword"] )
            
        {
            
            return 1 ;
            
        }
        
        
        else
        
        {
            
            return 0 ;
            
        }
        
    }
    
    public static function sessionend ( $username )
        
    {
        
        $db = \DB::get_instance();
        
        $stmt = $db->prepare(" DELETE FROM sessionmaintaineradmin WHERE username = ? " );
        
        $stmt->execute([$username]);
        
    }
    
}