<?php
session_start();
unset($_SESSION['customer_email_id']);
unset($_SESSION['babysiter_email_id']);


session_destroy();

echo '<script>alert("You have successfully logged out.")</script>';
echo '<script>window.location.href = "../pages/login.html";</script>';
?>
