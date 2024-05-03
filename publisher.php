<?php

session_start();
require_once ("db/phperror.php");
require_once ("db/function.php");



//for getting cart list we add--------------
$productOrderEmpty = count_order_product();

$siteTitle = "Book | Publisher";
$author = "bookauthor";
$keywords = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";
require_once ("template/header.php");
?>

<section class="top-banner-padding banner about-banner">
    <div class="container owncontainer">
        <h1>Our publisher</h1>
    </div>
</section>
<section class="publisher-container">
    <div class="publisher-pg-area relative">
        <div class="container owncontainer">
            <div class="publisher-pg-product">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    require_once ("db/function.php");

                    // Connect to the database
                    $conn = db_connect();

                    $sql = "SELECT * FROM publishers";
                    $result = mysqli_query($conn, $sql);

                    // Check if query was successful
                    if ($result) {
                        // Fetch and display each book details including image
                        while ($row = mysqli_fetch_assoc($result)) {
                            $image = $row['image'];
                            ?>
                            <div class="col-md-3">
                                <div class="card shadow-sm">
                                    <div class="bk-prod-img">
                                        <img src="dbimages/publisher_img/<?php echo $image  ?>" alt="">
                                    </div>
                                    <hr>
                                    <h5 class="card-title text-center"><?php echo $row['name']; ?></h5>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        // Error handling if query fails
                        echo "Error: " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ("template/footer.php"); ?>