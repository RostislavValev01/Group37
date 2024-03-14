<?php
session_start();
require 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addCustomer'])) {
    $fname = $_POST['newFirstName'];
    $surname = $_POST['newLastName'];
    $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $mnumber = $_POST['newMobile'];
    $email = $_POST['newEmail'];
    $address = $_POST['newAddress'];
    $dob = $_POST['newDoB'];
    $adStatus = $_POST['newStatus'];
    $adId = $_POST['newAdminId'];

    $verify_query = mysqli_prepare($con, "SELECT Email FROM accountdetails WHERE Email=?");
    mysqli_stmt_bind_param($verify_query, "s", $email);
    mysqli_stmt_execute($verify_query);
    mysqli_stmt_store_result($verify_query);

    if (mysqli_stmt_num_rows($verify_query) > 0) {
        echo "<div class='message'><p>This email is used, Try another One Please!</p></div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    } else {
        $insert_query = mysqli_prepare($con, "INSERT INTO accountdetails(FirstName, Surname, MobileNumber, Email, Password, CustomerAddress, DateOfBirth, AdminStatus, Admin_ID) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insert_query, "sssssssii", $fname, $surname, $mnumber, $email, $password, $address, $dob, $adStatus, $adId);
        
        if (mysqli_stmt_execute($insert_query)) {
            echo '<script>alert("New customer added successfully!");</script>';
            header('Location: customerDetails.php');
            exit();
        } else {
            echo '<script>alert("Failed to add new customer: ' . mysqli_error($con) . '");</script>';
            header('Location: customerDetails.php');
            exit();
        }
    }
} else {
    header('Location: customerDetails.php');
    exit();
}