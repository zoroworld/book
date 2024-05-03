<?php

// Function for database connection
function db_connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "onlinesell";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Return the connection object
    return $conn;
}

// heck book present or not-----
function checkBookPresentOrNot($isbn)
{
    $conn = db_connect();

    // Check if the table is empty or not empty
    $count_sql = "SELECT COUNT(*) AS count FROM books";
    $count_result = mysqli_query($conn, $count_sql);
    $row = mysqli_fetch_assoc($count_result);

    //count the no of row
    $count = $row['count'];

    //if row is greater than 0 means that the 
    if ($count > 0) {
        // Check if the books already exists
        $check_sql = "SELECT b_id as bid FROM books WHERE isbn = '$isbn'";
        $check_result = mysqli_query($conn, $check_sql);

        //check all rows in database-------------------
        if (mysqli_num_rows($check_result) > 0) {
            // books already exists, return the existing books ID

            //get all row----
            $row = mysqli_fetch_assoc($check_result);
            $id = $row['bid'];
            echo "<script>console.log(`books '$isbn' already exists with ID: $id`);</script>";

            mysqli_close($conn);

            return false;
        }
    }

    return true;
}


//relation between author, publisher and book------------------

function setAndGetAuthorId($name, $details, $tempname, $folder, $filename)
{
    $conn = db_connect();

    // Escape special characters in the variables  
    $name = mysqli_real_escape_string($conn, $name);
    $details = mysqli_real_escape_string($conn, $details);


    // Check if the table is empty or not empty
    $count_sql = "SELECT COUNT(*) AS countauth FROM authors";
    $count_result = mysqli_query($conn, $count_sql);
    $row = mysqli_fetch_assoc($count_result);

    //count the no of row
    $count = $row['countauth'];

    //if row is greater than 0 means that the 
    if ($count > 0) {
        // Check if the author already exists
        $check_sql = "SELECT a_id as aid FROM authors WHERE name = '$name'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Author already exists, return the existing author ID
            $row = mysqli_fetch_assoc($check_result);
            $id = $row['aid'];
            echo "<script>console.log('Author \'$name\' already exists with ID: $id');</script>";
            mysqli_close($conn);
            return $id;
        }
    }


    // Insert author data into the database
    $author_sql = "INSERT INTO authors (name, detail, image) VALUES ('$name', '$details', '$filename')";
    if (mysqli_query($conn, $author_sql)) {
        // Get the ID of the inserted author
        $id = mysqli_insert_id($conn);

        // Move the uploaded image into the folder
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script>";
            echo "console.log('Author image uploaded and data inserted successfully!');";
            echo "</script>";
        } else {
            echo "<script>";
            echo "console.log('Failed to move the uploaded image!');";
            echo "</script>";
        }
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        $id = null; // Set $id to null in case of error
    }

    mysqli_close($conn); // Close the database connection

    return $id;
}

function setAndGetPublisherId($name, $details, $tempname, $folder, $auther_id, $filename)
{
    $conn = db_connect();


    // Escape special characters in the variables
    $name = mysqli_real_escape_string($conn, $name);
    $details = mysqli_real_escape_string($conn, $details);

    // Check if the table is empty or not empty
    $count_sql = "SELECT COUNT(*) AS count FROM publishers";
    $count_result = mysqli_query($conn, $count_sql);
    $row = mysqli_fetch_assoc($count_result);

    //count the no of row
    $count = $row['count'];

    //if row is greater than 0 means that the 
    if ($count > 0) {
        // Check if the publisher already exists
        $check_sql = "SELECT p_id as pid FROM publishers WHERE name = '$name'";
        $check_result = mysqli_query($conn, $check_sql);

        //check all rows in database-------------------
        if (mysqli_num_rows($check_result) > 0) {
            // publisher already exists, return the existing publisher ID

            //get all row----
            $row = mysqli_fetch_assoc($check_result);
            $id = $row['pid'];
            echo "<script>console.log(`Publisher '$name' already exists with ID: $id`);</script>";
            mysqli_close($conn);
            return $id;
        }
    }


    // Insert publisher data into the database
    $author_sql = "INSERT INTO publishers (name, detail, image, a_id) VALUES ('$name', '$details', '$filename', '$auther_id')";
    if (mysqli_query($conn, $author_sql)) {
        // Get the ID of the inserted publisher
        $id = mysqli_insert_id($conn);

        // Move the uploaded image into the folder
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script>";
            echo "console.log('publisher image uploaded and data inserted successfully!');";
            echo "</script>";
        } else {
            echo "<script>";
            echo "console.log('Failed to move the uploaded image!');";
            echo "</script>";
        }
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        $id = null; // Set $id to null in case of error
    }

    mysqli_close($conn); // Close the database connection

    return $id;
}

