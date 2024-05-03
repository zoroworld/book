<?php
session_start();
require_once("template/header.php");
require_once("../db/phperror.php");
require_once("../db/function.php");
$conn = db_connect();

// Initialize completed tasks session array if not already set
if (!isset($_SESSION['completedTasks'])) {
    $_SESSION['completedTasks'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['givetask'])) {
        if ($_POST['givetask'] != '') {
            $taketask = $_POST['givetask'] ?? '';
            insertTask($taketask);
            // Redirect to prevent resubmission
            header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
            exit(); // Prevents further code execution
        } else {
            echo 'write task';
        }
    } else if (isset($_POST['removeTaskFromList'])) {
        $removetask = $_POST['removetask'];
        removeTaskFromList($removetask);
        // Redirect to prevent resubmission
        // Also remove from completed tasks session if it's there
        $_SESSION['completedTasks'] = array_diff($_SESSION['completedTasks'], [$taskId]);
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
        exit(); // Prevents further code execution

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
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="logout.php">
                            <span class="btn btn-dark btn-sm d-none d-lg-inline-flex">Log Out</span>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total book Sale</p>
                                <?php
                                //total book count
                                $result = totalbookorder();
                                $row = mysqli_fetch_assoc($result);
                                $count = $row['count'];

                                ?>
                                <h2 class="mb-0 fw-bold"><?php echo $count; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total book sale price</p>
                                <?php
                                //total sum profit
                                $tolprice = totalbooksaleprice();

                                ?>
                                <h2 class="mb-0 fw-bold"><span>Rs </span><span><?php echo $tolprice; ?></span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h2 class="mb-0 fw-bold">
                                    <span>
                                        <?php
                                        //total sum profit
                                        $caurrentsale = currentSale();
                                        echo $caurrentsale;
                                        ?>
                                    </span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <?php
                                //total sum profit
                                $currtolprice = currentPriceSale();
                                ?>
                                <p class="mb-2">Today Revenue</p>
                                <h2 class="mb-0 fw-bold"><span>Rs </span><span><?php echo $currtolprice ?></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                    </div>
                    <div class="tab-contain">
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Id</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = getdashboardPaymentDetails();
                                    // Check if query was successful
                                    if ($result) {
                                        // Fetch and display each book details including image
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $cname = $row['name'];
                                            $price = $row['price'];
                                            $status = $row['status'];
                                    ?>
                                            <tr>
                                                <td> <span class="mx-2"><?php echo $id ?></span></td>
                                                <td><?php echo $cname ?></td>
                                                <td> <?php echo $price ?></td>
                                                <td>
                                                    <?php echo $status == 1 ? "Paid" : "Pending" ?>
                                                </td>
                                                <td>
                                                    <form action="orders.php" method="POST">
                                                        <input type="hidden" name="ordid" value="<?php echo $id ?>">
                                                        <button class="btn btn-primary btn-sm" type="submit">Details</button>
                                                    </form>
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
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Feedback</h6>
                                <a href="feedback.php">Show All</a>
                            </div>
                            <div class="feedback-contain">
                                <div class="feedback-responsive">

                                    <?php
                                    $result = getAlldashboarReview();
                                    // Check if query was successful
                                    if ($result) {
                                        // Fetch and display each book details including image
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $cname = $row['name'];
                                            $feedback = $row['feedback'];
                                            $date = $row['date'];
                                    ?>
                                            <div class="d-flex align-items-center border-bottom py-3">
                                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                                <div class="w-100 ms-3">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h6 class="mb-0"><?php echo $cname; ?></h6>
                                                        <small><?php echo $date; ?></small>
                                                    </div>
                                                    <span><?php echo $feedback; ?></span>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    } else {
                                        // Error handling if query fails
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                            </div>
                            <form action="" method="POST">
                                <div class="d-flex mb-2">
                                    <input class="form-control bg-transparent" type="text" name="givetask" placeholder="Enter task">
                                    <button type="submit" class="btn btn-primary ms-2">Add</button>
                                </div>
                            </form>
                            <div class="overflow-y-auto givehightadmindash">



                                <?php




                                $result = dasboardTask();
                                // Check if query was successful
                                if ($result) {
                                    // Fetch and display each book details including image
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $task = $row['task'];
                                        $id = $row['t_id'];
                                ?>
                                        <div class="d-flex align-items-center border-bottom py-2 alltakeConatine">

                                            <input class="form-check-input mt-2 completeTask" type="checkbox" value="<?php echo $id; ?>">


                                            <div class="w-100 ms-3">
                                                <div class="d-flex w-100 align-items-center justify-content-between">
                                                    <span class="getthenewid"><?php echo $task; ?></span>
                                                    <form action="admin_dashboard.php" method="POST">
                                                        <input type="hidden" name="removetask" value="<?php echo $id; ?>">
                                                        <button type="submit" name="removeTaskFromList" class="btn btn-sm"><i class="fa fa-times"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- Widgets End -->

    </section>

<?php
}
// Close connection
mysqli_close($conn);
require_once("template/footer.php");
?>