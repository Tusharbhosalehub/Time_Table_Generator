<?php
// include the connection.php file to connect to the database
include 'connection.php';

// Check if TN, TF, and AL are set in the POST request
if (isset($_POST['TN']) && isset($_POST['TF']) && isset($_POST['AL'])) {
    // if set, assign them to variables
    $name = $_POST['TN'];
    $facno = $_POST['TF'];
    $alias = $_POST['AL'];
} else {
    // if not set, display an error message and terminate the script
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}

// insert the teacher's details into the 'teachers' table
$q = mysqli_query(mysqli_connect("localhost", "root", "", "lamp_innovative"), "INSERT INTO teachers VALUES ('$facno','$name','$alias')");

// create a new table for the teacher with the name of their faculty number
$sql = "CREATE TABLE " . $facno . " (
day VARCHAR(10) PRIMARY KEY,
period1 VARCHAR(30),
period2 VARCHAR(30),
period3 VARCHAR(30),
period4 VARCHAR(30),
period5 VARCHAR(30),
period6 VARCHAR(30)
)";
mysqli_query(mysqli_connect("localhost", "root", "", "lamp_innovative"), $sql);

// create a row for each day of the week in the new table
$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
for ($i = 0; $i < 5; $i++) {
    $day = $days[$i];
    $sql = "INSERT into " . $facno . " VALUES('$day','','','','','','')";
    mysqli_query(mysqli_connect("localhost", "root", "", "lamp_innovative"), $sql);
}

// if the query was unsuccessful, display an error message
if (!$q) {
    $message = "Username or ID incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
