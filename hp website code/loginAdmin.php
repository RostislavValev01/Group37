<?php
session_start();

require 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['adminID'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $adminID = $_POST['adminID'];

        $query = "SELECT Customer_ID, Email, Password, Admin_ID, AdminStatus FROM accountdetails WHERE Email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $verifyResult = password_verify($password, $user['Password']);

        if ($user && ($adminID == $user['Admin_ID']) && ($password == $user['Password'])) { // change to == verifyResult
            $_SESSION['Customer_ID'] = $user['Customer_ID'];
            $_SESSION['AdminStatus'] = 1;
            $_SESSION['loggedin'] = true;

            header('Location: productPage.php');
            echo $_SESSION['Customer_ID'];
            exit();
        } else {
            $_SESSION['error'] = "Invalid email, password or admin ID.";
            header('Location: signInPageAdmin.php');
            exit();
        }
    }
}

if ($stmt instanceof mysqli_stmt) {
    $stmt->close();
}
$con->close();
?>
