<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database configuration file
include_once "dbconnect.php";

if (!isset($_SESSION['user_id'])) {
    echo "<p>Please log in to view your travels.</p>";
} else {
    $userID = $_SESSION['user_id'];

    // Retrieve travels for the logged-in user
    $sql = "SELECT travel.*, location.* 
        FROM travel 
        JOIN location ON travel.location_id = location.id 
        WHERE travel.creds_id = ?
        ORDER BY travel.date ASC";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch all travel records
            $travels = [];
            while ($row = $result->fetch_assoc()) {
                $travels[] = $row;
            }
        }
        // } else {
        //     echo "<p>No travels found.</p>";
        // }


        // Close statement
        $stmt->close();
    } else {
        echo "<p>Error: Unable to fetch travels.</p>";
    }
}
// Close connection
$conn->close();
