<?php 

require_once("connect.php");
include("functions.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $admin_name = $_POST["admin_name"];
    $admin_age = $_POST["admin_age"];
    $admin_phone = $_POST["admin_phone"];
    $admin_password = $_POST["admin_password"];

    if($admin_password !== $confirmPassword){
        $error = 'Password and Confirm Password do not match.';
    }
   
    if (empty($error)) {
       $admin_age = calculateExp($admin_age);
   
       $insert_sql = "INSERT INTO `tbladmin`(admin_name, admin_age, admin_phone, admin_password)
       VALUES('$admin_name','$admin_age', $admin_phone,'$admin_password')";
   
     $worked=mysqli_query($conn,$insert_sql);
   
   if ($worked) {
       header("Location: ../login/login.html");
       echo "<script>alert('Admin Registered Successfully')</script>";
       exit;
     } else {
     $error = 'Error registering the user. Please try again later.';
     }
   
     $worked->close();
    }
}
 

?>