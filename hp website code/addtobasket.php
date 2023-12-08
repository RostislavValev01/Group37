<?php
session_start();

require 'connectdb.php';

if (!isset($_SESSION['Customer_ID'])) {
    header('Location: signInPageCustomer.php');
    exit;
}

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['Customer_ID'];

    $productQuery = "SELECT ProductName, Price FROM stock WHERE ProductSKU = ?";
    $productStmt = mysqli_prepare($con, $productQuery);
    mysqli_stmt_bind_param($productStmt, "i", $product_id);
    mysqli_stmt_execute($productStmt);
    $productResult = mysqli_stmt_get_result($productStmt);
    $product = mysqli_fetch_assoc($productResult);

    if ($product) {
        $query = "INSERT INTO customerbasket (CustomerID, ProductName, ProductID, Price, Quantity) VALUES (?, ?, ?, ?, 1) ON DUPLICATE KEY UPDATE Quantity = Quantity + 1";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "isid", $user_id, $product['ProductName'], $product_id, $product['Price']);
        mysqli_stmt_execute($stmt);
    }
}

header('Location: productPage.php');
exit;
?>
