<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database configuration file
    include_once "dbconnect.php";

    // Retrieve form data
    $locationName = $_POST["location"];
    $totalMileage = $_POST["mileage"];

    // Validate form data (you can add more validation if needed)
    if (empty($locationName) || empty($totalMileage)) {
        // Handle empty fields
        echo "Please fill in all fields.";
    } else {
        // Prepare an insert statement
        $totalClaimable = 0.6*$totalMileage;
        $sql = "INSERT INTO location (location, mileage, total_claimable) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters to the statement
            $stmt->bind_param("sdd", $locationName, $totalMileage, $totalClaimable);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Location added successfully
                echo "<script>alert('Location added successfully.');</script>";
                echo "<script>window.location.href = 'home.php';</script>";
            } else {
                // Display an error message
                echo "<script>alert('Error: Unable to add location.');</script>";
                echo "<script>window.location.href = 'home.php';</script>";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
    }
}
?>