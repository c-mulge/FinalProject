<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANCEL BOOKING</title>
</head>
<body>
<style>
    .form{
        align-content: center;
        margin-left: 350px;
        margin-top: 150px;
    }
    .hai{
        width: 200px;
    height: 40px;
   
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:#fff;
    margin-left: 90px;
    }
    .no{
        width: 200px;
    height: 40px;
   
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:#fff;
    margin-left: 100px;
    }

    .no a{
        text-decoration: none;
        color: white;
    }

</style>

 <form class="form"  method="POST" >
        <h1>ARE YOU SURE YOU WANT TO CANCEL YOUR BOOKING?</h1>
        <input  type="submit" class="hai" value="CANCEL NOW" name="cancelnow">
        <button class="no"><a href="payment.php" >GO TO PAYMENT</a></button>
    </form>
</body>
</html> -->

<?php include('user_auth.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Booking</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Form Container */
        .form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 123, 255, 0.1);
            padding: 40px;
            text-align: center;
            width: 90%;
            max-width: 600px;
        }

        /* Heading Style */
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
        }

        /* Button Styles */
        .btn {
            width: 220px;
            height: 50px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            margin: 10px;
            transition: all 0.3s ease;
        }

        .btn.cancel {
            background-color: #dc3545;
            color: white;
        }

        .btn.cancel:hover {
            background-color: #b02a37;
        }

        .btn.payment {
            background-color: #007bff;
            color: white;
        }

        .btn.payment:hover {
            background-color: #0056b3;
        }

        .btn.payment a {
            text-decoration: none;
            color: white;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
    </style>
</head>

<body>
<?php
	
    require_once('connection.php');
    // session_start();
    $bid = $_SESSION['bid'];
    if(isset($_POST['cancelnow'])){
        $del = mysqli_query($con,"delete from booking where BOOK_ID = '$bid' order by BOOK_ID DESC limit 1");
        echo "<script>window.location.href='cardetails.php';</script>";
        
    }


?>
    <form class="form" method="POST">
        <h1>ARE YOU SURE YOU WANT TO CANCEL YOUR BOOKING?</h1>
        <div class="btn-group">
            <input type="submit" class="btn cancel" value="Cancel Now" name="cancelnow">
            <button class="btn payment"><a href="payment.php">Go to Payment</a></button>
        </div>
    </form>
</body>

</html>
