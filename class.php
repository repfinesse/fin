<?php
if(class_exists('DB') === false){
   class DB {

    
    private $server = "localhost"; 
    private $db_user = "root"; 
    private $db_pass = "password"; 
    private $db_name = "codes"; 
   

    function connect() {
        return mysqli_connect($this->server, $this->db_user, $this->db_pass, $this->db_name); 
    }

} 
}

class Client { 

    function checkCode($code) { 
        $db = new DB; 
        $db = $db->connect(); 
        $code = mysqli_real_escape_string($db, $code); 

        $sql = "SELECT * FROM singleuse WHERE username='$code'";  
        $results = mysqli_query($db,$sql); 

        if(mysqli_num_rows($results) == 0) {
            mysqli_close($db);
            return false; 
        } else {
            $code = mysqli_fetch_object($results);
            
            if($code->uses <= $code->used) {
                mysqli_close(); 
                
                return false; 
            } else {
                
                return true; 
            }
        
        }
    } 
    function topupCheck($code) { 
        $db = new DB; 
        $db = $db->connect(); 
        $code = mysqli_real_escape_string($db, $code); 

        $sql = "SELECT * FROM codes WHERE code='$code'";  
        $results = mysqli_query($db,$sql); 

        if(mysqli_num_rows($results) == 0) {
            mysqli_close($db);
            return false; 
        } else {
            $code = mysqli_fetch_object($results);
            
            if($code->uses <= $code->used) {
                mysqli_close(); 
                
                return false; 
            } else {
                
                return true; 
            }
        
        }
    } 
    
     function sayCode($code) { 
        $db = new DB; 
        $db = $db->connect(); 
        $code = mysqli_real_escape_string($db, $code); 

        $sql = "SELECT * FROM singleuse WHERE username='$code'";  
        $results = mysqli_query($db,$sql); 

        if(mysqli_num_rows($results) == 0) {
            mysqli_close($db); 
        } else {
            $code = mysqli_fetch_object($results);
            $left = $code->uses - $code->used;
       return $left ;

        
        }
    }
   
    function addUse($code){
        $db = new DB; 
        $db = $db->connect(); 
        $code = mysqli_real_escape_string($db, $code); 
        $sql = "SELECT * FROM singleuse WHERE username='$code' LIMIT 1"; 
        $res = mysqli_query($db, $sql);
        $obj = mysqli_fetch_object($res);
        $newUses = $obj->used + 1; 
        $sql2 = "UPDATE singleuse SET used=? WHERE username=?";
        $stmt = mysqli_prepare($db, $sql2); 
        mysqli_stmt_bind_param($stmt, "is", $newUses, $code); 
        mysqli_stmt_execute($stmt); 
        mysqli_close($db);
    }

    function topup($code,$username){
        $db = new DB; 
        $db = $db->connect(); 
        $code = mysqli_real_escape_string($db, $code); 
        $username = mysqli_real_escape_string($db, $username); 

        $sql = "SELECT * FROM codes WHERE code='$code' LIMIT 1"; 
        $res = mysqli_query($db, $sql);
        $obj = mysqli_fetch_object($res);
        $newUses = $obj->uses - $obj->used; 

        $sql2 = "UPDATE `singleuse` SET `uses` = `uses` + ? WHERE `singleuse`.`id` = ?";
        $stmt = mysqli_prepare($db, $sql2); 
        mysqli_stmt_bind_param($stmt, "ii", $newUses, $username); 
        mysqli_stmt_execute($stmt); 

        $sql3 = "DELETE FROM codes WHERE code='$code' LIMIT 1";
        mysqli_query($db, $sql3);  
        mysqli_close($db);
        return true;
    }
}


?>
