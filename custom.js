
// client section owl carousel
$(".client_owl-carousel").owlCarousel({
  loop: true,
  margin: 20,
  dots: false,
  nav: true,
  navText: [],
  autoplay: true,
  autoplayHoverPause: true,
  navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
  ],
  responsive: {
      0: {
          items: 1
      },
      600: {
          items: 2
      },
      1000: {
          items: 2
      }
  }
});
// JavaScript to close the overlay and restore scrolling
function closeOverlay() {
// Close the overlay logic...
document.body.style.overflow = 'auto'; // Reset overflow to allow scrolling
}


function closeAndRedirect() {
  // Redirect to index.php
  window.location.href = 'index.php';
}
function saveImage() {
const imageContainer = document.querySelector('.photo-container');
const image = imageContainer.querySelector('.user-photo');
const savedImage = document.querySelector('.saved-image');

savedImage.src = image.src;

// Get the URL of the saved image
const imageUrl = image.src;

// Replace the default user photo with the user-selected image
const defaultUserPhoto = document.querySelector('.default-user-photo');
defaultUserPhoto.src = imageUrl;

// Close the modal or perform any other necessary actions
hideForm();
}

// Function to preview the selected image
function previewImage(event) {
var input = event.target;
var reader = new FileReader();
reader.onload = function () {
    var dataURL = reader.result;
    var previewImage = document.getElementById('previewImage');
    previewImage.src = dataURL;
};
reader.readAsDataURL(input.files[0]);
}

function removeImage() {
var previewImage = document.getElementById('previewImage');
previewImage.src = 'images/default-user-photo.jpg';
}

function saveImage() {
var fileInput = document.getElementById('fileInput');
var file = fileInput.files[0];

if (file) {
    var formData = new FormData();
    formData.append('photo', file);

    // Send the image data to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_image.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Image saved successfully
            alert('Image saved successfully!');
        } else {
            // Error saving image
            alert('Error saving image.');
        }
    };
    xhr.send(formData);
} else {
    alert('Please select an image first.');
}
}


function showForm() {
  const modal = document.querySelector('.modal');
  modal.style.display = 'block';
}


// Add event listener to the "Change photo" button inside the modal window
const changephoto = document.querySelector('.change-button');
changephoto.addEventListener('click', function() {
  // Trigger click event on file input when change button is clicked
  document.getElementById('fileInput').click();
});


// Add event listener to the "Change photo" button
const changePhotoButton = document.querySelector('.change-photo-button');
changePhotoButton.addEventListener('click', showForm);


// Function to hide the modal form
function hideForm() {
  const modal = document.querySelector('.modal');
  modal.style.display = 'none';
}

function hideForm1() {
  const modal = document.querySelector('.modal');
  modal.style.display = 'none';
}

// Function to handle login status
function handleLoginStatus() {
// Check if user is logged in (you can use any appropriate condition)
var isLoggedIn = true; // For example, set to true if user is logged in

if (isLoggedIn) {
  // If user is logged in, replace login link with profile link
  var loginNavItem = document.getElementById("loginNavItem");
  if (loginNavItem) {
    loginNavItem.innerHTML = '<a class="nav-link" href="profile.php"> <i class="fa fa-user" aria-hidden="true"></i> Profile</a>';
  }
}
}
// Call the function to handle login status
handleLoginStatus();

function populateDynamicTable(data) {
  const tableBody = document.querySelector("#dynamic-table tbody");
  
  // Clear existing rows
  tableBody.innerHTML = "";
  
  // Iterate through the data array and create table rows dynamically
  data.forEach(item => {
      const row = document.createElement("tr");
      row.innerHTML = `<td>${item.key}</td><td>${item.value}</td>`;
      tableBody.appendChild(row);
  });
}

// Example data
const data = [
  { key: "Scientific Name", value: "Citrus x sinensis" },
  { key: "Soil type", value: "Loamy soils" },
  { key: "Season", value: "November - December" },
  { key: "Climate", value: "Subtropical climate" },
  { key: "PH level", value: "5.5 - 6.5" }
];

// Call the function with your data to populate the table
populateDynamicTable(data);

function hideViewSection() {
  var viewSection = document.querySelector('.view-section-overlay');
  if (viewSection) {
    viewSection.style.display = 'none';
  }
}

function showViewSection() {
  var viewSection = document.querySelector('.view-section-overlay');
  if (viewSection) {
    viewSection.style.display = 'block';
  }
}


