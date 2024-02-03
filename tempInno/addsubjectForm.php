<?php
// Including the connection.php file to connect to the database
include 'connection.php';

// Checking if the form fields for subject name, code, semester, and department are set or not
if (isset($_POST['SN']) && isset($_POST['SC']) && isset($_POST['SS']) && isset($_POST['SD'])) {

    // Assigning form field values to variables
    $name = $_POST['SN'];
    $code = $_POST['SC'];
    $sem = $_POST['SS'];
    $course = $_POST['ST'];
    $dept = $_POST['SD'];
} else {
    // If the form fields are not set, display a message and redirect to the addsubjects.php page
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsubjects.php");
}

// Inserting the subject details into the 'subjects' table
$q = mysqli_query(mysqli_connect("localhost", "root", "", "lamp_innovative"), "INSERT INTO subjects VALUES ('$code','$name','$course','$sem','$dept',0,'')");

// Checking if the query was successful or not
if (!$q) {
    // If the query was not successful, display an error message and redirect to the addsubjects.php page
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsubjects.php");
}
