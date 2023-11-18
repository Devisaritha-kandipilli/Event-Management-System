<!DOCTYPE html>
<html lang="en">
<?php

    session_start();
	if(empty($_SESSION)) {
    include_once './login.php';
    include_once './include/login.php';
}
else {

?>
<head>
    <meta charset="UTF-8">
    <title>Eventrix | Checkout</title>
	<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            width: 100%;
            background-image: url('./dist/img/pmnt.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        form {
            background: rgba(255, 255, 255, 0.1);
			 backdrop-filter: blur(10px);
			background-blur: 50px; 
            padding: 20px;
            border-radius: 10px;
            height: 450px;
            width: 450px;
        }

        h2 {
            color: #000080;
        }

        #name,
        #amt,
        
        #contact {
            width: 80%;
            padding: 10px;
            margin: 10px ;
            border: 1px solid #ccc;
        }
		#bookingID {
            width: 85%;
            padding: 10px;
            margin: 10px ;
            border: 1px solid #ccc;
        }
        #btn {
            width: 87%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        #btn:hover {
            background-color: #56b3;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            text-align: left;
            margin: 5px 0;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="">
</head>

<body style="overflow: hidden;">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <form>
       <h2 class="text-center">Checkout</h2>
        <div class="form-group">
            <label for="name">Enter name:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="bookingID">Booking ID:</label>
            <?php
            include("./include/conn.php");
            $sql = "select * from booking  ";
            $rs = $conn->query($sql);
            ?>
            <select name='bookingID' id='bookingID' class='form-control'>
                <option value=''>Select Booking ID:</option>
                <?php
                while ($row = $rs->fetch_assoc()) {
                ?>
                    <option value='<?php echo $row['bookingID']; ?>'>
                        <?php echo $row['bookingID']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="amt">Enter amount:</label>
            <input type="text" name="amt" id="amt">
        </div>
        <div class="form-group">
            <label for="contact">Enter contact info:</label>
            <input type="text" name="contact" id="contact">
        </div>
        <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()">
    </form>

    <script>
        function pay_now() {
            var name = jQuery('#name').val();
            var bookingID = jQuery('#bookingID').val();
            var amt = jQuery('#amt').val();
            var contact = jQuery('#contact').val();
            jQuery.ajax({
                type: 'post',
                url: 'payment_process.php',
                data: "contact=" + contact + "&amt=" + amt + "&bookingID=" + bookingID + "&name=" + name,
                success: function(result) {
                    var options = {
                        key: "rzp_test_YMAeHqyBZV5LNP",
                        amount: amt * 100,
                        currency: "INR",
                        name: "Eventrix",
                        description: "Test Transaction",
                        image: "dist/img/eventrix.png",
                        handler: function(response) {
                            jQuery.ajax({
                                type: 'post',
                                url: 'payment_process.php',
                                data: "payment_id=" + response.razorpay_payment_id,
                                success: function(result) {
                                    window.location.href = "thank_you.php";
                                }
                            });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });
        }
    </script>
</body>
</html>
<?php
}
?>