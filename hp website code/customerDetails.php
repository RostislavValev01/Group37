<?php
session_start();
if(!isset($_SESSION['Customer_ID']) || $_SESSION['AdminStatus'] != 1){
    header('Location:productPage.php');
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Customer Details </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <link rel="stylesheet" type="text/css" href="customerDetails.css">
    <script defer src="loginAdmin.js"></script>
</head>

<body>

<nav class="banner">
<a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
<form action="productPage.php" method="get">
  <input type="text" name="search" class="search-bar"
    value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search products...">
  <input type="submit" value="Go" class="search-bar-go">
</form>
    <?php
    if (isset($_SESSION['loggedin'])) {
      if (isset($_SESSION['AdminStatus']) && $_SESSION['AdminStatus'] == 1) {
        ?>
        <nav class="header">
          <button><a href="AdminAccounts.php">Account</a></button>
          <button><a href="Cart.php">Basket</a></button>
          <button><a href="Contact.php">Contact Us</a></button>
          <button><a href="logout.php">Logout</a></button>
        </nav>
        <?php
      } else if (isset($_SESSION['AdminStatus']) && $_SESSION['AdminStatus'] == 0) {
        ?>
          <nav class="header">
            <button><a href="CustomerAccounts.php">Account</a></button>
            <button><a href="Cart.php">Basket</a></button>
            <button><a href="Contact.php">Contact Us</a></button>
            <button><a href="logout.php">Logout</a></button>
          </nav>
        <?php
      }
    } else {
      ?>
      <nav class="header">
        <button><a href="signInPageCustomer.php">Sign In</a></button>
        <button><a href="Cart.php">Basket</a></button>
        <button><a href="Contact.php">Contact Us</a></button>
      </nav>
      <?php
    }
    ?>
  </nav>

    <nav class="header-nav">
        <ul class="navigation-bar">
            <li><a href="homePage.php">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <nav class=Products>
                <a href="productPage.php"><button class="dropbtn">Products</button></a>
                <nav class="products-content">
                    <a href="productPage.php?Product_Category=General">General Medication</a>
                    <a href="productPage.php?Product_Category=SkinCare">SkinCare</a>
                    <a href="productPage.php?Product_Category=Haircare">HairCare</a>
                    <a href="productPage.php?Product_Category=DentalCare">DentalCare</a>
                    <a href="productPage.php?Product_Category=Vitamins_Supplements">Vitamins and Supplements</a>
                </nav>
            </nav>
        </ul>
    </nav>

    <?php
    require 'connectdb.php';
    $sort = 'Product';
    $order = 'asc';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        $searchWithWildcards = '%' . $search . '%';
        $sort = $_POST['sort'];
        $order = $_POST['order'];

        $query = "SELECT * FROM accountdetails WHERE (Customer_ID LIKE ? OR FirstName LIKE ? OR Surname LIKE ? OR MobileNumber LIKE ? OR Email LIKE ? OR CustomerAddress LIKE ? OR DateOfBirth LIKE ? OR AdminStatus LIKE ? OR Admin_ID LIKE ?) ORDER BY $sort $order";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "issssssis",
            $searchWithWildcards,
            $searchWithWildcards,
            $searchWithWildcards,
            $searchWithWildcards,
            $searchWithWildcards,
            $searchWithWildcards,
            $searchWithWildcards,
            $searchWithWildcards,
            $searchWithWildcards);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else {
        $search = '';
        $sort = 'Customer_ID';
        $order = 'asc';

        $query = "SELECT Customer_ID, FirstName, Surname, MobileNumber, Email, CustomerAddress, DateOfBirth, AdminStatus, Admin_ID FROM accountdetails";
        $result = mysqli_query($con, $query);
    }

    $clientDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <div class="content">
        <form action="" method="post">
            <input type="text" name="search" class="search-bar" placeholder="Search..."
                value="<?= htmlspecialchars($search) ?>">
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
<?php }?>
