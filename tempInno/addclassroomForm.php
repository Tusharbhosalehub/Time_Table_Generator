<?php

// Include the file that contains the database connection information
include 'connection.php';

// Check if the CN (Classroom Name) variable was passed via a POST request
if (isset($_POST['CN'])) {
    // If it was, assign its value to the $name variable
    $name = $_POST['CN'];
} else {
    // If it wasn't, set a message variable and display an alert to the user
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // Exit the script
    die();
}

// Create a new query to insert the classroom name and an initial count of 0 into the database
$q = mysqli_query(mysqli_connect("localhost", "root", "", "lamp_innovative"), "INSERT INTO classrooms VALUES ('$name',0)");

// If the query was successful, set a success message and redirect to the addclassrooms.php page
if ($q) {
    $message = "Classroom added.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addclassrooms.php");
} else {
    // If the query was unsuccessful, set an error message and display an alert to the user
    $message = "This Classroom exists.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
