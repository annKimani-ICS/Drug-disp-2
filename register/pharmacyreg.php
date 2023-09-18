<?php
require_once("connect.php");


if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $pharmacy_name = $_POST["pharmacy_name"];
    $pharmacy_phone =  $_POST["pharmacy_phone"];
    $pharmacy_address =  $_POST["pharmacy_address"];
    $pharmacy_password = $_POST["pharmacy_password"];
    $confirmpassword = $_POST["confirm_password"];

    if ($pharmacy_password !== $confirmpassword) {
      $error = 'Password and Confirm Password do not match.';
    }

    if (empty($error)) {

        $query = $conn->prepare("INSERT INTO `tblpharmacy`(pharmacy_name, pharmacy_phone, pharmacy_address, pharmacy_password)
        VALUES  (?, ?, ?, ?)");

        $query->bind_param('ssss', $pharmacy_name, $pharmacy_phone, $pharmacy_address, $pharmacy_password);
        
        if ($query->execute()) {
        header("Location: ../login/login.html");
        echo "<script>alert('Pharmacy Registered Successfully')</script>";
        exit;
        } else {
        $error = 'Error registering the user. Please try again later.';
        }

        $worked->close();
    } 
}

if(!empty($error)){
  // Display the error message as an alert
  echo "<script>alert('$error');</script>";
  echo "<script>window.location.href = 'signup.html';</script>";
  exit;
}

?>