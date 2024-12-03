<?php
header('Content-Type: application/json');

// Include your database connection
$con = mysqli_connect('127.0.0.1:3307', 'root', '', 'carproject');
if (!$con) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

try {
    $response = [];

    // Fetch total users
    $query = "SELECT COUNT(*) AS totalUsers FROM users";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $response['totalUsers'] = $row['totalUsers'];

    // Fetch active vehicles
    $query = "SELECT COUNT(*) AS activeVehicles FROM cars WHERE AVAILABLE = 'Y'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $response['activeVehicles'] = $row['activeVehicles'];

    // Fetch feedback count
    $query = "SELECT COUNT(*) AS feedbackCount FROM feedback";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $response['feedbackCount'] = $row['feedbackCount'];

    // Fetch pending bookings
    $query = "SELECT COUNT(*) AS pendingBookings FROM booking WHERE BOOK_STATUS = 'UNDER PROCESSING'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $response['pendingBookings'] = $row['pendingBookings'];

    // Fetch recent activities (recent bookings for example)
    $query = "
        SELECT 
            CONCAT('Booking ID ', BOOK_ID, ' - ', CAR_ID, ' booked by ', EMAIL) AS description, 
            EMAIL AS user, 
            BOOK_DATE AS date 
        FROM booking 
        ORDER BY BOOK_DATE DESC 
        LIMIT 10";
    $result = mysqli_query($con, $query);
    $recentActivities = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $recentActivities[] = $row;
    }
    $response['recentActivities'] = $recentActivities;

    // Output the response in JSON format
    echo json_encode($response);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