// Get the input element and attach an event listener for input changes
var searchInput = document.getElementById('searchInput');
searchInput.addEventListener('input', function() {
// Get the value entered by the user
var searchText = this.value.toLowerCase();
// Get all the crop elements
var crops = document.querySelectorAll('.book');
// Loop through each crop element
crops.forEach(function(crop) {
  // Get the title element of the crop
  var title = crop.querySelector('.title');
  // Check if the title contains the searched text
  if (title.innerText.toLowerCase().includes(searchText)) {
    // If yes, show the crop
    crop.style.display = 'block';
  } else {
    // If not, hide the crop
    crop.style.display = 'none';
  }
});
});

function displayModal() {
  var modal = document.getElementById('photoModal');
  modal.style.display = "block";
}

function displayEdit() {
  var modal = document.getElementById('editName');
  modal.style.display = "block";
}

function hideeditform() {
  var modal = document.getElementById('editName');
  modal.style.display = "none";
}

// Function to populate days dropdown based on selected month
function updateDays() {
  var monthSelect = document.getElementById("month");
  var daySelect = document.getElementById("day");
  var month = monthSelect.options[monthSelect.selectedIndex].value;
  var daysInMonth = new Date(2022, month, 0).getDate(); // Get the number of days in the selected month

  // Clear previous options
  daySelect.innerHTML = "";

  // Populate days dropdown
  for (var i = 1; i <= daysInMonth; i++) {
    var option = document.createElement("option");
    option.text = i;
    option.value = i;
    daySelect.add(option);
  }
}

// Function to populate months and years dropdowns
function populateDropdowns() {
  var monthSelect = document.getElementById("month");
  var yearSelect = document.getElementById("year");

  // Populate months dropdown
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  for (var i = 0; i < months.length; i++) {
    var option = document.createElement("option");
    option.text = months[i];
    option.value = i + 1; // Month value is 1-based
    monthSelect.add(option);
  }

  // Populate years dropdown (e.g., from 1900 to 2100)
  var currentYear = new Date().getFullYear();
  for (var year = 1900; year <= 2100; year++) {
    var option = document.createElement("option");
    option.text = year;
    option.value = year;
    yearSelect.add(option);
  }

  // Initial population of days dropdown
  updateDays();
}

// Call the populateDropdowns function when the page loads
window.onload = populateDropdowns;

// Function to close the edit profile info modal
function hideprofileinfoform() {
var modal = document.getElementById('editprofileinfo');
modal.style.display = "none";
}

// Function to display a button
function displayprofileinfoform() {
var button = document.getElementById('editprofileinfo');
button.style.display = "block";
}

// Wait for the DOM to be fully loaded

function displaySuccessMessage() {
var modal = document.getElementById('message');
modal.style.display = 'block';

// Redirect to the login page after 3 seconds (adjust as needed)
setTimeout(function() {
  window.location.href = 'login.php';
}, 3000);
}

function displayPopupMessage() {
var emailErr = "<?php echo $email_err; ?>";
var passwordErr = "<?php echo $password_err; ?>";
var popup = document.getElementById("popup");

// Check if there are any errors
if (emailErr !== "" || passwordErr !== "") {
    var message = document.getElementById("message");
    message.innerHTML = emailErr + " " + passwordErr;
    popup.style.display = "block"; // Show the popup
    return false; // Prevent form submission
}
return true; // Allow form submission if no errors
}

function displayAlert() {
var confirmation = confirm("Please log in to access this service. Do you want to login now?");
if (confirmation) {
    window.location.href = "login.php";
}
}

// Add an event listener to the "Explore Now" link
document.addEventListener("DOMContentLoaded", function() {
var exploreNowLink = document.getElementById("exploreNowLink");
if (exploreNowLink) {
    exploreNowLink.addEventListener("click", function(event) {
        event.preventDefault();
        displayAlert();
    });
}
});


function showViewSection(cropId) {
  // Function to show detailed view section for a specific crop
  $.ajax({
      type: 'GET',
      url: 'fetch_crop_details.php', // Replace with the actual PHP script to fetch crop details
      data: {
          id: cropId
      },
      success: function(response) {
          $('#view-section-overlay').html(response);
          $('#overlay').show();
          $('#view-section-overlay').show();
      }
  });
}

function hideViewSection() {
  // Function to hide detailed view section
  $('#overlay').hide();
  $('#view-section-overlay').hide();
}

// Define a function to show the success message and redirect to login page
function showSuccessMessageAndRedirect() {
    // Show the modal
    document.getElementById("message").style.display = "block";
    
    // Set a timeout to close the modal after 3 seconds (3000 milliseconds)
    setTimeout(function() {
        document.getElementById("message").style.display = "none";
        // Redirect to the login page
        window.location.href = "login.php";
    }, 3000); // Adjust the time as needed
}

// Call the function to show the success message and redirect when the page loads (for testing purposes)
// You would typically call this function after the user registration process is successfully completed
showSuccessMessageAndRedirect();
