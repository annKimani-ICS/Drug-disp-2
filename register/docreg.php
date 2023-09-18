<?php
require_once("connect.php");
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $doc_hos_id = $_POST["doc_hos_id"];
    $doc_name =  $_POST["doc_name"];
    $doc_spec =  $_POST["doc_spec"];
    $doc_years = $_POST["doc_years"];
    $doc_phone = $_POST["doc_phone"];
    $doc_password = $_POST["doc_password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($doc_password !== $confirmPassword) {
      $error = 'Password and Confirm Password do not match.';
    }

    if (empty($error)) {
      $doc_years = calculateExp($doc_years);

      $insert_sql = "INSERT INTO `tbldoctor`(doc_hos_id, doc_name, doc_spec, doc_years, doc_phone, doc_password) 
      VALUES ($doc_hos_id,'$doc_name','$doc_spec',$doc_years, $doc_phone,'$doc_password')";
    
    $worked=mysqli_query($conn,$insert_sql);

    if ($worked) {
      header("Location: ../login/login.html");
      echo "<script>alert('Doctor Registered Successfully')</script>";
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