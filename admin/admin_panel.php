<?php
require_once("template/header.php");
require_once("../db/function.php");

if(isset($_POST['update']))
{
//change the admin--
$admin_user = $_POST['admin_user'];
$admin_pass =  $_POST['admin_pass'];

//send to function
setAdmin($admin_user, $admin_pass);

}

session_start();
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

            <!-- book details start--- -->
            <div class="container-fluid pt-4 px-4">
                <!-- heading of book -->
                <div class="book_heading fw-bold">
                    <h2>Add book details</h2>
                </div>
                <div class="bg-light rounded h-100 p-4">
                    <?php
                      $conn = db_connect();
                      $row = getAdmin();
                      $adminname = $row['user'];
                      $adminpass = $row['pass'];
                    ?>
                    <form action="" method="post">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleInputAdminusername" class="form-label">Admin username</label>
                                    <input type="text" name="admin_user" value="<?php echo $adminname ?>" class="form-control" id="exampleInputAdminusername" aria-describedby="AdminusernameHelp">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleInputAdminpassword" class="form-label">Admin password</label>
                                    <input type="password" name="admin_pass" value="<?php echo $adminpass ?>" class="form-control" id="exampleInputAdminpassword" aria-describedby="AdminpasswordHelp">
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <input type="submit" name="update" class="btn btn-primary" value="Update">
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexcheckedadpass">
                            <label class="form-check-label" for="flexcheckedadpass">
                                See password
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Admin details end--- -->
        </div>
        <!-- Content end -->
    </section>


<?php
}
require_once("template/footer.php");
?>