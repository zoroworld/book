<?php
require_once ("db/phperror.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


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

?>
<script>
    // Function to send local storage data to server with AJAX
function sendLocalStorageDataToServer(localStorageKey, serverEndpoint) {
  // Check if the cart data is in local storage
  var localStorageData = localStorage.getItem(localStorageKey);

  if (localStorageData) {
    // Send data to server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", serverEndpoint, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Data successfully sent to server
        console.log("Data sent successfully:", xhr.responseText); // Log response from server
      }
    };
    xhr.send("data=" + encodeURIComponent(localStorageData));
  } else {
    console.log("No data in local storage for key:", localStorageKey);
  }
}

// Event listener to send data on page load

sendLocalStorageDataToServer("cartData", "sessiondata.php");
</script>