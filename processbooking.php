<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
</head>
<body>

<h1>Rohirrim Tour Booking Confirmation</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    $age = isset($_POST["age"]) ? $_POST["age"] : "";
    $species = isset($_POST["species"]) ? $_POST["species"] : "";

    $accom = isset($_POST["accom"]) ? "Accommodation" : "";
    $fourday = isset($_POST["4day"]) ? "4 Day Tour" : "";
    $tenday = isset($_POST["10day"]) ? "10 Day Tour" : "";

    $food = isset($_POST["food"]) ? $_POST["food"] : "";
    $date = isset($_POST["bookday"]) ? $_POST["bookday"] : "";
    $partysize = isset($_POST["partysize"]) ? $_POST["partysize"] : "";

    if ($species == "M") {
        $species = "Human";
    } elseif ($species == "D") {
        $species = "Dwarf";
    } elseif ($species == "E") {
        $species = "Elf";
    } elseif ($species == "H") {
        $species = "Hobbit";
    }

    $bookings = array();

    if ($accom != "") {
        $bookings[] = $accom;
    }
    if ($fourday != "") {
        $bookings[] = $fourday;
    }
    if ($tenday != "") {
        $bookings[] = $tenday;
    }

    $bookingText = count($bookings) > 0
        ? implode(", ", $bookings)
        : "No booking selected";

    echo "<p>Welcome " . htmlspecialchars($firstname . " " . $lastname) . "!</p>";
    echo "<p>You are now booked for: " . htmlspecialchars($bookingText) . "</p>";
    echo "<p>Species: " . htmlspecialchars($species) . "</p>";
    echo "<p>Age: " . htmlspecialchars($age) . "</p>";
    echo "<p>Meal Preference: " . htmlspecialchars($food) . "</p>";
    echo "<p>Date: " . htmlspecialchars($date) . "</p>";
    echo "<p>Number of travellers: " . htmlspecialchars($partysize) . "</p>";

} else {
    echo "<p>Please submit the booking form first.</p>";
}
?>

</body>
</html>