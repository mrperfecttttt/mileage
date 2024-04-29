<?php
require_once 'list_travel.php';
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
    <title>List of Travel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
.flex-grow {
    flex-grow: 1; /* Make the h1 element grow to fill available space */
}
    </style>
</head>

<body>
    <div class="flex justify-center items-center header-container">
    <img class="ml-4" src="img/left.png" alt="Home Icon" onclick="window.location.href='home.php'" style="z-index: 100;">
        <h1 class="text-center font-bold py-2 -ml-9 flex-grow">List of Travel</h1>
    </div>
    <hr class="solid">
    <div class="travel-container">
    <?php
        // Check if travel records exist
        if (isset($travels) && !empty($travels)) {
            $count = 1;
            foreach ($travels as $travel) {
                echo '<div class="flex justify-between items-center">';
                echo '<p class="pl-5 text-blue-600 font-bold py-4">' .$count . '. ' . $travel["location"] . '</p>';
                echo '<p class="pr-5 italic">' . $travel["mileage"] . 'KM</p>';
                echo '</div>';
                echo '<p class="pl-5 -mt-4 italic text-sm pb-4">' . $travel["date"] . '</p>';
                echo '<hr class="solid">';
                $count++;
            }
        } else {
            echo "<p>No travels found.</p>";
        }
        ?>
    </div>
</body>

</html>