function setBook($isbn, $book_title, $book_desc, $price, $quantity, $genre, $author_id, $publisher_id, $tempname, $folder, $filename)
{


    //connect database
    $conn = db_connect();


    // Escape special characters in the variables
    $isbn = mysqli_real_escape_string($conn, $isbn);
    $book_title = mysqli_real_escape_string($conn, $book_title);
    $book_desc = mysqli_real_escape_string($conn, $book_desc);



    //  SQL query to insert data into the database
    $book_sql = "INSERT INTO books (isbn, title, description, price, quantity, genre, a_id, p_id, image) VALUES ('$isbn', '$book_title', '$book_desc', '$price', '$quantity','$genre', '$author_id', '$publisher_id', '$filename')";

    // Execute query
    $result = mysqli_query($conn, $book_sql);

    if ($result) {
        // Now let's move the uploaded image into the folder
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script>";
            echo "console.log('Book image uploaded and data inserted successfully!');";
            echo "</script>";
        } else {
            echo "<script>";
            echo "console.log('Failed to move the uploaded image!');";
            echo "</script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_close($conn);
}

//admin panal set and get password to work------------------------
function getAdmin()
{
    $conn = db_connect();
    $sql = "SELECT user, pass FROM login";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    return $row;
}
function setAdmin($user, $pass)
{
    $conn = db_connect();
    //  SQL query to insert data into the database
    $sql = "UPDATE login SET user = '$user', pass = '$pass' WHERE id = '1' ";

    // Execute query
    if (mysqli_query($conn, $sql)) {
        echo "<script>";
        echo "console.log('Successfully updated');";
        echo "</script>";
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
    }
    mysqli_close($conn); // Close the database connection
}

//get book, author and publisher details----------------------

function getBookDetails()
{
    // Connect to the database
    $conn = db_connect();

    // Perform query to retrieve book details including image
    $sql = "SELECT *, b.genre as genreno , a.a_id as aid, p.p_id as pid, b.image as bimage, a.name as aname, p.name as pname,  bg.name as genre_name FROM books b
            JOIN authors a
            ON b.a_id = a.a_id
            JOIN publishers p
            ON b.p_id = p.p_id
            JOIN book_genre bg
            ON b.genre = bg.bg_id
            ORDER BY b_id";
    $result = mysqli_query($conn, $sql);

    return $result;
}

// details of get order details-----------------

function getOrderDetails()
{
    // Connect to the database
    $conn = db_connect();
    $sql = "SELECT o.o_id as oid, o.quantity as item, o.total_price as price, c.name as cname, c.phone as phone, o.order_bid as item_list, py.status as status, c.address as address, o.date as date, sd.dilivery_status as  dilivery_status
      FROM orders o
      JOIN customers c
      ON o.c_id = c.c_id
      JOIN payments py
      ON o.pay_id = py.pay_id
      JOIN shipping_details sd
      ON o.ship_id = sd.ship_id
      ORDER BY oid";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// no of items buy--------------------------
function getPaymentDetails()
{
    // Connect to the database
    $conn = db_connect();

    $sql = "SELECT py.pay_id as id , o.total_price as price , py.status as status , c.name as name, c.phone as phone, c.address as address
   FROM payments py
   JOIN customers c
   ON py.c_id = c.c_id
   JOIN orders o
   ON py.pay_id = o.pay_id
   ORDER BY id";

    $result = mysqli_query($conn, $sql);
    return $result;
}

function getdashboardPaymentDetails()
{
    // Connect to the database
    $conn = db_connect();

    $sql = "SELECT py.pay_id as id , o.total_price as price , py.status as status , c.name as name, c.phone as phone, c.address as address
   FROM payments py
   JOIN customers c
   ON py.c_id = c.c_id
   JOIN orders o
   ON py.pay_id = o.pay_id
   LIMIT 5";

    $result = mysqli_query($conn, $sql);
    return $result;
}
// total book sale-------------------------------------------
function totalbookorder()
{
    // Connect to the database
    $conn = db_connect();
    $sql = "SELECT COUNT(*) as count FROM orders";
    $count = mysqli_query($conn, $sql);
    return $count;
}

//total book sale price------------------------------
function totalbooksaleprice()
{
    // Connect to the database
    $conn = db_connect();

    $sql = "SELECT total_price FROM orders";
    $result = mysqli_query($conn, $sql);
    $sumPrice = 0;
    if ($result) {
        // Loop through the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $cleanedPrice = str_replace(',', '', $row['total_price']);
            $floatPrice = (float) $cleanedPrice;
            $sumPrice += $floatPrice;
        }
    }
    // Free the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);

    return $sumPrice;
}

// current book sale -----------------
function currentSale()
{
    // Connect to the database
    $conn = db_connect();

    // Get the current date in MySQL format
    $currentDate = date("Y-m-d");

    // Prepare the SQL query to count orders for the current date
    $sql = "SELECT COUNT(*) AS count FROM orders WHERE DATE(date) = '$currentDate'";
    $result = mysqli_query($conn, $sql);

    // Fetch the count from the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    // Free the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);

    return $count;
}


function currentPriceSale()
{
    // Connect to the database
    $conn = db_connect();

    // Get the current date in MySQL format
    $currentDate = date("Y-m-d");

    // Prepare the SQL query to count orders for the current date
    $sql = "SELECT total_price as currentprice FROM orders WHERE DATE(date) = '$currentDate'";
    $result = mysqli_query($conn, $sql);

    $sumPrice = 0;
    if ($result) {
        // Loop through the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $cleanedPrice = str_replace(',', '', $row['currentprice']);
            $floatPrice = (float) $cleanedPrice;
            $sumPrice += $floatPrice;
        }
    }
    // Free the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);

    return $sumPrice;
}


