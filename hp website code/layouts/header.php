<nav class="banner">
    <a href="index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
        <li><a href="Index.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
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