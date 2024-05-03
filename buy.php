<?php
//session start-----
session_start();

$adminurl = $_SERVER["REQUEST_URI"];
$adminparts = explode('/', $adminurl);
$orgurl = end($adminparts);
$adminorgparts = explode('.', $orgurl);
$geturl = $adminorgparts[0];
$set = $geturl;

require_once ("db/phperror.php");
require_once ("db/function.php");

$conn = db_connect();

make_array_to_json();

//for getting cart list we add--------------
$productOrderEmpty = count_order_product();



$siteTitle = "Book | Buy";
$author = "bookauthor";
$keywords = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";



require_once ("template/header.php");


?>
<section class="top-banner-padding banner about-banner">
    <div class="container owncontainer">
        <h1>Buy Ours Best Books.</h1>
    </div>
</section>
<section class="buyproduct-container">
    <div class="buyproduct-area relative">
        <div class="container owncontainer">
            <div class="buy-filter-product">
                <div class="row">
                    <div class="col-md-3">
                        <div class="produc-filter">
                            <div class="d-flex filter-check  flex-column flex-shrink-0 p-3 bg-light">
                                <a href="/"
                                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                                    <svg class="bi me-2" width="40" height="32">
                                        <use xlink:href="#bootstrap"></use>
                                    </svg>
                                    <span class="fs-4">Filter Product</span>
                                </a>
                                <hr>
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li class="nav-item mb-2">
                                        <a href="buy" class="nav-link <?php echo $set == 'buy' ? "active" : "" ?>"
                                            aria-current="page">
                                            All
                                        </a>
                                    </li>
                                    <?php



                                    $sql = "SELECT * FROM book_genre";

                                    $result = mysqli_query($conn, $sql);

                                    // Check if query was successful
                                    if ($result) {
                                        // Fetch and display each book details including image
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['bg_id'];
                                            ?>
                                            <li class="nav-item mb-2">
                                                <a href="?/<?php echo $id ?>"
                                                    class="nav-link <?php echo $set == $id ? "active" : "" ?>"
                                                    aria-current="page">
                                                    <?php echo $row['name']; ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <li class="nav-item mb-3 mt-4">
                                        <form class="d-flex" action="" method="POST">
                                            <input class="form-control me-2" name="searchbar" type="search"
                                                placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success" name="search_filter"
                                                type="submit">Search</button>
                                        </form>
                                    </li>
                                    <li class="nav-item mb-0">
                                        <form action="" method="POST"
                                            class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <label for="customRange2" class="form-label">Price range</label>
                                                <input type="range" name="price" id="pricerange" class="form-range"
                                                    min="0" max="1000" step="1" id="customRange2">
                                                <span>Price: </span><span id="pricereg"></span>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm" name="pricerangecart"
                                                type="submit" name="">range</button>
                                        </form>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="buy-product">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                                <?php

                                if (isset($_POST["search_filter"])) {
                                    $search = $_POST["searchbar"];
                                    echo "<script>console.log( '$search '); </script>";
                                    $sql = "SELECT b_id, title, price, image, genre 
                                    FROM books 
                                    WHERE title LIKE '%$search%' 
                                       OR genre LIKE '%$search%' 
                                       OR CAST(price AS CHAR) LIKE '%$search%'";

                                    $result = mysqli_query($conn, $sql);

                                    // Check if query was successful
                                    if ($result) {
                                        // Fetch and display each book details including image
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $image = $row['image'];
                                            $title = $row['title'];
                                            $price = $row['price'];
                                            $id = $row['b_id'];
                                            ?>
                                            <div class="col-md-3">
                                                <div class="card shadow-sm buy-product-to">
                                                    <div class="bk-prod-img">
                                                        <img src="./dbimages/book_img/<?php echo $image ?>" alt="">
                                                    </div>
                                                    <hr>
                                                    <div class="card-body">
                                                        <h6 class="card-text text-dark mb-2"><?php echo $title; ?></h6>
                                                        <p class="card-text"><span class="fw-bold">Price:</span><span>Rs
                                                            </span><?php echo $price; ?></p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <a href="view?id=<?php echo $id ?>"
                                                                    class="btn btn-sm btn-outline-secondary rounded-0">View
                                                                    details</a>
                                                                <form action="cart" method="POST">
                                                                    <input type="hidden" name="get_id" value="<?php echo $id ?>"
                                                                        hidden>
                                                                    <input type="hidden" name="get_image"
                                                                        value="<?php echo $image ?>" hidden>
                                                                    <input type="hidden" name="get_title"
                                                                        value="<?php echo $title; ?>" hidden>
                                                                    <input type="hidden" name="get_price"
                                                                        value="<?php echo $price; ?>" hidden>
                                                                    <input type="submit"
                                                                        class="rounded-0 btn btn-sm btn-outline-secondary"
                                                                        name="add_to_cart" value="Add to cart">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        // Error handling if query fails
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                } else {

                                    if (isset($_POST["pricerangecart"])) {
                                        // Ensure the input is an integer to avoid SQL injection risks
                                        $priceRangeCart = intval($_POST["price"]);



                                        if ($set == "buy") {
                                            $sql = "SELECT b_id, title, price ,image FROM books WHERE price <= '$priceRangeCart' ";
                                        } else {
                                            $sql = "SELECT b_id, title, price ,image, genre  FROM books WHERE price <= '$priceRangeCart' AND genre = '$set' ";
                                        }
                                        $result = mysqli_query($conn, $sql);

                                        // Check if query was successful
                                        if ($result) {
                                            // Fetch and display each book details including image
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $image = $row['image'];
                                                $title = $row['title'];
                                                $price = $row['price'];
                                                $id = $row['b_id'];
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="card shadow-sm buy-product-to">
                                                        <div class="bk-prod-img">
                                                            <img src="./dbimages/book_img/<?php echo $image ?>" alt="">
                                                        </div>
                                                        <hr>
                                                        <div class="card-body">
                                                            <h6 class="card-text text-dark mb-2"><?php echo $title; ?></h6>
                                                            <p class="card-text"><span class="fw-bold">Price:</span><span>Rs
                                                                </span><?php echo $price; ?></p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <a href="view?id=<?php echo $id ?>"
                                                                        class="btn btn-sm btn-outline-secondary rounded-0">View
                                                                        details</a>
                                                                    <form action="cart" method="POST">
                                                                        <input type="hidden" name="get_id" value="<?php echo $id ?>"
                                                                            hidden>
                                                                        <input type="hidden" name="get_image"
                                                                            value="<?php echo $image ?>" hidden>
                                                                        <input type="hidden" name="get_title"
                                                                            value="<?php echo $title; ?>" hidden>
                                                                        <input type="hidden" name="get_price"
                                                                            value="<?php echo $price; ?>" hidden>
                                                                        <input type="submit"
                                                                            class="rounded-0 btn btn-sm btn-outline-secondary"
                                                                            name="add_to_cart" value="Add to cart">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            // Error handling if query fails
                                            echo "Error: " . mysqli_error($conn);
                                        }
                                    } else {

                                        if ($set == "buy") {
                                            // Perform query to retrieve book details including image
                                            $sql = "SELECT b_id, title, price ,image FROM books";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            // Perform query to retrieve book details including image
                                            $sql = "SELECT b_id, title, price, genre , image FROM books WHERE genre = '$set'  ";
                                            $result = mysqli_query($conn, $sql);
                                        }





                                        // Check if query was successful
                                        if ($result) {
                                            // Fetch and display each book details including image
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $image = $row['image'];
                                                $title = $row['title'];
                                                $price = $row['price'];
                                                $id = $row['b_id'];
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="card shadow-sm buy-product-to">
                                                        <div class="bk-prod-img">
                                                            <img src="./dbimages/book_img/<?php echo $image ?>" alt="">
                                                        </div>
                                                        <hr>
                                                        <div class="card-body">
                                                            <h6 class="card-text text-dark mb-2"><?php echo $title; ?></h6>
                                                            <p class="card-text"><span class="fw-bold">Price:</span><span>Rs
                                                                </span><?php echo $price; ?></p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <a href="view?id=<?php echo $id ?>"
                                                                        class="btn btn-sm btn-outline-secondary rounded-0">View
                                                                        details</a>
                                                                    <form action="cart" method="POST">
                                                                        <input type="hidden" name="get_id" value="<?php echo $id ?>"
                                                                            hidden>
                                                                        <input type="hidden" name="get_image"
                                                                            value="<?php echo $image ?>" hidden>
                                                                        <input type="hidden" name="get_title"
                                                                            value="<?php echo $title; ?>" hidden>
                                                                        <input type="hidden" name="get_price"
                                                                            value="<?php echo $price; ?>" hidden>
                                                                        <input type="submit"
                                                                            class="rounded-0 btn btn-sm btn-outline-secondary"
                                                                            name="add_to_cart" value="Add to cart">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            // Error handling if query fails
                                            echo "Error: " . mysqli_error($conn);
                                        }
                                    }
                                }
                                // Close connection
                                mysqli_close($conn);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ("template/footer.php"); ?>