<?php
session_start();

require 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT Customer_ID, Email, Password, AdminStatus FROM accountdetails WHERE Email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $verifyResult = password_verify($password, $user['Password']);


        if ($user && $password == $user['Password']) { // change to == verifyResult
            $_SESSION['Customer_ID'] = $user['Customer_ID'];
            $_SESSION['AdminStatus'] = 0;
            $_SESSION['loggedin'] = true;

            header('Location: productPage.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            echo $_SESSION['error'];

            header('Location: signInPageCustomer.php');
            exit();
        }
    }
}

if ($stmt instanceof mysqli_stmt) {
    $stmt->close();
}
$con->close();
?>
