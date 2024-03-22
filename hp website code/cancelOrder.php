<?php
session_start();

// Include the database connection file
require_once "connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get order number from the form
    $orderNumber = $_POST['orderNumber']; // Corrected variable name

    // Delete the order from the database
    $sql = "DELETE FROM orderprocessing WHERE OrderNumber = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $orderNumber); // Corrected variable name
    
    if ($stmt->execute()) {
        // Order deleted successfully, redirect back to OrderProcessing page
        header("Location: OrderProcessing.php");
        exit();
    } else {
        // Error occurred during deletion, display error message
        echo "Error deleting order: " . $stmt->error;
    }
} else {
    // Redirect to an error page or handle the error condition as needed
    header("Location: errorPage.php");
    exit();
}
?>
