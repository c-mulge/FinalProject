<!DOCTYPE html>
<html lang="en">

<head>
    <title>CAR RENTAL</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="navbar-content">
                    <div class="logo">
                        CaRental
                    </div>
                    <div class="menu">
                        <nav class="space-x-6">
                            <a href="index.php" class="text-gray-700 hover:text-blue-500">Home</a>
                            <a href="aboutus.html" class="text-gray-700 hover:text-blue-500">About US</a>
                            <a href="co.html" class="text-gray-700 hover:text-blue-500">Contact</a>
                            <a href="adminlogin.php" class="text-gray-700 hover:text-blue-500">Admin</a>
                            <a href="login.php" class="text-gray-700 hover:text-blue-500">Login</a>
                        </nav>
                    </div>
                </div>
            </nav>
        </header>
        <div class="content">
            <h1>Rent Your <br><span>Dream Car</span></h1>
            <p class="par">Live the life of luxury with our curated car rentals.<br>Choose from a vast collection and
                make every journey memorable with comfort and style.</p>
            <button class="cn"><a href="register.php">JOIN US</a></button>
        </div>
        <!-- <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-4xl">
            <div class="grid grid-cols-5 gap-4 items-center">

                <div>
                    <label for="pickup1" class="block text-lg font-semibold mb-2">Pick Up Location</label>
                    <div class="relative">
                        <input type="text" id="pickup1" class="w-full border border-gray-300 rounded-lg py-2 pl-8 pr-2"
                            placeholder="Mumbai, India">
                        <span class="absolute left-2 top-2.5 text-gray-500">
                            <ion-icon name="location-outline"></ion-icon>
                        </span>
                    </div>
                </div>


                <div>
                    <label for="pickup2" class="block text-lg font-semibold mb-2">Pick Up Location</label>
                    <div class="relative">
                        <input type="text" id="pickup2" class="w-full border border-gray-300 rounded-lg py-2 pl-8 pr-2"
                            placeholder="Surat, India">
                        <span class="absolute left-2 top-2.5 text-gray-500">
                            <ion-icon name="location-outline"></ion-icon>
                        </span>
                    </div>
                </div>


                <div>
                    <label for="pickupdate" class="block text-lg font-semibold mb-2">Pick Up Date</label>
                    <div class="relative">
                        <input type="date" id="pickupdate" class="w-full border border-gray-300 rounded-lg py-2 pl-8 pr-2">
                        <span class="absolute left-2 top-2.5 text-gray-500">
                            <ion-icon name="calendar-outline"></ion-icon>
                        </span>
                    </div>
                </div>


                <div>
                    <label for="returndate" class="block text-lg font-semibold mb-2">Return Date</label>
                    <div class="relative">
                        <input type="date" id="returndate" class="w-full border border-gray-300 rounded-lg py-2 pl-8 pr-2">
                        <span class="absolute left-2 top-2.5 text-gray-500">
                            <ion-icon name="calendar-outline"></ion-icon>
                        </span>
                    </div>
                </div>

                <div class="flex justify-center items-end">
                    <button class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-600">
                        Search Car
                    </button>
                </div>
            </div>
        </div>
    </div> -->

        <footer class="bg-gray-800 text-white py-8 foot">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-between">
                <div class="w-full sm:w-1/3 mb-6 sm:mb-0">
                    <h3 class="text-2xl font-semibold mb-4">CaRental</h3>
                    <p class="text-gray-400">Experience luxury and convenience at your fingertips. We offer a wide range of vehicles for every type of journey.</p>
                    <p class="mt-2 text-gray-400">&copy; 2024 CaRental. All rights reserved.</p>
                </div>
                <div class="w-full sm:w-1/3 mb-6 sm:mb-0">
                    <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                        <ul class="list-none">
                            <li><a href="index.php" class="text-gray-400 hover:text-white">Home</a></li>
                            <li><a href="aboutus.html" class="text-gray-400 hover:text-white">About Us</a></li>
                            <li><a href="contactus.html" class="text-gray-400 hover:text-white">Contact</a></li>
                            <li><a href="adminlogin.php" class="text-gray-400 hover:text-white">Admin</a></li>
                            <li><a href="login.php" class="text-gray-400 hover:text-white">Login</a></li>
                        </ul>
                </div>

                <div class="w-full sm:w-1/3">
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <ion-icon name="logo-facebook" class="text-2xl"></ion-icon>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <ion-icon name="logo-twitter" class="text-2xl"></ion-icon>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <ion-icon name="logo-instagram" class="text-2xl"></ion-icon>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <ion-icon name="logo-linkedin" class="text-2xl"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-gray-700 pt-4 text-center">
                <ul class="flex justify-center space-x-6">
                    <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Terms of Service</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Cookie Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>


    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>

