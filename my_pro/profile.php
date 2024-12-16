<?php 
require_once('connection.php');
include('user_auth.php');

$value = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE EMAIL='$value'";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_fname = mysqli_real_escape_string($con, $_POST['fname']);
    $new_lname = mysqli_real_escape_string($con, $_POST['lname']);
    $new_phone = mysqli_real_escape_string($con, $_POST['phone']);
    
    $update_sql = "UPDATE users SET FNAME='$new_fname', LNAME='$new_lname', PHONE_NUMBER='$new_phone' WHERE EMAIL='$value'";
    if (mysqli_query($con, $update_sql)) {
        $_SESSION['fname'] = $new_fname;
        header('Location: profile.php?success=1');
        exit();
    } else {
        $error = "Failed to update user information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - CaRental</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-poppins bg-gray-100">

    <header class="py-4 flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-700 px-6 shadow-lg">
        <div class="logo text-2xl font-bold text-white">CaRental</div>
        <nav class="menu space-x-6">
            <a href="cardetails.php" class="text-white hover:text-gray-300 transition duration-300">Home</a>
            <a href="aboutus.html" class="text-white hover:text-gray-300 transition duration-300">About</a>
            <a href="contactus.html" class="text-white hover:text-gray-300 transition duration-300">Contact</a>
        </nav>
    </header>

    <section class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">User Profile</h1>

        <?php if (isset($_GET['success'])) { ?>
            <p class="text-green-600 text-center font-medium mb-4">Profile updated successfully!</p>
        <?php } ?>
        <?php if (isset($error)) { ?>
            <p class="text-red-600 text-center font-medium mb-4"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST" action="profile.php" class="max-w-lg mx-auto bg-white shadow-lg p-6 rounded-lg">
            <div class="mb-6">
                <label for="fname" class="block text-lg font-medium text-gray-700 mb-2">First Name</label>
                <input type="text" id="fname" name="fname" value="<?php echo $user['FNAME']; ?>" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                    required>
            </div>

            <div class="mb-6">
                <label for="lname" class="block text-lg font-medium text-gray-700 mb-2">Last Name</label>
                <input type="text" id="lname" name="lname" value="<?php echo $user['LNAME']; ?>" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                    required>
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-lg font-medium text-gray-700 mb-2">Phone Number</label>
                <input type="text" id="phone" name="phone" value="<?php echo $user['PHONE_NUMBER']; ?>" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                    required>
            </div>

            <div class="mb-6">
                <label for="email" class="block text-lg font-medium text-gray-700 mb-2">Email (Read-Only)</label>
                <input type="email" id="email" value="<?php echo $user['EMAIL']; ?>" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
            </div>

            <div class="mb-6">
                <label for="license" class="block text-lg font-medium text-gray-700 mb-2">License Number (Read-Only)</label>
                <input type="text" id="license" value="<?php echo $user['LIC_NUM']; ?>" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">
                    Save Changes
                </button>
                <a href="cardetails.php" class="text-blue-500 hover:underline">Back to Dashboard</a>
            </div>
        </form>
    </section>

    <footer class="py-10 bg-gray-800 text-white">
        <div class="container mx-auto px-4 text-center">
            &copy; 2024 CaRental. All rights reserved.
        </div>
    </footer>
</body>

</html>
