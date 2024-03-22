<?php
session_start();

// Include the database connection file
require_once "connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get order number and new status from the form
    $orderNumber = $_POST['orderNumber'];
    $newStatus = $_POST['newStatus'];

    // Update the order status in the database
    $sql = "UPDATE orderprocessing SET OrderStatus = ? WHERE OrderNumber = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $newStatus, $orderNumber);
    $stmt->execute();
    $stmt->close();

    // Redirect back to OrderProcessing page
    header("Location: OrderProcessing.php");
    exit();
} else {
    // Redirect to an error page or handle the error condition as needed
    header("Location: errorPage.php");
    exit();
}
?>
