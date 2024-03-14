<?php
session_start();
require 'connectdb.php';

if (!isset($_SESSION['Customer_ID']) || $_SESSION['AdminStatus'] != 1) {
    header('Location:productPage.php');
    exit();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customerId']) && isset($_POST['adminPassword'])) {
        $customerId = $_POST['customerId'];
        $adminPassword = $_POST['adminPassword'];
        $adminId = $_SESSION['Customer_ID'];

        $verify_query = mysqli_prepare($con, "SELECT Password FROM accountdetails WHERE Customer_ID = ?");
        mysqli_stmt_bind_param($verify_query, "i", $adminId);
        mysqli_stmt_execute($verify_query);
        mysqli_stmt_store_result($verify_query);

        if (mysqli_stmt_num_rows($verify_query) == 1) {
            mysqli_stmt_bind_result($verify_query, $hashedPassword);
            mysqli_stmt_fetch($verify_query);

            if (password_verify($adminPassword, $hashedPassword)) {
                $delete_query = mysqli_prepare($con, "DELETE FROM accountdetails WHERE Customer_ID = ?");
                mysqli_stmt_bind_param($delete_query, "i", $customerId);

                if (mysqli_stmt_execute($delete_query)) {
                    echo '<script>alert("Customer deleted successfully!");</script>';
                    echo '<script>window.location.href = "customerDetails.php";</script>';
                    exit();
                } else {
                    echo '<script>alert("Failed to delete customer: ' . mysqli_error($con) . '");</script>';
                    echo '<script>window.location.href = "customerDetails.php";</script>';
                    exit();
                }
            } else {
                echo '<script>alert("Incorrect admin password!");</script>';
                echo '<script>window.location.href = "customerDetails.php";</script>';
                exit();
            }
        }
    }
}