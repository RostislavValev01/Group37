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



<?php     --this is the php code to connect to the database--

$serverName = "localhost";
$userName = "root";
$password  = "";
$dbName = "healthpointdb";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect";
    exit();
}
echo "connected successfully";
?>

