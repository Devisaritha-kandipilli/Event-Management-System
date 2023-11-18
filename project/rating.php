<!DOCTYPE html>
<html>
<head>
<?php
	 session_start();
       if(empty($_SESSION)) {
    include_once './login.php';
    include_once './include/login.php';
}
else {
        ?>
  <title>Eventrix | Rating Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
	.rating {
      display: flex;
      justify-content: center;
    }
    .star {
      cursor: pointer;
      font-size: 2rem;
      transition: transform 0.2s;
    }
    .star:hover {
      transform: scale(1.2);
    }
    .confirmation {
      display: none;
      text-align: center;
      opacity: 0;
      transition: opacity 0.5s, transform 0.5s;
    }
	body {
            background-image: url('./dist/img/raating.png');
            background-repeat: no-repeat;
			background-size: cover;
        }
		p,#bookingId{
			
		font-size:20px;}
		.feedback-card {
    text-align: center;
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

  </style>
  <?php
include_once 'include/head.php';
?> 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<?php
include_once 'include/sidebar.php';
?>
  <div class="feedback-card">
    <h1 class="mt-4">Please provide Rating for us</h1>
    <form method="post" >
      <div class="form-group">
        <label for="bookingId">Enter Booking ID</label>
        <input type="number" class="form-control" id="bookingId" name="bookingId" required >
      </div>
	  <div class="form-group">
        <label for="description">Describe your experience</label>
        <input type="text" class="form-control" id="description" name="description" required >
      </div>
      <div class="rating" id="ratingStars">
          <span class="star" onclick="setRating(1)">&#9733</span>
          <span class="star" onclick="setRating(2)">&#9733</span>
          <span class="star" onclick="setRating(3)">&#9733</span>
          <span class="star" onclick="setRating(4)">&#9733</span>
          <span class="star" onclick="setRating(5)">&#9733</span>
      </div>
      <p class="mt-3" id="ratingText">Please provide rating: 0 stars</p>
      
    
<div class="container md-5"></div>
  <div class="container md-5">
    <div class="alert alert-success confirmation" id="confirmationMessage">
      Thank you for your rating!
    </div>
  </div>
</form>
  </div>
  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 



  <script>
    let currentRating = 0;
const ratingText = document.getElementById("ratingText");
const confirmationMessage = document.getElementById("confirmationMessage");

function setRating(rating) {
    currentRating = rating;
    ratingText.textContent = `Rate us: ${rating} stars`;
    highlightStars(rating);

    // Get the booking ID from the input field
    const bookingId = document.getElementById("bookingId").value;
    const description = document.getElementById("description").value;

    // Send the rating and booking ID to the server using AJAX
    fetch('insert1.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ rating: rating, booking_id: bookingId, description: description }),
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data.message);
        if (data.status === 'success') {
            showConfirmation();
            alert(data.message); // Display an alert message
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function highlightStars(rating) {
    const stars = document.querySelectorAll(".star");
    stars.forEach((star, index) => {
        if (index < rating) {
            star.style.color = "gold";
        } else {
            star.style.color = "black";
        }
    });
}

function showConfirmation() {
    confirmationMessage.style.display = "block";
    setTimeout(() => {
        confirmationMessage.style.opacity = 1;
    }, 10);
}
// ... your existing JavaScript code
</script><script>
.then((data) => {
    console.log(data.message);
    if (data.status === 'success') {
        showConfirmation();
        alert(data.message); // Display an alert message
    } else {
        console.error('Error:', data.message);
    }
})

// ... rest of your JavaScript code

</script>
<?php include_once './include/scripts.php'; ?>
</body>
</html>
<?php
}
?>