<?php
session_start();
require_once("db/phperror.php");
require_once("db/function.php");



$productOrderEmpty = count_order_product();



$siteTitle = "Book | Homepage";
$author = "bookauthor";
$keywords = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";
require_once("template/header.php");
?>

<section class="hero-area">
    <div class="container owncontainer">
        <div class="row fullscreen d-flex align-items-center justify-content-start">
            <div class="hero-content col-lg-7">
                <h5 class="text-white text-uppercase">Author: Travor James</h5>
                <h1 class="text-uppercase">
                    New Adventure
                </h1>
                <p class="text-white pt-20 pb-20">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br> or incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim.
                </p>
                <a href="#" class="primary-btn text-uppercase">Buy Now for $9.99</a>
            </div>
            <div class="col-lg-5 hero-right">
                <img class="img-fluid" src="assets/img/header-img.png" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Start about Area -->
<section class="about-info-area">
    <div class="container owncontainer">
        <div class="msgbox">
            <h1>About our book</h1>
            <p>About the book we have that make Exiting Adventure, horror and fantansy book which lead good </p>
        </div>
        <div class="single-info row align-items-center">
            <div class="col-lg-4 col-md-12 text-center no-padding info-left">
                <div class="info-thumb">
                    <img src="assets/img/about-img.png" class="img-fluid info-img" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-12 no-padding info-rigth">
                <div class="info-content">
                    <h2 class="pb-30">Dr. Travor James</h2>
                    <p>
                        The history of books has evolved significantly since the 1980s, with contributions from various fields such as textual scholarship, codicology, bibliography, philology, palaeography, art history, social history, and cultural history. The field aims to demonstrate that books are not just objects but conduits of interaction between readers and words. The earliest forms of writing were etched on stone slabs, transitioning to palm leaves and papyrus in ancient times. Parchment and paper later emerged as important substrates for bookmaking, introducing greater durability and accessibility.
                    </p>
                    <br>
                    <p>
                        In the mid-20th century, trade binders specialized in binding, typesetting, and printing. However, due to computerization, typesetting has shifted upstream, with publishers, publishers, or authors handling the job. Mergers have made it rare to find a separate bindery.
                    </p>
                    <br>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End about Area  -->

