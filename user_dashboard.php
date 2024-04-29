<?php
require_once 'list_travel.php'; // Include the file to get the list of travels

// Initialize total mileage, total claim, and total balance
$totalMileage = 0;
$totalClaim = 0;
$totalBalance = 0;

// Check if $travels is set and not empty
if (isset($travels) && is_array($travels) && count($travels) > 0) {
    // Calculate total mileage
    foreach ($travels as $travel) {
        $totalMileage += $travel['mileage'];
    }

    // Calculate total claim
    $totalClaim = $totalMileage * 0.6;

    // Calculate total balance to be paid
    $totalBalance = $totalClaim - 500;
}
?>

