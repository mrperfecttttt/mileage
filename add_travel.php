<?php
// Start or resume session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database configuration file
    include_once "dbconnect.php";

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Handle error if user is not logged in
        echo "<script>alert('Please log in to add a new travel.');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit; // Stop script execution
    }

    // Retrieve form data
    $location = $_POST["location"];
    $date = $_POST["date"];
    $userID = $_SESSION['user_id'];

    // Validate form data (you can add more validation if needed)
    if (empty($location) || empty($date)) {
        // Handle empty fields
        echo "<script>alert('Please fill in all fields.');</script>";
        echo "<script>window.location.href = 'home.php';</script>";
        exit; // Stop script execution
    } else {
        // Prepare an insert statement
        $sql = "INSERT INTO travel (location_id, date, creds_id) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters to the statement
            $stmt->bind_param("isi", $location, $date, $userID);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Location added successfully
                echo "<script>alert('New Travel added successfully.');</script>";
                echo "<script>window.location.href = 'home.php';</script>";
            } else {
                // Display an error message
                echo "<script>alert('Error: Unable to add new travel.');</script>";
                echo "<script>window.location.href = 'home.php';</script>";
            }

            // Close statement
            $stmt->close();
        } else {
            // Display an error message if the prepared statement fails
            echo "<script>alert('Error: Unable to prepare the statement.');</script>";
            echo "<script>window.location.href = 'home.php';</script>";
        }
    }

    // Close connection
    $conn->close();
}
?>
