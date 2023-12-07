<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Admin Accounts</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">

    <style>
        /* main part styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f5f5dc; /* Add your desired background color */
        }

        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #b8cca3; /* Add your desired background color */
        }

        .admin-section {
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
            padding: 20px;
        }

        .admin-sidebar {
            width: 200px;
            padding: 20px;
        }

        .admin-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            flex: 1;
            padding: 20px;
        }

        .box {
            width: calc(50% - 20px); /* Adjust the width based on your design */
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }

        button {
            padding: 10px;
            margin-top: 10px;
            cursor: pointer;
        }

        .admin-button-container button:hover {
        background-color: #ddd; /* Add your desired hover background color */
        color: #333; /* Add your desired hover text color */
}
    </style>

</head>
<body>

<nav class="banner">
        <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
        <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
        <nav class="header">
            <button><a href="accountPage.php">Account</a></button>
            <button><a href="basketPage.php">Basket</a></button>
            <button><a href="Contact.php">Contact Us</a></button>
        </nav>
    </nav>

    <nav class="header-nav">
        <ul class="navigation-bar">
            <li><a href="homePage">Home</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <nav class=Products>
                <button class="dropbtn">Products</button>
                <nav class="products-content">
                    <a href="productPage.php">Prescriptions</a>
                    <a href="productPage.php">Skin Care</a>
                    <a href="productPage.php">Hair Care</a>
                    <a href="productPage.php">Medication</a>
                </nav>
            </nav>
        </ul>
    </nav>

    <div class="admin-section">
        <div class="admin-content">
            <div class="box">
                <p>(Visible to logged in user)</p>
                <p>Username:</p>
                <p>Password:</p>
                <button onclick="updatePastOrders()">Update</button>
            </div>

            <div class="box">
                <p>(Visible to the logged in user)</p>

                <p> Email Address: </p>

                <p> Phone Number: </p>
                
                <button onclick="updateCustomerDetails()">Update</button>
            </div>

            <div class="box">
                <p>(Visible to the logged in user)</p>

                <p> Shipping Address </p>

                <button onclick="updateStockManagement()">Update</button>
            </div>

            <div class="box">
                <p>(Visible to the logged in user)</p>

                <p> Card Details </p>

                <button onclick="updateOrderProcessing()">Update</button>
                <button onclick="removeCardDetails()">Remove</button>
            </div>
        </div>

        <div class="admin-sidebar">
            <button onclick="showPastOrders()">View Past Orders</button>
            <button onclick="showCustomerDetails()">Customer Details Database</button>
            <button onclick="showStockManagement()">Stock Management Database</button>
            <button onclick="showOrderProcessing()">Order Processing</button>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-section">
            <div>
                <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
            </div>
            <div>
                <p>© 2023 HealthPoint. All rights reserved.

                    The content, design, and images on this website are the property of HealthPoint and are protected by
                    international copyright laws. Unauthorized use or reproduction of any materials without the express
                    written consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are
                    trademarks of HealthPoint.

                    For inquiries regarding the use or reproduction of any content on this website, please contact us at
                    HealthPoint@pharmacy.com</p>

            </div>
        </div>
    </footer>
</body>

</html>
