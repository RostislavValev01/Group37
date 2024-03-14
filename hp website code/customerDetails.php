<?php
session_start();
require 'connectdb.php';

if (!isset($_SESSION['Customer_ID']) || $_SESSION['AdminStatus'] != 1) {
    header('Location:productPage.php');
    exit();
} else {
    $search = '';
    $sort = 'Customer_ID';
    $order = 'asc';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $sort = isset($_POST['sort']) ? $_POST['sort'] : 'Customer_ID';
        $order = isset($_POST['order']) ? $_POST['order'] : 'asc';

        $query = "SELECT * FROM accountdetails WHERE Customer_ID = ? OR FirstName LIKE ? OR Surname LIKE ? OR MobileNumber LIKE ? OR Email LIKE ? OR CustomerAddress LIKE ? OR DateOfBirth = ? OR AdminStatus = ? OR Admin_ID LIKE ? ORDER BY $sort $order";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param(
                $stmt,
                "issssssis",
                $search,
                $search,
                $search,
                $search,
                $search,
                $search,
                $search,
                $search,
                $search
            );

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            $clientDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            echo "Error preparing statement: " . mysqli_error($con);
        }
    } else {
        // If it's not a POST request, retrieve all 
        $query = "SELECT Customer_ID, FirstName, Surname, MobileNumber, Email, CustomerAddress, DateOfBirth, AdminStatus, Admin_ID FROM accountdetails";
        $result = mysqli_query($con, $query);

        $clientDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">

    <head>
        <title>Customer Details </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="HealthPoint.css">
        <link rel="stylesheet" type="text/css" href="css/customerDetails.css">
        <script defer src="adminAddCustomer.js"></script>
    </head>

    <body>

        <nav class="banner">
            <a href="Index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
            <form action="productPage.php" method="get">
                <input type="text" name="search" class="search-bar"
                    value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>"
                    placeholder="Search products...">
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search = isset($_POST['search']) ? $_POST['search'] : '';
            $searchWithWildcards = '%' . $search . '%';
            $sort = isset($_POST['sort']) ? $_POST['sort'] : 'Customer_ID';
            $order = isset($_POST['order']) ? $_POST['order'] : 'asc';

            $query = "SELECT * FROM accountdetails WHERE Customer_ID = ? OR FirstName LIKE ? OR Surname LIKE ? OR MobileNumber LIKE ? OR Email LIKE ? OR CustomerAddress LIKE ? OR DateOfBirth = ? OR AdminStatus = ? OR Admin_ID LIKE ? ORDER BY $sort $order";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param(
                $stmt,
                "issssssis",
                $searchWithWildcards,
                $searchWithWildcards,
                $searchWithWildcards,
                $searchWithWildcards,
                $searchWithWildcards,
                $searchWithWildcards,
                $searchWithWildcards,
                $searchWithWildcards,
                $searchWithWildcards
            );
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

        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Edit Customer</h2>
                <form method="post" action="updateCustomer.php">
                    <input type="hidden" id="customerId" name="customerId" value="">
                    <label for="editFirstName">First Name:</label>
                    <input type="text" id="editFirstName" name="editFirstName"><br>
                    <label for="editLastName">Last Name:</label>
                    <input type="text" id="editLastName" name="editLastName"><br>
                    <label for="editMobile">Mobile Number:</label>
                    <input type="text" id="editMobile" name="editMobile"><br>
                    <label for="editEmail">Email Address:</label>
                    <input type="text" id="editEmail" name="editEmail"><br>
                    <label for="editAddress">Home Address:</label>
                    <input type="text" id="editAddress" name="editAddress"><br>
                    <label for="editDoB">Date of Birth:</label>
                    <input type="text" id="editDoB" name="editDoB"><br>
                    <label for="editStatus">Admin Status:</label>
                    <input type="text" id="editStatus" name="editStatus"><br>
                    <label for="editAdmin">Admin ID:</label>
                    <input type="text" id="editAdmin" name="editAdmin"><br>

                    <input type="submit" name="saveChanges" value="Save Changes">
                </form>
            </div>
        </div>

        <script>
            function openEditModal() {
                document.getElementById("editModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("editModal").style.display = "none";
            }

            function populateEditModal(customerId, firstName, lastName, mobile, email, address, dob, status, adminId) {
                document.getElementById("customerId").value = customerId;
                document.getElementById("editFirstName").value = firstName;
                document.getElementById("editLastName").value = lastName;
                document.getElementById("editMobile").value = mobile;
                document.getElementById("editEmail").value = email;
                document.getElementById("editAddress").value = address;
                document.getElementById("editDoB").value = dob;
                document.getElementById("editStatus").value = status;
                document.getElementById("editAdmin").value = adminId;

                openEditModal();
            }
        </script>



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
            <div id="addModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeAddModal()">&times;</span>
                    <h2>Add New Customer</h2>
                    <form method="post" action="addCustomer.php">
                        <label for="newFirstName">First Name:</label>
                        <input type="text" id="newFirstName" name="newFirstName"><br>
                        <label for="newLastName">Last Name:</label>
                        <input type="text" id="newLastName" name="newLastName"><br>
                        <label for="newPassword">Password:</label>
                        <input type="text" id="newPassword" name="newPassword"><br>
                        <label for="newMobile">Mobile Number:</label>
                        <input type="text" id="newMobile" name="newMobile"><br>
                        <label for="newEmail">Email Address:</label>
                        <input type="text" id="newEmail" name="newEmail"><br>
                        <label for="newAddress">Home Address:</label>
                        <input type="text" id="newAddress" name="newAddress"><br>
                        <label for="editDoB">Date of Birth:</label>
                        <input type="text" id="newDoB" name="newDoB"><br>
                        <label for="newStatus">Admin Status:</label>
                        <input type="text" id="newStatus" name="newStatus"><br>
                        <label for="newAdminId">Admin ID:</label>
                        <input type="text" id="newAdminId" name="newAdminId"><br>

                        <input type="submit" name="addCustomer" value="Add Customer">
                    </form>
                </div>
            </div>

            <button class="add-customer-button" onclick="openAddModal()">Add New Customer</button>

            <script>
                function openAddModal() {
                    document.getElementById("addModal").style.display = "block";
                }

                function closeAddModal() {
                    var modal = document.getElementById("addModal").style.display = "none";
                }
            </script>

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
                        <td>
                            <button class="edit-btn"
                                onclick="populateEditModal('<?= htmlspecialchars($customer['Customer_ID']) ?>','<?= htmlspecialchars($customer['FirstName']) ?>',
                            '<?= htmlspecialchars($customer['Surname']) ?>', '<?= htmlspecialchars($customer['MobileNumber']) ?>','<?= htmlspecialchars($customer['Email']) ?>',
                            '<?= htmlspecialchars($customer['CustomerAddress']) ?>', '<?= htmlspecialchars($customer['DateOfBirth']) ?>', 
                            '<?= htmlspecialchars($customer['AdminStatus']) ?>', '<?= htmlspecialchars($customer['Admin_ID']) ?>')">Edit</button>

                            <button class="delete-btn"
                                onclick="openDeleteModal('<?= htmlspecialchars($customer['Customer_ID']) ?>')">Delete</button>
                        </td>
                    </tr>
                    <div id="deleteModal<?= $customer['Customer_ID'] ?>" class="modal">
                        <div class="modal-content">
                            <span class="close"
                                onclick="closeDeleteModal('<?= htmlspecialchars($customer['Customer_ID']) ?>')">&times;</span>
                            <h2>Delete Customer</h2>
                            <p>Are you sure you want to delete this customer?</p>
                            <form action="deleteCustomer.php" method="post">
                                <input type="hidden" name="customerId"
                                    value="<?= htmlspecialchars($customer['Customer_ID']) ?>">
                                <label for="adminPassword">Admin Password:</label>
                                <input type="password" id="adminPassword" name="adminPassword" required><br>
                                <input type="submit" name="deleteCustomer" value="Delete">
                            </form>
                        </div>
                    </div>
                    </td>
                <?php endforeach; ?>
            </table>
            <nav class="table-np">
                <ul>
                    <li><a href="?page=<?= max(1, $page - 1) ?>&search=<?= urlencode($search) ?>">Previous</a></li>
                    <li><a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">Next</a></li>
                </ul>
            </nav>
        </div>

        <script>
            function openDeleteModal(customerId) {
                document.getElementById("deleteModal" + customerId).style.display = "block";
            }

            function closeDeleteModal(customerId) {
                document.getElementById("deleteModal" + customerId).style.display = "none";
            }
        </script>
    </body>
    <footer class="footer">
        <div class="footer-section">
            <div>
                <img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
<?php } ?>
