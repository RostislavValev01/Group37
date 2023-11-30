<?php
  $servername = "localhost";
  $dbname = "u_220153489_db";
  $username = "u-220153489";
  $password = "PxryMpQXrAarJBc";
  
  try {
      $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $ex) {
      echo "Connection failed: " . $ex->getMessage();
  }