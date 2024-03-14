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
        $checkQuery = "SELECT * FROM customerbasket WHERE CustomerID = ? AND ProductID = ?";
        $checkStmt = mysqli_prepare($con, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "ii", $user_id, $product_id);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);
        
        if (mysqli_num_rows($checkResult) > 0) {
            $updateQuery = "UPDATE customerbasket SET Quantity = Quantity + 1 WHERE CustomerID = ? AND ProductID = ?";
            $updateStmt = mysqli_prepare($con, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "ii", $user_id, $product_id);
            mysqli_stmt_execute($updateStmt);
        } else {
            $quantity = 1;
            $insertQuery = "INSERT INTO customerbasket (CustomerID, ProductName, ProductID, Price, Quantity) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($con, $insertQuery);
            mysqli_stmt_bind_param($insertStmt, "isidi", $user_id, $product['ProductName'], $product_id, $product['Price'], $quantity);
            mysqli_stmt_execute($insertStmt);
        }
    }
}

echo '<script>alert("Item added to basket!");</script>';
echo '<script>window.location.href = "productPage.php";</script>';
exit;
