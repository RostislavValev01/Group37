<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Customer Details </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <script defer src="loginAdmin.js"></script>
    <style>
        form {
            margin-bottom: 20px;
        }

        /*text within search bar settings */
        input[type="text"],
        select,
        input[type="submit"] {
            padding: 10px;
            margin: 5px;
        }

        input[type="text"],
        select {
            width: 200px;
        }

        select {
            width: 150px;
        }

        /* search bar 'search' button settings */
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        /* headings settings */
        h1#customer-header {
            color: #333;
            text-align: center;
            margin-right: 60px;
        }

        /* size of table */
        table.customer-table {
            width: 95%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 20px;
        }

        /* border style, size and colour */
        table.customer-table th,
        table.customer-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        /* colour of table headings */
        table.customer-table th {
            background-color: #4caf50;
            color: white;
        }

        /* colour of table rows */
        table.customer-table tr:hover {
            background-color: #f5f5f5;
        }

        /* size of images */
        table.customer-table img {
            max-width: 100px;
            max-height: 100px;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .table-np ul li{
            margin-left: 20px;
            list-style-type: none;
            display: inline;
            
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
            <button><a href="contactUsPage.php">Contact Us</a></button>
        </nav>
    </nav>

    <nav class="header-nav">
    <ul class="navigation-bar">
      <li><a href="homePage.php">Home</a></li>
      <li><a href="aboutUs.php">About Us</a></li>
      <nav class=Products>
        <button class="dropbtn">Products</button>
        <nav class="products-content">
          <a href="productPage.php?category=Prescriptions">Prescriptions</a>
          <a href="productPage.php?category=Skin Care">Skin Care</a>
          <a href="productPage.php?category=Hair Care">Hair Care</a>
          <a href="productPage.php?category=Dental Care">Dental Care</a>
          <a href="productPage.php?category=Vitamins and Supplements">Vitamins and Supplements</a>
        </nav>
      </nav>
    </ul>
  </nav>

    <?php
    require 'connectdb.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        $sort = $_POST['sort'];
        $order = $_POST['order'];

        $stmt = $pdo->prepare("SELECT * FROM accountdetails WHERE (Customer_ID LIKE :search OR FirstName LIKE :search OR Surname LIKE :search OR MobileNumber LIKE :search OR Email LIKE :search OR CustomerAddress LIKE :search OR DateOfBirth LIKE :search OR AdminStatus LIKE :search OR Admin_ID LIKE :search) ORDER BY $sort $order");
        $stmt1->execute(['search' => "%$search%"]);
        $stmt->execute(['search' => "%$search%"]);
    } else {
        $search = '';
        $sort = 'Customer_ID';
        $order = 'asc';

        $sql = "SELECT Customer_ID, FirstName, Surname, MobileNumber, Email, CustomerAddress, DateOfBirth, AdminStatus, Admin_ID FROM accountdetails";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    $clientDetails = $stmt->fetchAll();
    ?>

    <div class="content">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <select name="sort">
                <option value="Customer_ID">Customer ID</option>
                <option value="FirstName">First Name</option>
                <option value="Surname">Last Name</option>
                <option value="MobileNumber">Contact Number</option>
                <option value="Email">Email</option>
                <option value="CustomerAddress">Address</option>
                <option value="DateOfBirth">Date of Birth</option>
                <option value="AdminStatus">Admin Status</option>
                <option value="Admin_ID">Admin ID</option>
            </select>

            <select name="order">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
            <input type="submit" value="Search">
        </form>

        <h1 id="customer-header">Customer Database</h1>
        <table class="customer-table">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Admin Status</th>
                    <th>Admin ID</th>
                </tr>
            </thead>

            <?php foreach ($clientDetails as $customer): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($customer['Customer_ID']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($customer['FirstName']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($customer['Surname']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($customer['MobileNumber']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($customer['Email']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($customer['CustomerAddress']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($customer['DateOfBirth']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($customer['AdminStatus']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($customer['Admin_ID']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <nav class="table-np">
            <ul>
                <li><a href="?page=<?= max(1, $page - 1) ?>&search=<?= urlencode($search) ?>">Previous</a></li>
                <li><a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">Next</a></li>
            </ul>
        </nav>
    </div>
</body>
<footer class="footer">
    <div class="footer-section">
        <div>
            <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
        </div>
        <div>
            <p>© 2023 HealthPoint. All rights reserved.

                The content, design, and images on this website are the property of HealthPoint and are protected by
                international copyright laws. Unauthorized use or reproduction of any materials without the express
                written
                consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of
                HealthPoint.

                For inquiries regarding the use or reproduction of any content on this website, please contact us at
                HealthPoint@pharmacy.com</p>

        </div>
    </div>
</footer>

</html>
