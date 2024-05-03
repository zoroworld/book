<?php

session_start();
require_once ("db/phperror.php");
require_once ("db/function.php");


//for getting cart list we add--------------
$productOrderEmpty = count_order_product();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['paywork']) && isset($_POST['status']) == 1) {
        // Extract the checkout data from the POST request
        $book_ids = isset($_POST['book_id']) ? $_POST['book_id'] : array();
        $customer_firstname = isset($_POST['firstName']) ? $_POST['firstName'] : '';
        $customer_lastname = isset($_POST['lastName']) ? $_POST['lastName'] : '';
        $customer_name = $customer_firstname . " " . $customer_lastname;
        $customer_email = isset($_POST['email']) ? $_POST['email'] : '';
        $customer_phone = isset($_POST['phonenumberset']) ? $_POST['phonenumberset'] : '';
        $customer_address = isset($_POST['address']) ? $_POST['address'] : '';


        // Calculate quantity
        $quantity = count($_SESSION['checkout_data']);


        // Total price
        $totalprice = isset($_POST['totalprice']) ? $_POST['totalprice'] : '';

        // Payment status
        $status = isset($_POST['status']) ? "1" : "0";

        // end shipping--------------------------------

        // diliver status
        $dilivery_status = 1;
        // dilivery date
        // Get the current date
        $current_date = new DateTime();

        // Add 6 days to the current date
        $current_date->modify('+6 days');

        // Format the date as needed
        $delivery_date = $current_date->format('Y-m-d');
        // ----------------------------------

        // Create an associative array to hold all the data
        // Convert book_ids to JSON
        $book_ids_json = json_encode($book_ids);


        $customer_id = customer_add_db($customer_name, $customer_email, $customer_phone, $customer_address);

        $payment_id = payment_add_db($status, $customer_id);
        $shipping_id = shipping_add_db($payment_id, $customer_id, $dilivery_status, $delivery_date);
        order_add_db($quantity, $totalprice, $customer_id, $book_ids_json, $payment_id,  $shipping_id);
        echo'<script>localStorage.clear(); </script>';
        session_destroy();
    } else {
        header('location: checkout');
    }

    if (isset($_POST['feedgo'])) {
        $ranting = isset($_POST['rating']) ? $_POST['rating'] : '';
        $comment = isset($_POST['custfeed']) ? $_POST['custfeed'] : '';
        $customer_id = isset($_POST['custid']) ? $_POST['custid'] : '';

        
        feedback_add_db($customer_id, $comment, $ranting);
        session_destroy();
        header('location: buy');
        echo'<script>localStorage.clear(); </script>';
        exit();

    }


}



$siteTitle = "Book | feedback";
$author = "bookauthor";
$keywords = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";
require_once ("template/header.php");
?>

<section class="top-banner-padding banner about-banner">
    <div class="container owncontainer">
        <h1>feedback</h1>
        <a class="btn btn-primary" href="cart">Back to Cart</a>
        <a class="btn btn-primary" href="Checkout">Back to Checkout</a>
    </div>
</section>
<section class="feedback-contaiber">
    <div class="container owncontainer">
        <div class="feed-contain">
            <form action="" method="POST">
                <h2 class="mb-3 text text-capitalize"><?php echo $customer_name ?> your Feedback is Help us build bond
                    ..</h2>
                    <input type="hidden" name="custid" value="<?php echo $customer_id  ?> " hidden>
                <select class="form-select" name="rating" aria-label="Default select example">
                    <option selected>Open rating</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">four</option>
                    <option value="5">five</option>
                </select>
                <div class="form-floating">
                    <textarea class="form-control" name="custfeed" placeholder="Leave a comment here"
                        id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>
                <input type="submit" class="btn btn-primary btn-sm py-3" name="feedgo" value="submit">
            </form>
        </div>
    </div>

</section>

<?php require_once ("template/footer.php"); ?>