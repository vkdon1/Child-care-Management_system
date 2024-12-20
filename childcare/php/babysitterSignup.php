<?php

$first_name = "";
$last_name = "";
$email_id = "";
$password = "";
$phone_number = "";
$gender = "";
$salary = "";
$postal_code = "";
$area_name = "";
$bank_name = "";
$account_number = "";

if (isset($_POST['fname'])) {
    $first_name = $_POST['fname'];
}
if (isset($_POST['lname'])) {
    $last_name = $_POST['lname'];
}
if (isset($_POST['post'])) {
    $postal_code = $_POST['post'];
}
if (isset($_POST['area'])) {
    $area_name = $_POST['area'];
}
if (isset($_POST['bank'])) {
    $bank_name = $_POST['bank'];
}
if (isset($_POST['account'])) {
    $account_number = $_POST['account'];
}
if (isset($_POST['salary'])) {
    $salary = $_POST['salary'];
}
if (isset($_POST['phnNumber'])) {
    $phone_number = $_POST['phnNumber'];
}
if (isset($_POST['userid'])) {
    $email_id = $_POST['userid'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
}

// Database connection and babysitter sign up
try {
    $conn = new PDO("mysql:host=localhost;dbname=project;", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if email already exists
    $checkQuery = "SELECT * FROM babysiter WHERE email_id = :email";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(':email', $email_id);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        // Email already exists, show alert
        echo "<script>window.alert('This email is already registered. Please try another email.');</script>";
        echo "<script>location.assign('../pages/babysiterSignup.html');</script>";
    } else {
        // Email doesn't exist, proceed with registration
        $sqlquery = "INSERT INTO babysiter (first_name, last_name, email_id, password, phone_number, gender, salary, postal_code, area_name, bank_name, account_number) VALUES ('$first_name', '$last_name', '$email_id', '$password', '$phone_number', '$gender', '$salary', '$postal_code', '$area_name', '$bank_name', '$account_number')";

        $conn->exec($sqlquery);
        echo "<script>window.alert('Registration Successful! Please Login');</script>";
        echo "<script>location.assign('../pages/index.html');</script>";
    }
} catch (PDOException $err) {
    echo "<script>window.alert('DB connection error');</script>";
    echo "<script>location.assign('../pages/babysiterSignup.html');</script>";
}
?>
