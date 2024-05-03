<?php

session_start();
require_once ("db/phperror.php");
require_once ("db/function.php");


//for getting cart list we add--------------
$productOrderEmpty = count_order_product();

$siteTitle = "Book | Contact";
$author = "bookauthor";
$keywords  = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";
require_once("template/header.php"); 
?>

<section class="top-banner-padding banner about-banner">
    <div class="container owncontainer">
        <h1>Contact Page</h1>
    </div>
</section>
<section>
    <div class="contact-form-area">
        <div class="contact-form-container">
            <div class="container owncontainer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="cont-add-phone">
                            <div class="download-button">
                                <div class="buttons flex-row d-flex">
                                    <div class="desc">
                                        <a href="mailto:info@gmail.com">
                                            <p>
                                                <span>Location</span> <br>
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14966.39820826835!2d85.8179029!3d20.316835949999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1713611070732!5m2!1sen!2sin" width="550" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </p>
                                        </a>

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
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 350px"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("template/footer.php"); ?>