//get all review ditails--------------------------------------

function getAllReview()
{
    // Connect to the database
    $conn = db_connect();
    $sql = "SELECT r.r_id as id, r.feedback as feedback, r.rating as rate, c.name as name, c.phone as phone, c.email as email 
            FROM review r
            JOIN customers c
            ON r.c_id = c.c_id
            ORDER BY id";

    $result = mysqli_query($conn, $sql);
    return $result;
}


// feedback in dashboard---------------
function getAlldashboarReview()
{
    // Connect to the database
    $conn = db_connect();
    $sql = "SELECT r.feedback as feedback, c.name as name, r.time as date
            FROM review r
            JOIN customers c
            ON r.c_id = c.c_id
            LIMIT 4";

    $result = mysqli_query($conn, $sql);
    return $result;
}

//task to complete-------------------------

function insertTask($taketask)
{
    $conn = db_connect();
    $sql = "INSERT INTO task (task) VALUES ('$taketask')";
    // Execute query
    mysqli_query($conn, $sql);

    // Close the statement and connection
    mysqli_close($conn);
}

function dasboardTask()
{
    // Connect to the database
    $conn = db_connect();
    $sql = "SELECT * from task";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function removeTaskFromList($removetask)
{
    $conn = db_connect();
    $sql = "DELETE FROM task WHERE t_id = '$removetask'";
    // Execute query
    mysqli_query($conn, $sql);

    // Close the statement and connection
    mysqli_close($conn);
}




function getAuthorDetails()
{
    // Connect to the database
    $conn = db_connect();

    // Perform query to retrieve book details including image
    $sql = "SELECT  * FROM authors";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result) {
        // Fetch and display each book details including image
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>{$row['name']}</h2>";
            echo "<p>Details: {$row['detail']}</p>";

            $image = $row['image'];
            // Output the book image
            echo '<img src="./dbimages/author_img/' . $image . '" alt="Author Image"><br>';

            echo "<hr>";
        }
    } else {
        // Error handling if query fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}



function getPublisherDetails()
{
    // Connect to the database
    $conn = db_connect();

    // Perform query to retrieve book details including image
    $sql = "SELECT  p.image as pimage, a.name as aname, a.detail as adetail, p.name as pname, p.detail as pdetail FROM publishers p
            JOIN authors a 
            ON p.a_id = p.a_id";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result) {
        // Fetch and display each book details including image
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>Authors name: {$row['aname']}</p>";
            echo "<p>Publisher name: {$row['pname']}</p>";
            echo "<p>Author Details: {$row['adetail']}</p>";
            echo "<p>Publisher Details: {$row['pdetail']}</p>";

            $image = $row['pimage'];
            // Output the book image
            echo '<img src="./dbimages/publisher_img/' . $image . '" alt="Publishers Image"><br>';

            echo "<hr>";
        }
    } else {
        // Error handling if query fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}

//add the cart in session-------------------------
function add_to_card($id, $title, $price, $image)
{

    // Define your add_detail_card function to add item to cart
    // Initialize the cart in session if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // Create an empty cart if it doesn't exist
    }

    // Check if the item is already in the cart by looking at the 'id' field in each cart item
    $cart_ids = array_column($_SESSION['cart'], 'id');

    if (in_array($id, $cart_ids)) {
        // If the item is already in the cart, redirect without adding a duplicate
        header("Location: buy");
        exit;
    } else {
        // If the item is not in the cart, add it to the session-based cart
        $_SESSION['cart'][] = [
            'id' => $id,
            'image' => $image,
            'title' => $title,
            'price' => $price
        ];
    }

    // Redirect after adding to the cart
    header("Location: buy");
    exit;
}

