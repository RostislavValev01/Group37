<?php
  $servername = "localhost";
  $dbname = "u_220071459_db";
  $username = "u-220071459";
  $password = "88VRpINbMl3utXr";
  
  try {
      $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $ex) {
      echo "Connection failed: " . $ex->getMessage();
      exit;
  }

?>


 <?php
$db_host = 'localhost';
$db_name = 'hp_db'; // hp_db is the name of the database
$username = 'root';
$password  = '';


try{
    
    $db = new PDO ("mysql:dbname=$db_name; host=$db_host", $username, $password);
    //echo("Successfully connected to the database!");
} catch (PDOException $ex){
    echo("Failed to connect to the database.<br>");
    echo($ex ->getMessage());
    exit;
}

?> 
