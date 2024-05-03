<?php
session_start();
require_once("template/header.php");
require_once("../db/function.php");
$conn = db_connect();
if (!isset($_SESSION["admin"]) && $_SESSION["admin"] != "admin_open") {
    echo ' <div class="d-flex justify-content-center align-items-center" style="height:100vh">
    <div class="alert alert-danger d-flex flex-column  " role="alert">
      <p class="text-center">You not permited access this page.....</p>
      <a class="btn btn-danger text-center" href="./">Go Back >>>> </a>
   </div>
   </div>';
} else {
?>

    <section class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <?php include("template/admin_sidebar.php") ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0 text-decoration-none">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="logout.php">
                            <span class="btn btn-dark btn-sm d-none d-lg-inline-flex">Log Out</span>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Payments filter start -->

            <!-- Payments filter end -->
            <!-- Payments details start--- -->
            <div class="container-fluid pt-4 px-4">
                <!-- heading of payments -->
                <div class="payments_heading  fw-bold">
                    <h2>Payments Details</h2>
                </div>
                <div class="payments-container">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">CUSTOMER</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                        $result = getPaymentDetails();
                                            // Check if query was successful
                                        if ($result) {
                                            // Fetch and display each book details including image
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['id'];
                                                $cname = $row['name'];
                                                $phone = $row['phone'];
                                                $address = $row['address'];
                                                $price = $row['price'];
                                                $status = $row['status'];
                                    ?>
                                <tr>
                                    <td> <span class="mx-2"><?php echo $id ?></span></td>
                                    <td><?php echo $cname ?></td>
                                    <td><?php echo $phone ?></td>
                                    <td> <?php echo $address ?></td>
                                    <td> <?php echo $price ?></td>
                                    <td>
                                        <?php echo  $status == 1 ? "<div class='paid-success'>Paid</div>" : "<div class='pending-warn'>Pending</div>" ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                }  else {
                                    // Error handling if query fails
                                    echo "Error: " . mysqli_error($conn);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Payments details end--- -->
        </div>
        <!-- Content end -->
    </section>

<?php
}

require_once("template/footer.php");
?>