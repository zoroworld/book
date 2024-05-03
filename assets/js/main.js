// loadind... in javascript------------------

window.onload = function () {
  setTimeout(function () {
    var preloader = document.querySelector(".preloader");
    if (preloader) {
      preloader.style.transition = "fast";
      preloader.style.opacity = "0";
      setTimeout(function () {
        preloader.style.display = "none";
      }, 200);
    }
  }, 1000);
};

$(document).ready(function () {
  var owl = $("#active-tstimonial-carusel");
  owl.owlCarousel({
    loop: true,
    margin: 30,
    dots: true,
    nav: true,
    items: 3,
    responsiveClass:true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      765: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
      },
    },
  });
});

if (document.getElementById("cart_order_total")) {
  let onchagetext = document.getElementsByClassName("getqtymesure");
  let singlesubtotal = document.getElementsByClassName("single_subtotal");
  let getOrderPrice = document.getElementsByClassName("get_ord_price");
  let totalcol = document.getElementsByClassName("all-order-detail");
  let allsubtol = document.getElementById("allsubtotal");
  let shiptotal = document.getElementById("shiptotal");
  let cartTotal = document.getElementById("cart_order_total");
  let checkoutsinglesubtotal = document.getElementsByClassName(
    "check_single_subtotal"
  );
  // let checkoutTotal = document.getElementById("getcheckouttotal");

  console.log(checkoutsinglesubtotal[0].value);

  let n = totalcol.length;
  let alltotalsum = 0;

  // Set initial subtotal
  for (let i = 0; i < n; i++) {
    const quantity = parseInt(onchagetext[i].value) || 1; // Set a default value
    const price = parseFloat(getOrderPrice[i].innerText);
    const subtotal = quantity * price;
    singlesubtotal[i].innerText = subtotal.toFixed(2);
    alltotalsum += subtotal;
  }

  allsubtol.innerText = Number(alltotalsum).toFixed(2);
  cartTotal.innerText = (
    Number(allsubtol.innerText) + Number(shiptotal.innerText)
  ).toFixed(2);

  // checkoutTotal.value = cartTotal.innerText;

  // console.log(alltotalsum.toFixed(2)); // Display as decimal for better readability

  // Handler function to update quantity, subtotal, and total sum
  function updateQuantity(index, increment) {
    const quantityField = onchagetext[index];
    const price = parseFloat(getOrderPrice[index].innerText);

    let quantity = parseInt(quantityField.value) || 1;
    quantity += increment;

    if (quantity < 1) {
      quantity = 1; // Ensure quantity doesn't go below 1
    }

    const oldSubtotal = parseFloat(singlesubtotal[index].innerText);
    quantityField.value = quantity;
    const newSubtotal = quantity * price;

    checkoutsinglesubtotal[index].value = newSubtotal.toFixed(2);
    singlesubtotal[index].innerText = newSubtotal.toFixed(2);

    alltotalsum = alltotalsum - oldSubtotal + newSubtotal; // Update the total sum

    allsubtol.innerText = alltotalsum.toFixed(2);
    cartTotal.innerText = (
      Number(allsubtol.innerText) + Number(shiptotal.innerText)
    ).toFixed(2);

    // checkoutTotal.value = cartTotal.innerText;
  }

  //add make +1--------
  let plusid = document.getElementsByClassName("plusadd");
  for (let i = 0; i < n; i++) {
    plusid[i].addEventListener("click", () => {
      updateQuantity(i, 1); // Increment the quantity
    });
  }

  //minus make -1-----------
  let minusid = document.getElementsByClassName("minusremove");
  for (let i = 0; i < n; i++) {
    minusid[i].addEventListener("click", () => {
      updateQuantity(i, -1); // Decrement the quantity
    });
  }
}

// see the local storage------------------------------------

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
        // console.log("Data sent successfully:", xhr.responseText); // Log response from server
      }
    };
    xhr.send("data=" + encodeURIComponent(localStorageData));
  } else {
    // console.log("No data in local storage for key:", localStorageKey);
  }
}

// Event listener to send data on page load

sendLocalStorageDataToServer("cartData", "cart.php");

//---------------------------------------------------------------------------------------------------------------

// filter update price
if (document.getElementById("pricerange")) {
  let priceRange = document.getElementById("pricerange");
  let pricereg = document.getElementById("pricereg");

  pricereg.innerText = priceRange.value;
  priceRange.addEventListener("change", () => {
    pricereg.innerText = priceRange.value;
    localStorage.setItem("pric_rate", pricereg.innerText);
  });
  pricereg.innerText = localStorage.getItem("pric_rate");
}
