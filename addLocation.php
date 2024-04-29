<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is not logged in (assuming you set a session variable upon login)
if (!isset($_SESSION['user_id'])) {
    // Redirect to index.html
    header("Location: index.html");
    exit; // Make sure no code is executed after redirection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Location</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
.flex-grow {
    flex-grow: 1; /* Make the h1 element grow to fill available space */
}

.form-container {
            width: 80%;
            max-width: 400px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: auto; /* Center horizontally */
            margin-top: 45%; /* Add top margin */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 767px) {
            .form-container {
                width: 90%; /* Adjust width for smaller screens */
            }
        }
    </style>
</head>

<body>
    <div class="flex justify-center items-center header-container">
    <img class="ml-4" src="img/left.png" alt="Home Icon" onclick="window.location.href='home.php'" style="z-index: 100;">
        <h1 class="text-center font-bold py-2 -ml-9 flex-grow">Add New Location</h1>
    </div>
    <hr class="solid">
    
    <div class="form-container">
        <form id="location-mileage-form" action="add_location.php" method="post">
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="Enter your location" required>
            </div>
            <div class="form-group">
                <label for="mileage">Mileage:</label>
                <input type="decimal" id="mileage" name="mileage" placeholder="Enter mileage" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>