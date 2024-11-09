<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator - Add New Car</title>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);

        window.onunload = function () { null };
    </script>
    <link rel="stylesheet" href="css/addcar.css">
</head>

<body>

    <div class="main">
        <div class="register">
            <h2 id="fam">Add New Car</h2>
            <form id="register" action="upload.php" method="POST" enctype="multipart/form-data">
                <label for="carname">Car Name:</label>
                <input type="text" name="carname" id="name" placeholder="Enter Car Name" required>

                <label for="ftype">Fuel Type:</label>
                <input type="text" name="ftype" id="name" placeholder="Enter Fuel Type" required>

                <label for="capacity">Capacity:</label>
                <input type="number" name="capacity" min="1" id="name" placeholder="Enter Capacity Of Car" required>

                <label for="price">Price:</label>
                <input type="number" name="price" min="1" id="name" placeholder="Enter Price Per Day (in Rupees)"
                    required>

                <label for="image">Car Image:</label>
                <input type="file" name="image" required>

                <input type="submit" class="btnn" value="ADD CAR" name="addcar">
            </form>
        </div>
    </div>

</body>

</html>