<?php
session_start(); 
include('connectdb.php');

if(isset($_SESSION["Customer_ID"]) && $_SESSION["loggedin"] === true){


	$cID=$_SESSION["Customer_ID"] ;
    $query = 'DELETE FROM customerbasket
    WHERE
    ProductID = "' . $_GET['ProductID'].'" and CustomerID="'.$cID.'"';
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
}
else
{

  header('Location: signInPageCustomer.php');
}

?>
<script type="text/javascript">
			alert("Removed Item  Successfull.");
			window.location = "basketpage.php";
		</script>