// remove the cart in session---------------------------

function remove_the_cart($remove_cart_id)
{
    // Check if the cart session exists to avoid undefined index errors
    if (isset($_SESSION["cart"])) {
        // Iterate over the cart using array indices
        foreach ($_SESSION["cart"] as $index => $cart) {
            if ($cart["id"] == $remove_cart_id) {
                // Unset the specific index instead of using the "id" as the key
                unset($_SESSION['cart'][$index]);
                unset($_SESSION['localcart'][$index]);


                // Optional: Reindex the array to maintain order
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                $_SESSION['localcart'] = array_values($_SESSION['localcart']);




                // Redirect to the cart page
                header("Location: cart");
                exit; // Exit to prevent further script execution
            }
        }
    }
}




//count the product order------------------------

function count_order_product()
{
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
        return 0;
    }
    $totalcount = count($_SESSION["cart"]);

    return $totalcount;
}

function count__localorder_product()
{

    $total_loal_count = count($_SESSION["localcart"]);
    return $total_loal_count;
}
// make the json format---------



function make_array_to_json()
{
    // Check if the session 'cart' is empty or not set
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<script>localStorage.removeItem('cartData');</script>";
        // If the session cart is empty, set a flag to check localStorage on the client-side
        if (isset($_SESSION['localcart'])) {
            $_SESSION['cart'] = $_SESSION['localcart'];
        }
    } else {
        // If the session cart is not empty, store it in localStorage
        $jsonData = json_encode($_SESSION['cart']);
        echo "<script>localStorage.setItem('cartData', '" . $jsonData . "');</script>";
    }
}





// checkout process start--------------------------------------------------------------------------------------------------------------

function customer_add_db($name, $email, $phone, $address)
{
    $conn = db_connect();

    // Check if the table is empty or not empty
    $count_sql = "SELECT COUNT(*) AS customerauth FROM customers";
    $count_result = mysqli_query($conn, $count_sql);
    $row = mysqli_fetch_assoc($count_result);

    //count the no of row
    $count = $row['customerauth'];

    //if row is greater than 0 means that the 
    if ($count > 0) {
        // Check if the customers already exists
        $check_sql = "SELECT c_id as cid FROM customers WHERE name = '$name'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // customers already exists, return the existing customers ID
            $row = mysqli_fetch_assoc($check_result);
            $id = $row['cid'];
            echo "<script>console.log('customers \'$name\' already exists with ID: $id');</script>";
            mysqli_close($conn);
            return $id;
        }
    }

    // Insert customers data into the database
    $customers_sql = "INSERT INTO customers (name, phone, email, address) VALUES ('$name', '$phone', '$email', '$address')";
    if (mysqli_query($conn, $customers_sql)) {
        // Get the ID of the inserted customers
        $id = mysqli_insert_id($conn);
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        $id = null; // Set $id to null in case of error
    }

    mysqli_close($conn); // Close the database connection

    return $id;
}

function payment_add_db($status, $customer_id)
{

    $conn = db_connect();

    // Insert pay data into the database
    $pay_sql = "INSERT INTO payments (status , c_id) VALUES ('$status', '$customer_id')";
    if (mysqli_query($conn, $pay_sql)) {
        // Get the ID of the inserted pay
        $id = mysqli_insert_id($conn);
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        $id = null; // Set $id to null in case of error
    }

    mysqli_close($conn); // Close the database connection

    return $id;
}

