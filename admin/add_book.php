<?php

require_once("../db/phperror.php"); //to find error
session_start();
require_once("template/header.php");
require_once("../db/function.php");
$conn = db_connect();

// //then insert in book and publisher

if (isset($_POST["submit"])) {

    //check for duplicate
    $isbn = $_POST["isbn"];

    //check book present or not-------
    $check = checkBookPresentOrNot($isbn);
    if ($check != true) {
        header("Location: add_book.php");
    }

    //get author id
    $author = $_POST["author"];
    $author_details = $_POST["author_desc"];
    $authorfilename = $_FILES["author_img"]["name"];
    $authortempname = $_FILES["author_img"]["tmp_name"];
    $authorfolder = "../dbimages/author_img/" . $authorfilename;



    //function to get author id----------
    $auther_id = setAndGetAuthorId($author, $author_details, $authortempname, $authorfolder, $authorfilename);

    $publisher = $_POST["publisher"];
    $publisher_details = $_POST["publisher_desc"];

    // Publisher Image file handling
    $publisherfilename = $_FILES["publisher_img"]["name"];
    $publishertempname = $_FILES["publisher_img"]["tmp_name"];
    $publisherfolder = "../dbimages/publisher_img/" . $publisherfilename;


    //function to insert publisher book with the author
    $publisher_id = setAndGetPublisherId($publisher, $publisher_details, $publishertempname, $publisherfolder, $auther_id, $publisherfilename);

    //   All  details---------------------------------------------------------------------------

    $book_title = $_POST["title"];
    $book_desc = $_POST["desc"];
    $book_price = $_POST["price"];
    $book_quantity = $_POST["quantity"];
    $book_genre = $_POST["bookoptions"];

    // Book Image file handling
    $bookfilename = $_FILES["book_img"]["name"];
    $booktempname = $_FILES["book_img"]["tmp_name"];
    $bookfolder = "../dbimages/book_img/" . $bookfilename;

    //function to inser book with the author
    setBook($isbn, $book_title, $book_desc, $book_price, $book_quantity, $book_genre , $auther_id, $publisher_id, $booktempname, $bookfolder, $bookfilename);
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

            <!-- book details start--- -->
            <div class="container-fluid pt-4 px-4">
                <!-- heading of book -->
                <div class="book_heading fw-bold">
                    <h2>Add book details</h2>
                </div>
                <div class="bg-light rounded h-100 p-4">
                    <form action="" class="form-cont" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="book-form-contain">
                                    <!-- book details -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputIsbn" class="form-label">Isbn of book</label>
                                                <input type="text" name="isbn" class="form-control form-control-sm" id="exampleInputIsbn" aria-describedby="IsbnHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputtitle" class="form-label">Title of book</label>
                                                <input type="text" name="title" class="form-control form-control-sm" id="exampleInputtitle" aria-describedby="titleHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputPrice" class="form-label">Price of book</label>
                                                <input type="number" name="price" class="form-control form-control-sm" id="exampleInputPrice" aria-describedby="PriceHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputQuantity" class="form-label">Quantity of
                                                    book</label>
                                                <input type="number" name="quantity" class="form-control form-control-sm" id="exampleInputQuantity" aria-describedby="QuantityHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="floatingGenre" class="form-label">Book Types</label>
                                                <select name="bookoptions" class="form-select" id="floatingGenre" aria-label="Default select example">
                                                    <option selected>Select genre </option>
                                                    <option value="1">Horror</option>
                                                    <option value="2">Fantasy</option>
                                                    <option value="3">Adventure</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                         <div class="mb-3">
                                           <label for="floatingDesc" class="form-label">Description of book</label>
                                           <textarea name="desc" class="form-control" id="floatingDesc" style="height: 100px;"></textarea>
                                         </div>
                                        </div>
                                    </div>
                                    <!-- book Author details -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputAuthor" class="form-label">Author of book</label>
                                                <input type="text" name="author" class="form-control form-control-sm" id="exampleInputAuthor" aria-describedby="AuthorHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="floatingAuthorDesc" class="form-label">Author Detail</label>
                                                <textarea name="author_desc" class="form-control form-control-sm" id="floatingAuthorDesc" style="height: 100px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- book publisher details -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputPublisher" class="form-label">Publisher of
                                                    book</label>
                                                <input type="text" name="publisher" class="form-control form-control-sm" id="exampleInputPublisher" aria-describedby="PublisherHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="floatingPublisherDesc" class="form-label">Publisher
                                                    Detail</label>
                                                <textarea name="publisher_desc" class="form-control" id="floatingPublisherDesc" style="height: 100px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formBookFile" class="form-label">Book Image</label>
                                    <input class="form-control form-control-sm" name="book_img" type="file" id="formBookFile">
                                </div>
                                <div class="mb-3">
                                    <label for="formAuthorFile" class="form-label">Author Image</label>
                                    <input class="form-control form-control-sm" name="author_img" type="file" id="formAuthorFile">
                                </div>
                                <div class="mb-3">
                                    <label for="formPublisherFile" class="form-label">Publisher_ Image</label>
                                    <input class="form-control form-control-sm" name="publisher_img" type="file" id="formPublisherFile">
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary">
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
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