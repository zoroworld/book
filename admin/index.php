<?php

require_once("template/header.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST["username"];
    $pass = $_POST["password"];

include("../db/function.php");
    $conn = db_connect();

    $sql = "SELECT * FROM login";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["user"] != $name || $row["pass"] != $pass) {
        echo '
        <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <div class="alert alert-danger" role="alert">
                        Password or username is wrong
                    </div>
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>';
    } else {
        session_start();
        $_SESSION["admin"] = "admin_open";
        header("Location: admin_dashboard.php");
    }
   

    // Close connection
    mysqli_close($conn);
}

?>

<section>

    <?php
?>

    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="" class="">
                            <h3 class="text-primary">ADMIN</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" id="floatingInput"
                                placeholder="username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Go back Home page <a href="../">Home page</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
</section>

<?php
require_once("template/footer.php");
?>