function shipping_add_db($payment_id, $customer_id, $dilivery_status, $delivery_date)
{
    $conn = db_connect();

    // Insert pay data into the database
    $pay_sql = "INSERT INTO shipping_details (pay_id, c_id, dilivery_status, end_shipping) VALUES ('$payment_id', '$customer_id' , '$dilivery_status' , '$delivery_date')";
    if (mysqli_query($conn, $pay_sql)) {
        // Get the ID of the inserted pay
        $id = mysqli_insert_id($conn);
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        $id = null; // Set $id to null in case of error
    }

    mysqli_close($conn); // Close the database connection

    return $id;
}

function order_add_db($quantity, $totalprice, $customer_id, $bookids, $payment_id, $shipping_id)
{

    $conn = db_connect();

    // Insert pay data into the database
    $pay_sql = "INSERT INTO orders (quantity, total_price, c_id , order_bid, pay_id , ship_id ) VALUES ('$quantity', '$totalprice' , '$customer_id' , '$bookids', '$payment_id', '$shipping_id')";
    if (mysqli_query($conn, $pay_sql)) {
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        $id = null; // Set $id to null in case of error
    }

    mysqli_close($conn); // Close the database connection
}

function feedback_add_db($customer_id, $comment, $ranting)
{
    $conn = db_connect();

    // Insert pay data into the database
    $pay_sql = "INSERT INTO review (c_id, feedback, rating) VALUES ('$customer_id', '$comment' , '$ranting' )";
    if (mysqli_query($conn, $pay_sql)) {
        // Get the ID of the inserted pay
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        $id = null; // Set $id to null in case of error
    }

    mysqli_close($conn); // Close the database connection

}

// update all the book -----------------------------------------

function UpdateBook($bookId, $isbn, $title, $genre, $price, $qty, $desc, $filename, $tempname, $folder)
{
    $conn = db_connect();

    // Handle image upload
    if ($filename != "") {
        $image_path = $folder . $filename;
        move_uploaded_file($tempname, $image_path);

        // Update image path in the database
        $sql_image = "UPDATE books SET image_path = '$image_path' WHERE b_id = '$bookId'";
        mysqli_query($conn, $sql_image);
    }

    // Update other book details
    $sql = "UPDATE books
            SET isbn = '$isbn', title= '$title', description = '$desc', genre = '$genre', price = '$price', quantity = '$qty'
            WHERE b_id = '$bookId'";
    mysqli_query($conn, $sql);
    ob_start(); // Start output buffering

    // Your PHP code here
    header("Location: view_book.php");

    ob_end_flush(); // Send output to the browser


    mysqli_close($conn); // Close the database connection


}


function UpdateAuthor($authId, $auth, $authdesc)
{
    $conn = db_connect();
    $sql = "UPDATE authors
    SET name = '$auth' , detail = ' $authdesc'
    WHERE a_id = '$authId'  ";
    mysqli_query($conn, $sql);
    mysqli_close($conn); // Close the database connection

    header("Location:view_book.php");
}

function UpdatePublisher($pubId, $publisher, $publisherdesc)
{
    $conn = db_connect();
    $sql = "UPDATE publishers
    SET name = '$publisher' , detail = '$publisherdesc'
    WHERE p_id = '$pubId' ";
    mysqli_query($conn, $sql);
    mysqli_close($conn); // Close the database connection

    header("Location:view_book.php");
}

function removeTheBook($removebook)
{
    $conn = db_connect();
    $sql = "DELETE FROM books WHERE b_id = '$removebook'";
    // Execute query
    mysqli_query($conn, $sql);

    // Close the statement and connection
    mysqli_close($conn);

    header("Location:view_book.php");
}
//see order items

function selectItem($id)
{
    $conn = db_connect();

    // Escape the input to avoid SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // Define and execute the SQL query
    $sql = "SELECT b_id AS bid, title FROM books WHERE b_id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result
        $item = mysqli_fetch_assoc($result);

        // Get the title from the fetched data
        if ($item) {
            $title = $item['title'];
        } else {
            $title = null; // No record found
        }

        // Free result set memory
        mysqli_free_result($result);
    } else {
        $title = null; // Query failed
    }

    // Close the connection
    mysqli_close($conn);

    return $title; // Return the title or null if not found
}

// for update/delete orders=---------------------------------------------------

function removeTheOrder($removeOrder)
{
    $conn = db_connect();
    $sql = "DELETE FROM orders WHERE o_id = '$removeOrder'";
    // Execute query
    mysqli_query($conn, $sql);

    // Close the statement and connection
    mysqli_close($conn);

    header("Location:orders.php");
}
