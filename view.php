<?php
session_start();
require_once ("db/phperror.php");
require_once ("db/function.php");
// for data in localstorage to see----




//for getting cart list we add--------------
$productOrderEmpty = count_order_product();

$siteTitle = "Book | Details";
$author = "bookauthor";
$keywords  = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";
require_once("template/header.php");


?>

<section class="top-banner-padding banner about-banner">
    <div class="container owncontainer">
        <h1>Books Details</h1>
        <a class="btn btn-primary" href="cart">cart</a>
    </div>
</section>

<!-- Get all the details of book -->
<?php
require_once("db/function.php");
// Connect to the database
$conn = db_connect();

//get from url---
$id = $_GET['id'];

// Perform query to retrieve book details including image
$sql = "SELECT b.price as bprice , b.isbn as bisbn, b.description as bdescription ,b.title as btitle, b.image as bimage, a.name as aname, p.name as pname,  bg.name as genre_name FROM books b
   JOIN authors a
   ON b.a_id = a.a_id
   JOIN publishers p
   ON b.p_id = p.p_id
   JOIN book_genre bg
   ON b.genre = bg.bg_id
   WHERE b.b_id =  '$id' ";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// Check if query was successful
if ($result) {
?>
    <section class="cart-page-section">
        <div class="container owncontainer">
            <div class="cart-container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="view-image-contain">
                            <img src="dbimages/book_img/<?php echo $row['bimage']; ?>" class="img-fluid" alt="book of">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="book-view-details">
                            <div class="book-view-list">
                                <ul>
                                    <li>
                                        <h2 class="b-title"><?php echo $row['btitle']; ?></h2>
                                    </li>
                                    <hr>
                                    <li>
                                        <p class="b-isbn fw-bold"><span class="view-isbn all-view">ISBN:</span><span><?php echo $row['bisbn']; ?></span></p>
                                    </li>
                                    <li>
                                        <div class="d-flex b-price">
                                            <h4 class="b-amt">Price: </h4>
                                            <p class="b-price-tag fw-bold"><span class="b-currency">Rs </span><span class="fw-num-price"><?php echo $row['bprice']; ?></span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="b-author"><span class="view-author all-view">Author:</span><span><?php echo $row['aname']; ?></span></p>
                                    </li>
                                    <li>
                                        <p class="b-bublisher"><span class="view-publisher all-view">Publisher:</span><span><?php echo $row['pname']; ?></span></p>
                                    </li>
                                    <li>
                                        <p class="b-gnere"><span class="view-gnere all-view">Type:</span><span><?php echo $row['genre_name']; ?></span></p>
                                    </li>
                                    <hr>
                                    <li>
                                        <div class="b-description">
                                            <h4 class="mb-2">Description</h4>
                                            <div class="b-desc">
                                                <p><?php echo $row['bdescription']; ?></p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="btn-contain mt-5">
                                            <a href="cart" class="btn btn-primary btn-sm" rel="noopener noreferrer">Add to cart</a>
                                            <a href="buy" class="btn btn-primary btn-sm" rel="noopener noreferrer">Back to shopping</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
}
require_once("template/footer.php");

?>