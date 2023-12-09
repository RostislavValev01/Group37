<?php
//include connection config
       include('connectdb.php');

// session start
session_start();
//$_SESSION['Customer_ID'] = 220021;
//$_SESSION['loggedin'] = false;
// Check if the user is already signned in then redirect him to adminpanel
if(isset($_SESSION["Customer_ID"]) && $_SESSION["loggedin"] === true){


	$cID=$_SESSION["Customer_ID"] ;
   
}
else
{
    $cID=null;
}
$name = $_POST['fname'];
$lname = $_POST['lname'];

$desc = $_POST['remarks'];
$email = $_POST['email'];
/*$contact = $_POST['contact'];*/

  $query = "INSERT INTO queries
  (Customer_ID,Query_ref,First_Name,Surname,Email,Query_description)
  VALUES ('".$cID."','NULL','".$name."','".$lname."','".$email."','".$desc."')";
  mysqli_query($con,$query)or die ('Error in updating Database');

  $con->close();
 ?>
 <script type="text/javascript">
    alert("Query Submitted Successfull.");
    window.location = "contactuspage.php";
</script>