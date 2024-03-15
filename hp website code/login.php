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

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $verifyResult = password_verify($password, $user['Password']);

            if ($user !== null && $verifyResult) { 
                $_SESSION['Customer_ID'] = $user['Customer_ID'];
                $_SESSION['AdminStatus'] = 0;
                $_SESSION['loggedin'] = true;
            
                echo '<script>alert("Hi ' . $user['Email'] . ', you are now logged in!");</script>';
                echo '<script>window.location.href = "Index.php";</script>';
                exit();
            } else {
                echo '<script>alert("Invalid email or password.");</script>';
                echo '<script>window.location.href = "signInPageCustomer.php";</script>';

                exit();
            }
        } else {
            echo '<script>alert("Invalid email or password.");</script>';
            echo '<script>window.location.href = "signInPageCustomer.php";</script>';
            exit();
        }
    }
}

if ($stmt instanceof mysqli_stmt) {
    $stmt->close();
}
$con->close();

