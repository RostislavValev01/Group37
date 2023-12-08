<?php 
require 'connectdb.php';

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'Product';
$order = isset($_GET['order']) ? $_GET['order'] : 'asc';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $search = $_GET['search'];
    $searchWithWildcards = '%' . $search . '%';


    $query = "SELECT * FROM stock WHERE Product LIKE ? ORDER BY $sort $order";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $searchWithWildcards);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

} else if (isset($_GET['Product_Category'])) {
    $category = $_GET['Product_Category'];

    $query = "SELECT SKU_number, Product, Price, Product_Status, Product_Category, Product_Description FROM stock WHERE Product_Category = ? ORDER BY $sort $order";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $category);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


} else {
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'Product';
    $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
    $query = "SELECT SKU_number, Product, Price, Product_Status, Product_Category, Product_Description FROM stock ORDER BY $sort $order";
    $result = mysqli_query($con, $query);

}

$stock = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>