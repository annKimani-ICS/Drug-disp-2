<?php
require_once("connect.php");

include("funcions.php");


if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $patient_nat_id =  $_POST["patient_nat_id"];
    $patient_name = $_POST["patient_name"];
    $patient_address = $_POST["patient_address"];
    $patient_age =  $_POST["patient_age"];
    $patient_phone =  $_POST["patient_phone"];
    $patient_email =  $_POST["patient_email"];
    $patient_password = $_POST["patient_password"];
    $confirmpassword = $_POST["confirm_password"];

    if ($patient_password !== $confirmpassword) {
      $error = 'Password and Confirm Password do not match.';
    }

    if (empty($error)) {
        $patient_age = calculateAge($patient_age);

        $query = $conn->prepare("INSERT INTO `tblpatient`(`patient_nat_id`, `patient_name`, `patient_address`, `patient_age`, `patient_phone`, `patient_email`,`patient_password`) 
        VALUES (?, ?, ?, ?, ?, ?,?)");
        $query->bind_param('issssis', $patient_nat_id, $patient_name, $patient_address, $patient_age, $patient_phone, $patient_email, $patient_password);
        if ($query->execute()) {
        header("Location: ../login/login.html");
        echo "<script>alert('Patient Successfully Registered')</script>";
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