<?php
include 'connection.php';
if (isset($_POST['tobealloted'])) {
    $subject = $_POST['tobealloted'];
    $teacher = $_POST['toalloted'];
    
} else {
    $message = "Already Alloted";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query(mysqli_connect("localhost", "root", "", "lamp_innovative"), "UPDATE subjects SET isAlloted=1, allotedto='$teacher' WHERE subject_code='$subject'");

if ($q) {
    $message = "Done.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:allotsubjects.php");
} else {
    $message = "Username or Password incorrect.\\nTry again.";
    $message = $subject;
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>