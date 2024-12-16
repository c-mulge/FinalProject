<?php
require_once('connection.php');
include('user_auth.php'); // Ensure the user is authenticated

// Check if a car ID is passed in the URL
if (isset($_GET['id'])) {
    $car_id = $_GET['id'];

    // Retrieve car details from the database
    $sql = "SELECT * FROM cars WHERE CAR_ID='$car_id' AND AVAILABLE='Y'";
    $result = mysqli_query($con, $sql);
    $car = mysqli_fetch_assoc($result);
}

// Handle the booking form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = $_SESSION['email']; // Logged-in user's email
    $car_id = $_POST['car_id']; // Car ID from the form
    $book_place = $_POST['book_place']; // Place of booking
    $book_date = $_POST['book_date']; // Booking date
    $duration = $_POST['duration']; // Duration of rental
    $phone_number = $_POST['phone_number']; // User's phone number
    $destination = $_POST['destination']; // Destination for the car rental
    $return_date = $_POST['return_date']; // Return date
    $price = $_POST['price']; // Price for the booking
    
    // Insert booking details into the booking table
    $sql = "INSERT INTO booking (CAR_ID, EMAIL, BOOK_PLACE, BOOK_DATE, DURATION, PHONE_NUMBER, DESTINATION, RETURN_DATE, PRICE, BOOK_STATUS) 
            VALUES ('$car_id', '$user_email', '$book_place', '$book_date', '$duration', '$phone_number', '$destination', '$return_date', '$price', 'UNDER PROCESSING')";

    if (mysqli_query($con, $sql)) {
        $booking_id = mysqli_insert_id($con); // Get the last inserted booking ID
        // Redirect to the payment page
        header("Location: payment.php?book_id=" . $booking_id);
        exit();
    } else {
        $error = "Failed to save booking details.";
    }
}

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Car - CaRental</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
       
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    <header class="py-4 flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-700 px-6 shadow-lg">
        <div class="logo text-2xl font-bold text-white">CaRental</div>
        <nav class="menu space-x-6">
            <a href="cardetails.php" class="text-white hover:text-gray-300 transition duration-300">Home</a>
            <a href="aboutus.html" class="text-white hover:text-gray-300 transition duration-300">About</a>
            <a href="contactus.html" class="text-white hover:text-gray-300 transition duration-300">Contact</a>
        </nav>
    </header>

    <div class="max-w-3xl mx-auto mt-12 bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-8">Book Your Car</h1>

        <div class="mb-8">
            <div class="text-center mb-4">
                <h2 class="text-xl font-semibold text-gray-700 uppercase mb-2">
                    <?php echo $car['CAR_NAME']; ?>
                </h2>
                <p class="text-gray-600">Fuel Type: <?php echo $car['FUEL_TYPE']; ?></p>
                <p class="text-gray-600">Capacity: <?php echo $car['CAPACITY']; ?> seats</p>
                <p class="text-green-500 font-bold text-lg">Rent per day: ₹<?php echo $car['PRICE']; ?>/-</p>
            </div>
        </div>

        <form method="POST" action="booking.php" class="space-y-6">
            <input type="hidden" name="car_id" value="<?php echo $car['CAR_ID']; ?>">

            <div>
                <label for="book_place" class="block text-gray-700 font-medium">Booking Place</label>
                <input 
                    type="text" 
                    name="book_place" 
                    required 
                    class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="book_date" class="block text-gray-700 font-medium">Booking Date</label>
                <input 
                    type="date" 
                    name="book_date" 
                    required 
                    class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="duration" class="block text-gray-700 font-medium">Duration (Days)</label>
                <input 
                    type="number" 
                    name="duration" 
                    required 
                    class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="phone_number" class="block text-gray-700 font-medium">Phone Number</label>
                <input 
                    type="tel" 
                    name="phone_number" 
                    required 
                    class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="destination" class="block text-gray-700 font-medium">Destination</label>
                <input 
                    type="text" 
                    name="destination" 
                    required 
                    class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="return_date" class="block text-gray-700 font-medium">Return Date</label>
                <input 
                    type="date" 
                    name="return_date" 
                    required 
                    class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <input 
                type="hidden" 
                name="price" 
                value="<?php echo isset($_POST['duration']) ? $car['PRICE'] * $_POST['duration'] : $car['PRICE']; ?>">

            <?php if (isset($error)) { ?>
                <p class="text-red-500 text-sm"><?php echo $error; ?></p>
            <?php } ?>

            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white font-bold py-3 rounded-md hover:bg-blue-700 transition duration-300">
                Book Now
            </button>
        </form>
    </div>

    <footer class="py-8 bg-gray-800 text-white">
        <div class="container mx-auto px-4 text-center">
            &copy; 2024 CaRental. All rights reserved.
        </div>
    </footer>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Car - CaRental</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
     <style>
        /* Global Styles */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background-color: #f3f4f6; /* Gray background */
    margin: 0;
    padding: 0;
    overflow-y: scroll;
}

