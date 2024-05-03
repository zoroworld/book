if (isset($_POST["submit"])) 
{
    include ("../db/function.php");
    $conn = db_connect();
    

    // //All  details---------------------------------------------------------------------------
    $isbn = $_POST["isbn"];
    $book_title = $_POST["title"];
    $book_desc = $_POST["desc"];
    // $author = $_POST["author"];
    // $author_details = $_POST["author_desc"];
    // $publisher = $_POST["publisher"];
    // $publisher_details = $_POST["publisher_desc"];

    // // Book Image file handling
    $bookfilename = $_FILES["book_img"]["name"];
    $booktempname = $_FILES["book_img"]["tmp_name"];
    $bookfolder = "../db_images/book_img/" . $bookfilename;

    // // Author Image file handling
    // $authorfilename = $_FILES["author_img"]["name"];
    // $authortempname = $_FILES["author_img"]["tmp_name"];
    // $authorfolder = "../db_images/author_img/" . $authorfilename;

    // // Publisher Image file handling
    // $publisherfilename = $_FILES["publisher_img"]["name"];
    // $publishertempname = $_FILES["publisher_img"]["tmp_name"];
    // $publisherfolder = "../db_images/publisher_img/" . $publisherfilename;


    // // Read the image data
    // //book
    $bookimage = file_get_contents($booktempname);
    // //author
    // $authorimage = file_get_contents($authortempname);
    // //publisher
    // $publisherimage = file_get_contents($publishertempname);



    // // Escape the image data to prevent SQL injection 
    // //book
    $bookescaped_image = mysqli_real_escape_string($conn, $bookimage);
    // //author
    // $authorescaped_image = mysqli_real_escape_string($conn, $authorimage);
    // //publisher
    // $publisherescaped_image = mysqli_real_escape_string($conn, $publisherimage);



    // // SQL query to insert data into the database
    // //book
    $book_sql = "INSERT INTO books (isbn, title, description, image) VALUES ('$isbn', '$book_title', '$book_desc', '$bookescaped_image')";

    // // Execute query
    if (mysqli_query($conn,  $book_sql)) {
        // Now let's move the uploaded image into the folder
        if (move_uploaded_file($booktempname, $bookfolder)) {
            echo "<h3>Book image uploaded and data inserted successfully!</h3>";
        } else {
            echo "<h3>Failed to move the uploaded image!</h3>";
        }
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
    }

    // //author
    // $author_sql = "INSERT INTO authors (name, details, image) VALUES ('$author, '$author_details', '$authorescaped_image')";

    // // Execute query
    // if (mysqli_query($conn,  $author_sql )) {
    //     // Now let's move the uploaded image into the folder
    //     if (move_uploaded_file($authortempname, $authorfolder)) {
    //         echo "<h3>Author image uploaded and data inserted successfully!</h3>";
    //     } else {
    //         echo "<h3>Failed to move the uploaded image!</h3>";
    //     }
    // } else {
    //     echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
    // }

    // //publisher
    // $publisher_sql = "INSERT INTO publishers (name, details, image) VALUES ('$publisher, '$publisher_details', '$publisherescaped_image')";

    // // Execute query
    // if (mysqli_query($conn,   $publisher_sql)) {
    //     // Now let's move the uploaded image into the folder
    //     if (move_uploaded_file($publisherimage,  $publisherfolder)) {
    //         echo "<h3>publisher image uploaded and data inserted successfully!</h3>";
    //     } else {
    //         echo "<h3>Failed to move the uploaded image!</h3>";
    //     }
    // } else {
    //     echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
    // }
}