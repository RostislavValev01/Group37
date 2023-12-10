
    function redirectTo(page) {
        window.location.href = page;
    }

    // Add the following functions if needed
    function showPastOrders() {
        redirectTo('orderhistory.php');
    }

    function showCustomerDetails() {
        redirectTo('customerdetails.php');
    }

    function showStockManagement() {
        redirectTo('stockmanagement.php');
    }

    function showOrderProcessing() {
        redirectTo('orderprocessing.php');
    }
