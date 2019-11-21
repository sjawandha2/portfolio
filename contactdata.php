<?php
//Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
$nameErr = $emailErr = $met = $metErr = $name = $email = $messageErr = $subject = $message = "";
$isValid = true;

//Validate name
if (empty($_POST['name'])) {
    $nameErr = "Please provide a name";
    $isValid = false;
} else {
    $name = $_POST['name'];
}
//Validate email
$email = $_POST['email'];
if (empty($email)) {
    $emailErr = "Email is required";
    $isValid = false;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Email is required";
    $isValid = false;
} else {
    $email = $_POST['email'];
}
//Validate met
$validMet = array("meetup", "jobfair", "guest", "other");
if (!isset($_POST['met']) ||
    !in_array($_POST['met'], $validMet) ||
    $_POST['met'] == '') {
    $metErr = "Please Select One";
    $isValid = false;
} else {
    $met = $_POST['met'];
}

if ($met == 'other') {
    if (empty($_POST['message'])) {
        $messageErr = "Please write 'How we met?' in Comment Box";
        $isValid = false;
    } else {
        $message = $_POST['message'];
    }
}

$subject = $_POST['subject'];

if ($isValid) {
    //DB file
    require "/home/sjawandha/db.php";

    //escape data
    $name = mysqli_real_escape_string($cnxn, $name);
    $email = mysqli_real_escape_string($cnxn, $email);
    $subject = mysqli_real_escape_string($cnxn, $subject);
    $met = mysqli_real_escape_string($cnxn, $met);
    $message = mysqli_real_escape_string($cnxn, $message);

////define query
    $sql = "INSERT INTO contact (Name,Email,Company,Met,Comment)VALUES('$name','$email','$subject','$met','$message')";
//
////execute query
    $result = @mysqli_query($cnxn, $sql);
    if (!$result) {
        echo "<p>Database Error: " . mysqli_error($cnxn) . "</p>";
    }
    //make variables empty  and store when data is valid
    $nameErr = $emailErr = $name = $metErr = $met = $email = $subject = $message = "";
}