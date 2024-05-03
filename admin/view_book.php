<?php
session_start();
require_once("template/header.php");
require_once("../db/function.php");
$conn = db_connect();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edsubmit'])) {

        $bookId = $_POST['bookId'];
        $isbn = $_POST['edIsbn'];
        $title = $_POST['edTitle'];
        $genre = $_POST['edgenre'];
        $price = $_POST['edprice'];
        $qty = $_POST['edqty'];
        $auth = $_POST['edauthor'];
        $desc = $_POST['eddesc'];
        $authId = $_POST['authId'];
        $authdesc = $_POST['edauthdesc'];
        $publisher = $_POST['edpublish'];
        $publisherdesc = $_POST['edpublisdesc'];
        $pubId = $_POST['publishId'];


        // book image
        $bookfilename = $_FILES["updateImg"]["name"];
        $booktempname = $_FILES["updateImg"]["tmp_name"];
        $bookfolder = "../dbimages/updateImg/" . $bookfilename;

        UpdateBook($bookId, $isbn, $title, $genre, $price, $qty, $desc, $bookfilename, $booktempname, $bookfolder);
        UpdateAuthor($authId, $auth, $authdesc);
        UpdatePublisher($pubId, $publisher, $publisherdesc);
    }
    if (isset($_POST["removeBook"])) {
        $removeallbook = $_POST["removeViewBook"];
        removeTheBook($removeallbook);
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

            <!-- Book filter start -->

            <!-- Book filter end -->
            <!-- book details start--- -->
            <div class="container-fluid pt-4 px-4">
                <!-- heading of book -->
                <div class="book_heading  fw-bold">
                    <h2>Book Details</h2>
                </div>
                <!-- g -->

                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">
                                    <div class="d-flex">
                                        <input class="form-check-input" type="checkbox">
                                        <span class="mx-2">Id</span>
                                    </div>
                                </th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Author</th>
                                <th scope="col">Publisher</th>
                                <th scope="col">Date</th>
                                <th scope="col">Discription</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $result = getBookDetails();
                            // Check if query was successful
                            if ($result) {
                                // Fetch and display each book details including image
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['b_id'];
                                    $aid = $row['aid'];
                                    $pid = $row['pid'];
                                    $isbn = $row['isbn'];
                                    $title = $row['title'];
                                    $desc = $row['description'];
                                    $price = $row['price'];
                                    $quantity = $row['quantity'];
                                    $book_genre = $row['genre_name'];
                                    $genreno = $row['genreno'];
                                    $author = $row['aname'];
                                    $publisher = $row['pname'];
                                    $image = $row['bimage'];
                                    $date = $row['date'];
                            ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <input class="form-check-input" type="checkbox">
                                                <span class="mx-2"><?php echo $id ?></span>
                                            </div>
                                        </td>
                                        <td><?php echo $isbn ?></td>
                                        <td>
                                            <div class="admin-img-contain">
                                                <img src="../dbimages/book_img/<?php echo $image ?>" alt="books of all">
                                            </div>
                                        </td>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $book_genre ?></td>
                                        <td><?php echo $price ?></td>
                                        <td><?php echo $quantity ?></td>
                                        <td><?php echo $author ?></td>
                                        <td><?php echo $publisher ?></td>
                                        <td><?php echo $date ?></td>
                                        <td>
                                            <div class="admin-book-dscrip">
                                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    description
                                                </button>
                                                <div class="collapse" id="collapseExample">
                                                    <div class="card card-body">
                                                        <?php echo $desc ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ViewBookItemContain">
                                                <button type="submit" name="editBook" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $id ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered  modal-lg">
                                                        <div class="modal-content">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update book</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">ISBN</label>
                                                                                <input type="text" name="edIsbn" value="<?php echo $isbn ?>" class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" name="edTitle" value="<?php echo $title ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="edit_img_contain d-flex mb-3 align-items-center">
                                                                                <div class="edit_book_img_contain">
                                                                                    <img src="../dbimages/book_img/<?php echo $image ?>" alt="books of all">
                                                                                </div>
                                                                                <div class="mx-2">
                                                                                    <label class="form-label">Update image</label>
                                                                                    <input class="form-control" name="updateImg" type="file" id="formFile">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Genre</label>
                                                                                <select name="edgenre" class="form-select" id="floatingGenre" aria-label="Default select example">
                                                                                    <option value="<?php echo $genreno; ?>" selected="<?php echo $genreno; ?>">
                                                                                        <?php echo $book_genre; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                    if ($book_genre == 'Horror') {
                                                                                    ?>
                                                                                        <!-- <option value="1">Horror</option> -->
                                                                                        <option value="2">Fantasy</option>
                                                                                        <option value="3">Adventure</option>
                                                                                    <?php }
                                                                                    if ($book_genre == "Fantasy") {
                                                                                    ?>
                                                                                        <option value="1">Horror</option>
                                                                                        <option value="3">Adventure</option>
                                                                                    <?php
                                                                                    }
                                                                                    if ($book_genre == "Adventure") {
                                                                                    ?>
                                                                                        <option value="1">Horror</option>
                                                                                        <option value="2">Fantasy</option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Price</label>
                                                                                <input type="text" name="edprice" value="<?php echo $price ?>" class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Quantity</label>
                                                                                <input type="text" name="edqty" value="<?php echo $quantity ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-floating edit_text mb-3">
                                                                        <textarea class="form-control" name="eddesc" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"><?php echo $desc ?></textarea>
                                                                        <label for="floatingTextarea">Update book description</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Author</label>
                                                                                <input type="text" name="edauthor" value="<?php echo $author ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-floating edit_text">
                                                                                <textarea class="form-control" name="edauthdesc" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"><?php echo $desc ?></textarea>
                                                                                <label for="floatingTextarea">Update author
                                                                                    description</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Publisher</label>
                                                                                <input type="text" name="edpublish" value="<?php echo $publisher ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-floating edit_text">
                                                                                <textarea class="form-control" name="edpublisdesc" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"><?php echo $desc ?></textarea>
                                                                                <label for="floatingTextarea">Update publisher
                                                                                    description</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="bookId" value="<?php echo $id ?>">
                                                                    <input type="hidden" name="authId" value="<?php echo $aid ?>">
                                                                    <input type="hidden" name="publishId" value="<?php echo $pid ?>">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="edsubmit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            <form action="" method="POST">
                                                <input type="hidden" name="removeViewBook" value="<?php echo $id ?>" hidden>
                                                <button type="submit" name="removeBook" class=" btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
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
        <!-- book details end--- -->
        </div>
        <!-- Content end -->
    </section>

<?php
}
require_once("template/footer.php");
?>