<?php
  $servername = "localhost";
  $dbname = "u_220071459_db";
  $username = "u-220071459";
  $password = "Bzs3i4RO2WIEI8lH";
  
  try {
      $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $ex) {
      echo "Connection failed: " . $ex->getMessage();
  }
