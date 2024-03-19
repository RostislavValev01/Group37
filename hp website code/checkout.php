<?php
session_start();
include ('connectdb.php');

if (isset ($_SESSION["Customer_ID"]) && $_SESSION["loggedin"] === true) {
    $cID = $_SESSION["Customer_ID"];

    if (isset ($_POST['submitOrder'])) {
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postcode = $_POST['postcode'];
        $phone = $_POST['phone'];

        $query = 'SELECT * FROM customerbasket WHERE CustomerID="' . $cID . '"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));

        $orderDescription = "";
        $orderTotal = 0;


        while ($row = mysqli_fetch_assoc($result)) {
            $productID = $row['ProductID'];
            $quantity = $row['Quantity'];

            $productQuery = 'SELECT ProductName, Price FROM stock WHERE ProductSKU ="' . $productID . '"';
            $productResult = mysqli_query($con, $productQuery) or die (mysqli_error($con));
            $productRow = mysqli_fetch_assoc($productResult);
            $productName = $productRow['ProductName'];
            $productPrice = $productRow['Price'];

            $orderDescription .= "ProductSKU: " . $productID . ", ProductName: " . $productName . ", Quantity: " . $quantity . " Price: " . $productPrice . "; ";

            $orderTotal += $productPrice * $quantity;
        }

        $orderDescription = rtrim($orderDescription, "; ");




        $userInsertQuery = 'INSERT INTO orderhistory (Customer_ID, ProductName, ProductDescription, Quantity, Price, ProductSKU, OrderDate, OrderStatus)
                    VALUES ("' . $cID . '", "' . $productName . '", "' . $orderDescription . '", "' . $quantity . '", "' . $productPrice . '", "' . $productID . '", NOW(), "Pending")';
        mysqli_query($con, $userInsertQuery) or die (mysqli_error($con));

        $userInsertQuery = 'INSERT INTO orderprocessing (OrderTotal, CustomerID, OrderStatus, Order_Description, Email, FirstName, LastName, Address, City, Country, PostCode, PhoneNumber) 
        VALUES ("' . $orderTotal . '", "' . $cID . '", "Pending", "' . $orderDescription . '", "' . $email . '", "' . $fname . '", "' . $lname . '", "' . $address . '", "' . $city . '", "' . $country . '", "' . $postCode . '", "' . $phone . '")';
        mysqli_query($con, $userInsertQuery) or die (mysqli_error($con));




        $clearBasket = 'DELETE FROM customerbasket WHERE CustomerID="' . $cID . '"';
        mysqli_query($con, $clearBasket) or die (mysqli_error($con));

        $_SESSION['orderSuccessful'] = true;
    }
} else {
    header('Location: signInPageCustomer.php');
}

?>

<?php if (isset ($_SESSION['orderSuccessful'])): ?>
    <script type="text/javascript">
        alert("Order Successful!");
        window.location = "Cart.php";
    </script>
    <?php
    unset($_SESSION['orderSuccessful']);
endif; ?>
