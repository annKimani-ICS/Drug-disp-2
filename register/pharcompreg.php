<?php
require_once("connect.php");

function calculateAge($dob) {
    $currentYear = date("Y");
    $birthYear = date("Y", strtotime($dob));
    return $currentYear - $birthYear;
}


if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $phar_comp_name = $_POST['phar_comp_name'];
    $phar_comp_phone = $_POST['phar_comp_phone'];
    $phar_comp_address = $_POST['phar_comp_address'];
    $phar_comp_password = $_POST['phar_comp_password'];
    $confirmpassword = $_POST["confirm_password"];

    if ($phar_comp_password !== $confirmpassword) {
      $error = 'Password and Confirm Password do not match.';
    }

    if (empty($error)) {
        $query = $conn->prepare("INSERT INTO `pharcomp`(`phar_comp_name`, `phar_comp_phone`, `phar_comp_address`,`phar_comp_password`) 
        VALUES (?, ?, ?, ?)");
        $query->bind_param('ssss', $phar_comp_name, $phar_comp_phone, $phar_comp_address, $phar_comp_password);

        if ($query->execute()) {
            header("Location: ../login/login.html");
            echo "<script>alert('Pharmaceutical Company Registered Successfully')</script>";
            $query->close();
            exit;
        } else {
            $error = 'Error registering the user. Please try again later.';
        }

    } 
}

if(!empty($error)){
  // Display the error message as an alert
  echo "<script>alert('$error');</script>";
  echo "<script>window.location.href = 'signup.html';</script>";
  exit;
}

?>