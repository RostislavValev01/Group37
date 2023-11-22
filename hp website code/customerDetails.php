<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details </title>
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <script defer src=""></script>
    <style></style>
</head>

<body>

<nav class="header">
        <a href="homePage.php"><img src="hplogo3.png" alt="Company Logo"></a>
        <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
        <button><a href="accountPage.php">Account</a></button>
        <button><a href="basketPage.php">Basket</a></button>
        <button><a href="contactUsPage.php">Contact Us</a></button>
</nav>

    <nav class="header-nav">
        <ul class="navigation-bar">
            <li><a href="homePage">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
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

    <form action="" method="post">
        <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
        <select name="sort">
        <option value="customerID">Customer ID</option>
            <option value="fname">First Name</option>
            <option value="lname">Last Name</option>
            <option value="mobile">Contact Number</option>
            <option value="email">Email</option>
            <option value="address">Address</option>
            <option value="DOB">Date of Birth</option>
            <option value="Admin Status">Admin Status</option>
            <option value="Admin ID">Admin ID</option>
        </select>

        <select name="order">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>
        <input type="submit" value="Search">
    </form>
    <table>
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

        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= htmlspecialchars($customer['customerID']) ?></td>
                <td><?= htmlspecialchars($customer['fname']) ?></td>
                <td><?= htmlspecialchars($customer['lname']) ?></td>
                <td><?= htmlspecialchars($customer['mobile']) ?></td>
                <td><?= htmlspecialchars($customer['email']) ?></td>
                <td><?= htmlspecialchars($customer['address']) ?></td>
                <td><?= htmlspecialchars($customer['DOB']) ?></td>
                <td><?= htmlspecialchars($customer['Admin Status']) ?></td>
                <td><?= htmlspecialchars($customer['Admin ID']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <nav>
        <ul>
            <li><a href="?page=<?= max(1, $page - 1) ?>&search=<?= urlencode($search) ?>">Previous</a></li>
            <li><a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">Next</a></li>
        </ul>
    </nav>
</body>

</html>
