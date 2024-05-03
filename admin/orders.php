<?php
session_start();
require_once("template/header.php");
require_once("../db/function.php");
$conn = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["removeorder"])) {
        $removeallorder = $_POST["removeViewOrder"];
        removeTheOrder($removeallorder);
    }
}

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
                <!-- <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div> -->
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="logout.php">
                            <span class="btn btn-dark btn-sm d-none d-lg-inline-flex">Log Out</span>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Orders filter start -->

            <!-- Orders filter end -->
            <!-- Orders details start--- -->
            <div class="container-fluid pt-4 px-4">
                <!-- heading of orders -->
                <div class="orders_heading  fw-bold">
                    <h2>Orders Details</h2>
                </div>
                <div class="order-container">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">ITEMS</th>
                                    <th scope="col">CUSTOMER</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">DELLIVIRY</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = getOrderDetails();
                                // Check if query was successful
                                if ($result) {
                                    // Fetch and display each book details including image
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['oid'];
                                        $item = $row['item'];
                                        $item_list = $row['item_list'];
                                        $cname = $row['cname'];
                                        $phone = $row['phone'];
                                        $address = $row['address'];
                                        $price = $row['price'];
                                        $status = $row['status'];
                                        $dil_status = $row['dilivery_status'];
                                        $date = $row['date'];
                                ?>
                                        <tr>
                                            <td> <span class="mx-2"><?php echo $id ?></span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <strong><?php echo $item ?></strong>
                                                    <div class="admin-order-details mx-2 align-items-center">
                                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#ittemsExample" aria-expanded="false" aria-controls="ittemsExample">
                                                            SEE ITEMS
                                                        </button>
                                                        <div class="collapse" id="ittemsExample">
                                                            <div class="card card-body">
                                                                <div class="book-colllection">
                                                                    <div><span>Id</span> | <span>Title</span></div>
                                                                    <hr>
                                                                    <?php
                                                                    $data = json_decode($item_list, TRUE);
                                                                    // print_r($data);
                                                                    for ($i = 0; $i < count($data); $i++) {
                                                                        $title = selectItem($data[$i]);

                                                                    ?>
                                                                        <div><span class="fw-bold"><?php echo $data[$i]; ?></span> | <span class="text-primary"><?php echo $title; ?></span></div>
                                                                        <hr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $cname ?></td>
                                            <td><?php echo $price ?></td>
                                            <td> <?php echo $status == 1 ? "<div class='paid-success'>Paid</div>" : "<div class='pending-warn'>Pending</div>" ?>
                                            </td>
                                            <td><?php echo $dil_status == 1 ? "<div class='paid-success'>SUCCESS</div>" : "<div class='danger-warn'>NOT SUCCESS</div>" ?>
                                            </td>
                                            <td><?php echo $date ?></td>
                                            <td>
                                                <div class="viewOrderContain">
                                                    <button type="submit" name="editOrder" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrder"><i class="fa-regular fa-eye"></i></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="viewOrder" tabindex="-1" aria-labelledby="viewOrderLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="viewOrderLabel">View Order</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="" method="POST">
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <div class="order-contain">
                                                                                <?php
                                                                                $data = json_decode($item_list, TRUE);
                                                                                ?>
                                                                                <p class="view-order form-label"><span class="fw-bold view-it">ITEMS: </span><span><?php echo count($data); ?></span></p>
                                                                                <p class="view-order form-label "><span class="fw-bold view-it">CUSTOMER: </span><span class="text-capitalize"><?php echo $cname ?></span></p>
                                                                                <p class="view-order form-label"><span class="fw-bold view-it">PHONE: </span><span class="text-capitalize"><?php echo $phone ?></span></p>
                                                                                <p class="view-order form-label"><span class="fw-bold view-it">ADDRESS: </span><span class="text-capitalize"><?php echo $address ?></span></p>
                                                                                <p class="view-order form-label"><span class="fw-bold view-it">PRICE: </span><span class="text-capitalize"><?php echo $price ?></span></p>
                                                                                <p class="view-order form-label">
                                                                                    <?php echo $dil_status == 1 ? "<span class='fw-bold view-it'>STATUS: </span><span class='paid-success w-50 view-it'>SUCCESS</span>" : "<span class='fw-bold'>STATUS: </span><span class='danger-warn'>NOT SUCCESS</span>" ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="removeViewOrder" value="<?php echo $id ?>">
                                                        <button type="submit" name="removeorder" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    // Error handling if query fails
                                    echo "Error: " . mysqli_error($conn);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Orders details end--- -->
        </div>
        <!-- Content end -->
    </section>

<?php
}
require_once("template/footer.php");
?>