<!-- Start product Area -->
<section class="productfact-area relative">
    <div class="container owncontainer">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10 text-white">Buy the Exciting Book</h1>
                    <p>Who are in extremely love from out customer.</p>
                </div>
            </div>
        </div>
        <div class="book-product">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                require_once("db/function.php");
                // Connect to the database
                $conn = db_connect();

                // Perform query to retrieve book details including image
                $sql = "SELECT title, price, image FROM books LIMIT 4";
                $result = mysqli_query($conn, $sql);
                // Check if query was successful
                if ($result) {
                    // Fetch and display each book details including image
                    while ($row = mysqli_fetch_assoc($result)) {
                        $image = $row['image'];
                        $title = $row['title'];
                        $price = $row['title'];
                ?>
                        <div class="col-md-3">
                            <div class="card shadow-sm">
                                <div class="bk-home-prod-img">
                                    <img src="./dbimages/book_img/<?php echo $image ?>" alt="">
                                </div>
                                <hr>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $title; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href="buy" class="btn btn-sm btn-outline-secondary">Buy</a>
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

                // Close connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</section>
<!-- End product Area -->

<!-- Start call-to-action Area -->
<section class="call-to-action-area">
    <div class="container owncontainer">
        <div class="call-to-contain">
            <div class="row justify-content-center top">
                <div class="col-lg-12">
                    <h1 class="text-white text-center">Conatct us for discount.</h1>
                </div>
            </div>
            <div class="row justify-content-center d-flex">
                <div class="download-button d-flex flex-row justify-content-center">
                    <div class="buttons flex-row d-flex">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="desc">
                            <a href="mailto:info@gmail.com">
                                <p>
                                    <span>Mail Us</span> <br>
                                    info@gmail.com
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="buttons flex-row d-flex">
                        <i class="fa-solid fa-mobile-retro"></i>
                        <div class="desc">
                            <a href="tel:+91 9963278956">
                                <p>
                                    <span>Phone no</span> <br>
                                    +91 9963278956
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End call-to-action Area -->

<!-- Start publisher Area -->
<section class="publisher-fact-area relative">
    <div class="container owncontainer">
        <div class="publisher-contain">
            <div class="row">
                <div class="menu-content pb-40 col-lg-3">
                    <div class="title text-left">
                        <h1 class="mb-10">About publisher</h1>
                        <p>The book publish by publisher.</p>
                    </div>
                </div>
                <div class="menu-content pb-40 col-lg-9">
                    <div class="book-publisher">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <?php
                            require_once("db/function.php");
                            // Connect to the database
                            $conn = db_connect();

                            // Perform query to retrieve book details including image
                            $sql = "SELECT name, image FROM authors LIMIT 3";
                            $result = mysqli_query($conn, $sql);
                            // Check if query was successful
                            if ($result) {
                                // Fetch and display each book details including image
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $image = $row['image'];
                                    $name = $row['name'];
                            ?>
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <div class="bk-home-publish-img">
                                                <img src="./dbimages/author_img/<?php echo $image ?>" alt="">
                                            </div>
                                            <hr>
                                            <div class="card-body">
                                                <p class="card-text"><?php echo $name ?></p>
                                            </div>
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
        </div>
    </div>
</section>
<!-- End publisher Area -->

<!-- Start testomial Area -->
<section class="testomial-area">
    <div class="container owncontainer">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">What our Reader’s Say about us</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-tstimonial-contain">
                <div id="active-tstimonial-carusel" class="owl-carousel owl-theme">
                    <div class="single-testimonial item">
                        <div class="testimonial-txt">
                            <p class="desc">
                                Accessories Here you can find the best computer accessory for your laptop, monitor,
                                printer, scanner, speaker, projector, hardware and more. laptop accessory
                            </p>
                            <h4>Mark Alviro Wiens</h4>
                            <p>
                                CEO at Google
                            </p>
                        </div>
                    </div>
                    <div class="single-testimonial item">
                        <div class="testimonial-txt">
                            <p class="desc">
                                Accessories Here you can find the best computer accessory for your laptop, monitor,
                                printer, scanner, speaker, projector, hardware and more. laptop accessory
                            </p>
                            <h4>Mark Alviro Wiens</h4>
                            <p>
                                CEO at Google
                            </p>
                        </div>
                    </div>
                    <div class="single-testimonial item">
                        <div class="testimonial-txt">
                            <p class="desc">
                                Accessories Here you can find the best computer accessory for your laptop, monitor,
                                printer, scanner, speaker, projector, hardware and more. laptop accessory
                            </p>
                            <h4>Mark Alviro Wiens</h4>
                            <p>
                                CEO at Google
                            </p>
                        </div>
                    </div>
                    <div class="single-testimonial item">
                        <div class="testimonial-txt">
                            <p class="desc">
                                Accessories Here you can find the best computer accessory for your laptop, monitor,
                                printer, scanner, speaker, projector, hardware and more. laptop accessory
                            </p>
                            <h4>Mark Alviro Wiens</h4>
                            <p>
                                CEO at Google
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End testomial Area -->

<!-- Start contact Area -->
<section class="contact-form-area">
    <div class="contact-form-container">
        <div class="container owncontainer">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Touch with us</h1>
                        <p>You can touch and contact us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="cont-add-phone">
                        <div class="download-button">
                            <div class="buttons flex-row d-flex">
                                <div class="desc w-100">
                                    <p class="m-0 w-100">
                                        <span>Location</span> <br>
                                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14966.39820826835!2d85.8179029!3d20.316835949999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1713611070732!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </p>
                                </div>
                            </div>
                            <div class="buttons flex-row d-flex">
                                <i class="fa-solid fa-envelope"></i>
                                <div class="desc">
                                    <a href="mailto:info@gmail.com">
                                        <p>
                                            <span>Mail Us</span> <br>
                                            info@gmail.com
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="buttons flex-row d-flex">
                                <i class="fa-solid fa-mobile-retro"></i>
                                <div class="desc">
                                    <a href="tel:+91 9963278956">
                                        <p>
                                            <span>Phone no</span> <br>
                                            +91 9963278956
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-cont-contain">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputtext" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputtext" aria-describedby="textHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputtext" class="form-label">Mail</label>
                                <input type="text" class="form-control" id="exampleInputtext" aria-describedby="textHelp">
                            </div>
                            <div class="mb-3 form-check px-0">
                                <label for="exampleInputtext" class="form-label">Comment</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 183px"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start contact  Area -->


<?php require_once("template/footer.php"); ?>