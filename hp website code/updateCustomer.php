<?php
session_start();
require 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['saveChanges'])) {
    $customerId = $_POST['customerId'];
    $editFirstName = $_POST['editFirstName'];
    $editLastName = $_POST['editLastName'];
    $editMobile = $_POST['editMobile'];
    $editEmail = $_POST['editEmail'];
    $editAddress = $_POST['editAddress'];
    $editDoB = $_POST['editDoB'];
    $editStatus = $_POST['editStatus'];
    $editAdmin = $_POST['editAdmin'];

    $updateQuery = "UPDATE accountdetails SET FirstName=?, Surname=?, MobileNumber=?, Email=?, CustomerAddress=?, DateOfBirth=?, AdminStatus=?, Admin_ID=? WHERE Customer_ID=?";

    $updateStmt = mysqli_prepare($con, $updateQuery);

    mysqli_stmt_bind_param($updateStmt, "ssssssisi", $editFirstName, $editLastName, $editMobile, $editEmail, $editAddress, $editDoB, $editStatus, $editAdmin, $customerId);

    mysqli_stmt_execute($updateStmt);

    if (mysqli_stmt_affected_rows($updateStmt) > 0) {
        echo '<script>alert("Customer details updated successfully!");</script>';
        echo '<script>window.location.href = "customerDetails.php";</script>';
        exit();
    } else {
        echo '<script>alert("Failed to update customer details. ' . mysqli_error($con) . '");</script>';
        echo '<script>window.location.href = "customerDetails.php";</script>';
    }

    mysqli_stmt_close($updateStmt);
}