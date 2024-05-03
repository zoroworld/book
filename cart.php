<?php
// session get the out--------------------------------
session_start();

require_once ("db/phperror.php");
require_once ("db/function.php");

make_array_to_json();

//for getting cart list we add--------------
$productOrderEmpty = count_order_product();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "<script>alert('Item removed from cart');</script>";


    if (isset($_POST["add_to_cart"])) {
        // Retrieve the data from POST request
        $product_id = $_POST["get_id"];
        $product_image = $_POST["get_image"];
        $product_title = $_POST["get_title"];
        $product_price = $_POST["get_price"];

        add_to_card($product_id, $product_title, $product_price, $product_image);

    }

    if (isset($_POST["remove_the_cart"])) {
        $remove_cart = $_POST["remove_cart"];
        remove_the_cart($remove_cart);

    }

    if (isset($_POST["data"])) {
        //Retrieve data from POST request
        $data = $_POST['data'];

        // Decode JSON string into an array
        $arrayData = json_decode($data, true);
        // Check if decoding was successful

        $_SESSION['localcart'] = $arrayData;

        header('Locatin:cart.php');

    }



}




$siteTitle = "Book | Cart";
$author = "bookauthor";
$keywords = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";
require_once ("template/header.php");



if ($productOrderEmpty <= 0) {
    echo "<div style='height:100vh; display:flex; align-items:center; justify-content:center;flex-direction: column;'>
       <h1>No product order<h1>
       <a class='btn btn-primary' href='buy'>Go to Buy product</a>
    <div>";
} else {
    ?>

    <section class="top-banner-padding banner about-banner">
        <div class="container owncontainer">
            <h1>Cart</h1>
        </div>
    </section>
    <section class="breadcrumbs">
        <div class="container owncontainer">
            <div class="breadcrumbs-container">
                <a href="buy">Buy</a>
                <p>/</p>
                <a href="cart">Cart</a>

            </div>
        </div>
    </section>
    <section class="cart-page-section">
        <div class="container owncontainer">
            <div class="cart-container owncontainer">
                <div class="cart-contain">
                    <div class="order-desc-contain">
                        <!-- desktop header work -->
                        <div class="desktop-header bg-dark">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="head-order-detail">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="order-img">
                                                            <h4>Images</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 ">
                                                        <h4 class="px-4">Details</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h4>Price</h4>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Quantity</h4>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>subtotal</h4>
                                                    </div>
                                                    <div class="col-md-1">xx</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkout-cart">
                                        <h4>Cart total</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- all contents  -->
                        <div class="all-ord-details mb-2">
                            <div class="row">
                                <div class="col-md-9">
                                    <?php



                                    // Retrieve cart data from session
                                    // $carts = $_SESSION['cart'];
                                

                                    $carts = $_SESSION['cart'];

                                    // print_r($_SESSION['localcart']);
                                    foreach ($carts as $item) {
                                        // Access individual properties
                                        $id = $item['id'];
                                        $image = $item['image'];
                                        $title = $item['title'];
                                        $price = $item['price'];
                                        ?>
                                        <div class="all-order-detail" id="<?php echo $id; ?>">
                                            <div class="row align-items-center">
                                                <div class="col-md-5">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-3">
                                                            <div class="order-img">
                                                                <img src="dbimages/book_img/<?php echo $image; ?>" alt=""
                                                                    width="100" height="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 ">
                                                            <div class="order-desc-title px-4">
                                                                <h4><?php echo $title; ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="row  align-items-center">
                                                        <div class="col-md-3">
                                                            <div class="addcartamtcnt">
                                                                <div class="bg-dark p-2 cart-price gettoallvalbook">
                                                                    <?php echo $price; ?>
                                                                </div>
                                                                <div class="ct-price">
                                                                    <p class="fw-bold text-dark mb-0"><span class="currency">Rs
                                                                        </span><span
                                                                            class="ord-price get_ord_price"><?php echo $price; ?></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="addcartamtcnt">
                                                                <div class="bg-dark p-2 cart-qty gettoallvalbook">Quantity</div>
                                                                <div class="ct-qty text-dark">
                                                                    <div class="qtymesurework d-flex align-items-center">
                                                                        <button class="plusadd"><i
                                                                                class="fa-solid fa-plus"></i></button>
                                                                        <input type="text" class="qtymesure getqtymesure"
                                                                            name="qty_mesure" value="1">
                                                                        <button class="minusremove"><i
                                                                                class="fa-solid fa-minus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="addcartamtcnt">
                                                                <div class="bg-dark p-2 cart-tol gettoallvalbook">total</div>
                                                                <div class="ct-tol">
                                                                    <p class="fw-bold text-dark mb-0"><span class="currency">Rs
                                                                        </span><span
                                                                            class="ord-total-price single_subtotal"></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="cty-remove">
                                                                <form action="cart" method="POST">
                                                                    <input type="hidden" name="remove_cart"
                                                                        value="<?php echo $id; ?>">
                                                                    <button type="submit" name="remove_the_cart"
                                                                        class="rem_btn"><i
                                                                            class="fa-solid fa-square-xmark color-danger" style="color: #c30a0aad;
    font-size: 26px;"></i> </button>
                                                                    <!-- <input type="submit"
                                                                        class="rounded-0 btn btn-sm btn-outline-secondary"
                                                                        name="remove_the_cart" value="remove the cart"> -->
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                                <div class="col-md-3">
                                    <div class="total-cart">
                                        <div class="card-total-details">
                                            <div class="total-order-list">
                                                <div class="setlay"><span class="ord-suall-total ordsgt">SubTotal:</span>
                                                    <p class="mb-0"><span>Rs </span><span id="allsubtotal">5000</span></p>
                                                </div>
                                                <div class="setlay"><span class="ord-ship ordsgt">Shpping charge:</span>
                                                    <p class="mb-0"><span>Rs </span><span id="shiptotal">50.00</span></p>
                                                </div>
                                                <hr class="m-0">
                                                <div class="fw-bold text-dark setlay"><span class="ord-total">Total:</span>
                                                    <p class="mb-0"><span>Rs </span><span id="cart_order_total"></span></p>
                                                </div>
                                                <hr class="m-0">
                                            </div>
                                        </div>
                                        <div class="go_checkout">
                                            <form action="checkout" method="POST">
                                                <?php
                                                $carts = $_SESSION['cart'];
                                                foreach ($carts as $item) {
                                                    // Access individual properties
                                                    $id = $item['id'];
                                                    $title = $item['title'];
                                                    $price = $item['price'];
                                                    ?>
                                                    <div class="list" id="<?php echo $id ?>">
                                                        <input type="hidden" name="checkout_id[]" value="<?php echo $id ?>" hidden>
                                                        <input type="hidden" name="checkout_title[]" value="<?php echo $title ?>"
                                                            hidden>
                                                        <input type="hidden"  name="checkout_each_total[]" class="check_single_subtotal" value="<?php echo  $price  ?>"
                                                            hidden>
                                                            
                                                    </div>

                                                    <?php
                                                }
                                                ?>
                                                <input type="hidden" id="getcheckouttotal"  name="checkout_total" value="0" hidden>
                                                <button type="submit" name="checkout_the_product"
                                                    class="btn btn-primary btn-sm w-100 mt-3 mb-2">Proceed to
                                                    checkout</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php

}
require_once ("template/footer.php");
?>