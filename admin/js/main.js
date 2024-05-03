(function () {
  "use strict";

  // Sidebar Toggler
  if (document.querySelector(".sidebar-toggler")) {
    document
      .querySelector(".sidebar-toggler")
      .addEventListener("click", function () {
        var sidebar = document.querySelector(".sidebar");
        var content = document.querySelector(".content");

        if (
          sidebar.classList.contains("open") &&
          content.classList.contains("open")
        ) {
          sidebar.classList.remove("open");
          content.classList.remove("open");
        } else {
          sidebar.classList.add("open");
          content.classList.add("open");
        }

        return false;
      });
  }

  // Spinner

  var spinner = function () {
    setTimeout(function () {
      var spinner = document.getElementById("spinner");
      if (spinner !== null) {
        spinner.classList.remove("show");
      }
    }, 1);
  };
  spinner();

  // Back to top button
  if (document.querySelector(".back-to-top")) {
    document
      .querySelector(".back-to-top")
      .addEventListener("click", function () {
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
      });
  }

  if (document.getElementById("flexcheckedadpass")) {
    document
      .getElementById("flexcheckedadpass")
      .addEventListener("click", () => {
        var pid = document.getElementById("exampleInputAdminpassword");
        if (pid.type === "password") {
          pid.type = "text";
        } else {
          pid.type = "password";
        }
      });
  }

  document.addEventListener("DOMContentLoaded", () => {
    // Get all checkboxes with the class "completeTask"
    let taskChecks = document.getElementsByClassName("completeTask");
    // Get all text elements with the class "getthenewid"
    let getchecked = document.getElementsByClassName("getthenewid");

    // Ensure the loop works with correct counts
    if (taskChecks.length !== getchecked.length) {
      console.error("Mismatch in checkbox and text element counts");
      return;
    }

    // Initialize checkboxes and text based on Local Storage
    for (let i = 0; i < taskChecks.length; i++) {
      let taskId = taskChecks[i].getAttribute("data-task-id"); // Get the unique task ID
      let storedState = localStorage.getItem("checkbox-" + taskId); // Retrieve the stored state

      // Apply the initial state from Local Storage
      if (storedState === "true") {
        // Local Storage returns strings
        taskChecks[i].checked = true; // Set the checkbox as checked
        getchecked[i].classList.add("text-decoration-line-through"); // Apply the strike-through
      } else {
        taskChecks[i].checked = false; // Set the checkbox as unchecked
        getchecked[i].classList.remove("text-decoration-line-through"); // Remove the strike-through
      }

      // Add a change event listener to each checkbox
      taskChecks[i].addEventListener("change", function () {
        const isChecked = taskChecks[i].checked; // Determine if the checkbox is checked
        let taskId = taskChecks[i].getAttribute("data-task-id"); // Get the task ID

        // Update Local Storage with the current state
        localStorage.setItem(
          "checkbox-" + taskId,
          isChecked ? "true" : "false"
        );

        // Apply or remove strike-through based on the checked state
        if (isChecked) {
          getchecked[i].classList.add("text-decoration-line-through"); // Add strike-through
        } else {
          getchecked[i].classList.remove("text-decoration-line-through"); // Remove strike-through
        }
      });
    }
  });
})();
