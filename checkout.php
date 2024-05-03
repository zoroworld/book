<?php
session_start();
require_once ("db/phperror.php");
require_once ("db/function.php");

//for getting cart list we add--------------
$productOrderEmpty = count_order_product();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the checkout data from the POST request
    $checkout_ids = $_POST['checkout_id'];
    $checkout_titles = $_POST['checkout_title'];
    $checkout_totals = $_POST['checkout_each_total'];

    // Loop through each item and create an array with its data
    for ($i = 0; $i < count($checkout_ids); $i++) {
        $item_data = array(
            'id' => $checkout_ids[$i],
            'title' => $checkout_titles[$i],
            'eachtotal' => $checkout_totals[$i]
        );

        // Add the item data to the checkout data array
        $checkout_data[] = $item_data;
    }

    // Store the checkout data in session variable
    $_SESSION['checkout_data'] = $checkout_data;



    // print_r($_SESSION['checkout_data']);
}

// Calculate the total from the checkout data in the session
$total = 0;
if (isset($_SESSION['checkout_data'])) {
    foreach ($_SESSION['checkout_data'] as $item) {
        // Add each "eachtotal" value to the total
        $total += (float) $item['eachtotal']; // Assuming eachtotal is a numeric value
    }
}

// Store the total in the session variable
$_SESSION['checkout_total'] = $total + 50;


// print_r($_SESSION['checkout_total']);


$siteTitle = "Book | Checkout";
$author = "bookauthor";
$keywords = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";
require_once ("template/header.php");
?>

<section class="top-banner-padding banner about-banner">
    <div class="container owncontainer">
        <h1>Checkout</h1>
        <a class="btn btn-primary" href="review">review</a>

    </div>
</section>
<section class="breadcrumbs">
    <div class="container owncontainer">
        <div class="breadcrumbs-container owncontainer">
            <a href="buy">Buy</a>
            <p>/</p>
            <a href="cart">Cart</a>
            <p>/</p>
            <a href="checkout">Checkout</a>
        </div>
    </div>
</section>

<section class="check-out-page-section my-5">
    <div class="container owncontainer">
        <div class="checkbox-container owncontainer">
            <form action="feedback.php" method="POST">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card p-5">
                            <h4 class="mb-3">Billing address</h4>
                            <form class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">First name</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName"
                                            placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Last name</label>
                                        <input type="text" class="form-control" name="lastName" id="lastName"
                                            placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="you@example.com">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="phonenumberset">Phone <span class="text-muted"></span></label>
                                    <input type="number" class="form-control" name="phonenumberset" id="phonenumberset"
                                        placeholder="9784523546" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid phone no address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        placeholder="1234 Main St" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 mb-4">
                        <div class="card p-5">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-secondary badge-pill">3</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <?php

                                // Retrieve cart data from session
                                // $carts = $_SESSION['cart'];
                                
                                $checkouts = $_SESSION['checkout_data'];

                                // print_r($_SESSION['localcart']);
                                foreach ($checkouts as $item) {
                                    // Access individual properties
                                    $id = $item['id'];
                                    $title = $item['title'];
                                    $eachprice = $item['eachtotal'];
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed"
                                        id="<?php echo $id; ?>">
                                        <input type="hidden" name="book_id[]" value="<?php echo $id; ?>">
                                        <div>
                                            <h5 class="my-0 fw-light text-dark"><?php echo $title; ?></h5>
                                        </div>
                                        <p class="text-muted mb-0"><span>Rs</span><span><?php echo $eachprice; ?></span></p>
                                    </li>
                                <?php } ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h5 class="my-0 fw-light text-dark">Shipping charge</h5>
                                    </div>
                                    <span class="text-muted">Rs 50</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                 
                                    <h5>Total</h5>
                                    <p class="mb-0">
                                        <span>Rs</span><span>
                                            <?php
                                            if (isset($_SESSION['checkout_total'])) {
                                                $getol = $_SESSION['checkout_total'];
                                                echo number_format($getol, 2);
                                            }
                                            ?>
                                            <input type="hidden" name="totalprice" value="<?php echo number_format($getol, 2); ?>">
                                        </span></strong>
                                </li>
                            </ul>
                            <?php
                            // Assuming $payment_made is a boolean variable indicating whether payment has been made
                            $payment_made = false; // or false, based on your logic
                            
                            // Check if payment has been made
                            if ($payment_made) {
                                $checked = "checked"; // Add the 'checked' attribute
                            } else {
                                $checked = ""; // Don't add the 'checked' attribute
                            }
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" id="flexCheckDefault"
                                    <?php echo $checked; ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?php echo ($payment_made) ? 'If paid, please check this box' : 'If pay, please check this box'; ?>
                                </label>
                            </div>
                            <hr class="mb-4">
                            <div class="checkout">
                                <button type="submit"
                                    class=" w-100 btn btn-primary btn-lg btn-block btn-sm py-2 fs-6" name="paywork">Pay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once ("template/footer.php"); ?>