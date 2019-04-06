<?php
session_start();
require_once __DIR__.'/../../administrator/classes/client.php';
$client = new Client; 
if (isset($_POST["submit"]) && $_POST["submit"] == 2) {
    $code = $_POST["code"];
    $id = $_POST["id"];
    
    if ($client->topupCheck($code)) { 
        if($client->topup($code, $id)){
           header("location: ./forms.php?a=topup"); 
           exit;
        }
    } else {
        header("location: ./forms.php?a=invalid"); 
        exit;
        }
    }

?>
