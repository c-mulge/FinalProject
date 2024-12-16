 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
    <style>
        body{
            overflow-y: scroll;
        }
        body::-webkit-scrollbar{
    display: none;
}
    </style>
    
</head>

<body>
    <div class="container">
        <header class="py-4 flex items-center justify-between">
            <div class="logo">CaRental</div>
            <nav class="menu space-x-6">
                <a href="index.php" class="hover:underline">Home</a>
                <a href="aboutus.html" class="hover:underline">About Us</a>
                <a href="co.html" class="hover:underline">Contact</a>
                <a href="adminlogin.php" class="hover:underline">Admin</a>
                <a href="login.php" class="hover:underline">Login</a>
            </nav>
        </header>

        <div class="content text-center mt-10">
            
            <h1 class="text-5xl font-bold">FAST AND EASY WAY<br><span>TO RENT A CAR</span></h1>
            <p class="par mt-4">
            Our Car Rental online booking system is designed to meet the specific needs of car rental business owners. 
            This easy-to-use car rental software will let you manage.
            </p>
            <button class="cn mt-6"><a href="register.php" class="text-white">Join Us</a></button>
        </div>
        <footer class="py-10 bg-gray-800 text-white mt-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl mb-4 font-bold">CaRental</h3>
                <p>
                    Experience luxury and convenience at your fingertips. We offer a wide range of vehicles for every type of journey.
                </p>
                <p class="mt-4 text-sm text-gray-400">&copy; 2024 CaRental. All rights reserved.</p>
            </div>
            <div>
                <h3 class="text-2xl mb-4 font-bold">Quick Links</h3>
                <ul class="list-none space-y-2">
                    <li><a href="index.php" class="hover:text-gray-300 transition">Home</a></li>
                    <li><a href="aboutus.html" class="hover:text-gray-300 transition">About Us</a></li>
                    <li><a href="contactus.html" class="hover:text-gray-300 transition">Contact</a></li>
                    <li><a href="adminlogin.php" class="hover:text-gray-300 transition">Admin</a></li>
                    <li><a href="login.php" class="hover:text-gray-300 transition">Login</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-2xl mb-4 font-bold">Follow Us</h3>
                <div class="flex space-x-4 social-icons">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <ion-icon name="logo-facebook" size="large"></ion-icon>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <ion-icon name="logo-twitter" size="large"></ion-icon>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <ion-icon name="logo-instagram" size="large"></ion-icon>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <ion-icon name="logo-linkedin" size="large"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-4 text-center">
            <ul class="flex justify-center space-x-6 text-sm">
                <li><a href="privacy.html" class="hover:text-gray-300 transition">Privacy Policy</a></li>
                <li><a href="#" class="hover:text-gray-300 transition">Terms of Service</a></li>
                <li><a href="#" class="hover:text-gray-300 transition">Cookie Policy</a></li>
            </ul>
        </div>
    </div>
</footer>


    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>
