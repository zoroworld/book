<?php
// $url = $_SERVER['REQUEST_URI'];
// $parts = explode('/', $url);
// $countUrl = count($parts);



// for ($i = 0; $i < $countUrl; $i++) {
//     echo $i . $parts[$i] . "\n";
// }
// $index = end($parts);
// $index = $parts[$countUrl-1];
//  echo $index;
//  echo "<script> console.log('$index'); </script>";   


// count the array

session_start();

require_once ("./db/phperror.php");
require_once ("./db/function.php");
$conn = db_connect();


// getBookDetails();

// getAuthorDetails();

// getPublisherDetails();

// print_r($_SESSION['cart']);


// if(isset($_POST["destroy_session"]))
// {
// session_destroy();
// }


// $cart = $_SESSION['cart'];

// foreach ($cart as $item) {
//     // Access individual properties
//     $id = $item['id'];
//     $image = $item['image'];
//     $title = $item['title'];
//     $price = $item['price'];

//     // Display the item details (for example)
//     echo "ID: $id, Title: $title, Price: $price, Image: $image\n";
//     echo"<br>";
// }



// $jsonData = json_encode($cart); // Encode the data to JSON

// header('Content-Type: application/json'); // Set the header to indicate JSON
// echo $jsonData; // Output the JSON data directly
// Receive JSON data from JavaScript


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// if(isset($_POST['data'])) {
//     // Retrieve data from POST request
//     $data = $_POST['data'];
//     echo $data;

//     // Store data in session variable
//     $_SESSION['locastoragecartData'] = $data;

    

//     // Optionally, you can send a response back to the client
//     echo 'Data stored in session successfully';
// } else {
//     // Handle the case where 'data' parameter is not present
//     echo 'Error: Data parameter not found in the request';
// }

// }


print_r($_SESSION['localcart']);
$count = count__localorder_product();
echo $count;


require_once ("template/footer.php");
?>
<!-- <form action="" method="POST">
    <input type="submit" name="destroy_session" value="destroy session">
</form> -->