body::-webkit-scrollbar{
    display: none;
}

/* Header Styles */
header {
    padding: 16px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #007bff; /* Gradient background */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

header .logo {
    font-size: 24px;
    font-weight: bold;
    color: white;
}

header .menu a {
    margin-left: 16px;
    text-decoration: none;
    color: white;
    font-size: 16px;
    transition: color 0.3s;
}

header .menu a:hover {
    color: #cbd5e0; /* Light gray on hover */
}

/* Main Booking Container */
.main-container {
    max-width: 400px; /* Set a maximum width for the form */
    margin: 36px auto; /* Center the form horizontally */
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 36px;
}


.main-container h1 {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    color: #2d3748; /* Grayish black */
    margin-bottom: 32px;
}

/* Car Details */
.car-details {
    text-align: center;
    margin-bottom: 32px;
}

.car-details h2 {
    font-size: 20px;
    font-weight: 600;
    color: #4a5568; /* Dark gray */
    text-transform: uppercase;
    margin-bottom: 8px;
}

.car-details p {
    font-size: 16px;
    color: #718096; /* Medium gray */
    margin: 4px 0;
}

.car-details .price {
    font-size: 18px;
    color: #48bb78; /* Green for price */
    font-weight: bold;
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
    gap: 24px; /* Spacing between form fields */
}

form label {
    font-size: 16px;
    font-weight: 500;
    color: #2d3748; /* Grayish black */
}

form input[type="text"],
form input[type="date"],
form input[type="number"],
form input[type="tel"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #cbd5e0; /* Light gray border */
    border-radius: 4px;
    font-size: 16px;
    color: #4a5568; /* Dark gray */
    transition: border-color 0.3s, box-shadow 0.3s;
}

form input:focus {
    border-color: #4299e1; /* Blue border on focus */
    box-shadow: 0 0 4px rgba(66, 153, 225, 0.6); /* Subtle blue glow */
    outline: none;
}

form button {
    background-color: #007bff; /* Blue background */
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color:rgb(0, 132, 255); /* Darker blue on hover */
}

.error-message {
    color: #f56565; /* Red for error */
    font-size: 14px;
    margin-top: -16px;
}

/* Footer Styles */
footer {
    padding: 32px;
    background-color: #2d3748; /* Dark gray background */
    color: white;
    text-align: center;
}

footer p {
    margin: 0;
    font-size: 14px;
}

     </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo">CaRental</div>
        <nav class="menu">
            <a href="cardetails.php">Home</a>
            <a href="aboutus.html">About</a>
            <a href="contactus.html">Contact</a>
        </nav>
    </header>

    <!-- Main Booking Container -->
    <div class="main-container">
        <h1>Book Your Car</h1>

        <!-- Car Details -->
        <div class="car-details">
            <h2><?php echo $car['CAR_NAME']; ?></h2>
            <p>Fuel Type: <?php echo $car['FUEL_TYPE']; ?></p>
            <p>Capacity: <?php echo $car['CAPACITY']; ?> seats</p>
            <p class="price">Rent per day: ₹<?php echo $car['PRICE']; ?>/-</p>
        </div>

        <!-- Booking Form -->
        <form method="POST" action="booking.php">
            <input type="hidden" name="car_id" value="<?php echo $car['CAR_ID']; ?>">

            <div>
                <label for="book_place">Booking Place</label>
                <input type="text" name="book_place" required>
            </div>

            <div>
                <label for="book_date">Booking Date</label>
                <input type="date" name="book_date" required>
            </div>

            <div>
                <label for="duration">Duration (Days)</label>
                <input type="number" name="duration" required>
            </div>

            <div>
                <label for="phone_number">Phone Number</label>
                <input type="tel" name="phone_number" required>
            </div>

            <div>
                <label for="destination">Destination</label>
                <input type="text" name="destination" required>
            </div>

            <div>
                <label for="return_date">Return Date</label>
                <input type="date" name="return_date" required>
            </div>

            <input type="hidden" name="price" value="<?php echo isset($_POST['duration']) ? $car['PRICE'] * $_POST['duration'] : $car['PRICE']; ?>">

            <?php if (isset($error)) { ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php } ?>

            <button type="submit">Book Now</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 CaRental. All rights reserved.</p>
    </footer>

</body>
</html>
