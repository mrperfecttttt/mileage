<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'user_dashboard.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"">
    <title>Travel Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: #6AB187;
            z-index: -1;
            /* background-image: url('img/home.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            filter: blur(8px);
            -webkit-filter: blur(8px);
            z-index: -1; */
        }

        .dashboard {
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: white;
            font-size: 28px;
            margin: 0;
        }

        .status-container {
            text-align: center;
        }

        .button-container {
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 15px;
            background-color: #8DECB4;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 30px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #41B06E;
        }
    </style>
    <link rel=" stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class=" background">
    </div>
    <div class="flex justify-center items-center">
    <img class="ml-4" src="img/logout.png" alt="Log out Icon" onclick="window.location.href='logout.php'" style="z-index: 100;">
        <h1 class="text-center font-bold py-2 -ml-9 flex-grow">Travel Dashboard</h1>
    </div>
    <hr class="solid">
    <div class="dashboard">
        <div class="status-container">
            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-1">
                <div class="flex space-x-6 items-center">
                    <img src="img/nezuko.png" class="w-auto h-12" />
                    <div>
                        <p class="font-semibold text-base">Total Mileage</p>
                    </div>
                </div>

                <div class="flex space-x-2 items-center">
                    <div class="bg-yellow-200 rounded-md p-2 flex items-center">
                        <p class="text-yellow-600 font-semibold text-xs"><?php echo $totalMileage ?>KM</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                <div class="flex space-x-6 items-center">
                    <img src="img/tanjiro.png" class="w-auto h-12" />
                    <div>
                        <p class="font-semibold text-base">Total Claim</p>
                    </div>
                </div>

                <div class="flex space-x-2 items-center">
                    <div class="bg-yellow-200 rounded-md p-2 flex items-center">
                        <p class="text-yellow-600 font-semibold text-xs">RM<?php echo $totalClaim ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                <div class="flex space-x-6 items-center">
                    <img src="img/dash.png" class="w-auto h-12" />
                    <div>
                        <p class="font-semibold text-base">Total Balance to be Paid</p>
                    </div>
                </div>

                <div class="flex space-x-2 items-center">
                    <div class="bg-yellow-200 rounded-md p-2 flex items-center">
                        <p class="text-yellow-600 font-semibold text-xs">RM<?php echo $totalBalance ?></p>
                    </div>
                </div>
            </div>
        </div>
        <br><br>

        <hr class="solid">
        <div class="flex justify-center items-center">
            <h1 class="text-center font-bold py-2 flex-grow">Menu</h1>
        </div>
        <hr class="solid"><br>

        <div class="button-container">
            <a href="addLocation.php" class="button" style="display: flex; align-items: center; justify-content: space-between;">
                <span class="ml-4 font-semibold">Add New Location</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
            </a>

            <a href="addTravel.php" class="button" style="display: flex; align-items: center; justify-content: space-between;">
                <span class="ml-4 font-semibold">Add New Travel</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
            </a>

            <a href="listTravel.php" class="button" style="display: flex; align-items: center; justify-content: space-between;">
                <span class="ml-4 font-semibold">List of All Travel</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
            </a>
        </div>
        <br><br>

        <hr class="solid">
        <div class="flex justify-center items-center">
            <h1 class="text-center font-bold py-2 flex-grow">Support Coffee!</h1>
        </div>
        <hr class="solid"><br>
        <p>Thank you for being stakeholders for this project. Perhaps you enjoy this website and please give review to the developer.</p>
    </div>
</body>

</html>