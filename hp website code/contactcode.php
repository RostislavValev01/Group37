<?php
//include connection config
include('connectdb.php');

// session start
session_start();
//$_SESSION['Customer_ID'] = 220021;
//$_SESSION['loggedin'] = false;
// Check if the user is already signned in then redirect him to adminpanel
if (isset($_SESSION["Customer_ID"]) && $_SESSION["loggedin"] === true) {


    $cID = $_SESSION["Customer_ID"];
    $name = $_POST['fname'];
    $lname = $_POST['lname'];

    $desc = $_POST['remarks'];
    $email = $_POST['email'];
    if($name=="" || $lname=="" || $desc == "" || $email == ""){
        header("Location: Contact.php?msg=All fields are required");
    }

    $query = "INSERT INTO queries
  (Customer_ID,First_Name,Surname,Email,Query_description)
  VALUES ('" . $cID . "','" . $name . "','" . $lname . "','" . $email . "','" . $desc . "')";
    mysqli_query($con, $query) or die('Error in updating Database');

    $con->close();

} else {
    $cID = null;
    $name = $_POST['fname'];
    $lname = $_POST['lname'];

    $desc = $_POST['remarks'];
    $email = $_POST['email'];


    $query = "INSERT INTO queries
  (First_Name,Surname,Email,Query_description)
  VALUES ('" . $name . "','" . $lname . "','" . $email . "','" . $desc . "')";
    mysqli_query($con, $query) or die('Error in updating Database');

    $con->close();

}

?>
<script type="text/javascript">
    alert("Query Submitted Successfull.");
    window.location = "Contact.php";
</script>
