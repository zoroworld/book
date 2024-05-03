<?php
$adminurl = $_SERVER["REQUEST_URI"];
$adminparts = explode('/', $adminurl);
$orgurl = end($adminparts);
$adminorgparts = explode('.', $orgurl);
$geturl = $adminorgparts[0];
$set = $geturl;

// echo'<script> console.log("'.$geturl.'"); </script>';
?>

<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="admin_dashboard.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"></i>DASHBOARD</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="admin_dashboard.php"
                class="nav-item nav-link <?php echo ($geturl == "admin_dashboard") ? "active" : "" ?>"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle <?php echo ($geturl == "add_book" || $geturl == "view_book") ? "active" : "" ?>"
                    data-bs-toggle="dropdown" aria-expanded=" <?php echo ($geturl == "add_book" || $geturl == "view_book") ? "true" : "false" ?>">
                    <i class="fa-solid fa-book"></i>Books
                </a>
                <div class="dropdown-menu bg-transparent border-0  <?php echo ($geturl == "add_book" || $geturl == "view_book") ? "show" : "" ?>">
                    <a href="add_book.php"
                        class="dropdown-item <?php echo ($geturl == "add_book") ? "active" : "" ?>">Add Book</a>
                    <a href="view_book.php"
                        class="dropdown-item <?php echo ($geturl == "view_book") ? "active" : "" ?>">View Book</a>
                </div>
            </div>

            <a href="orders.php"
                class="nav-item nav-link  <?php echo ($geturl == "orders") ? "active" : "" ?>"><i
                    class="fa-regular fa-rectangle-list"></i>Orders</a>
            <a href="payment.php"
                class="nav-item nav-link  <?php echo ($geturl == "payment") ? "active" : "" ?>"><i
                    class="fa-regular fa-credit-card"></i>Payments</a>
            <a href="feedback.php"
                class="nav-item nav-link  <?php echo ($geturl == "feedback") ? "active" : "" ?>"><i
                    class="fa-solid fa-people-arrows"></i>Review</a>
            <a href="admin_panel.php"
                class="nav-item nav-link  <?php echo ($geturl == "admin_panel") ? "active" : "" ?>"><i
                    class="fa-solid fa-lock"></i>Admin</a>
            <!-- <a href="customers.php" class="nav-item nav-link"><i class="fa-solid fa-clock-rotate-left"></i>History</a> -->
        </div>
    </nav>
</div>
<!-- Sidebar End -->