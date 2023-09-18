<?php
session_start();
require_once("connect.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ID = trim($_POST['patient_nat_id']);
    $password = trim($_POST['patient_password']);

    if (empty($error)) {

        if ($query = $conn->prepare("SELECT * FROM `tblpatient` WHERE `patient_nat_id` = ?")) {
            $query->bind_param('i', $ID);
            $query->execute();
            $row = $query->get_result()->fetch_assoc();

            if ($row) {
                if ($password == $row['patient_password']){
                    $_SESSION["userid"] = $row['patient_name'];
                    $_SESSION["user"] = $row;

                    $query->close();
                    $conn->close();
            
                    header("Location: ../patient/patient.php");
                    exit;
                } else {
                    $error .= 'The password is not valid.';
                }
            } else {
                $error .= 'No user exists with that ID or Account has been deactivated. Please try again or contact us.';
            }
        }
    }
}

// Check if there is an error, and if so, display an alert
if (!empty($error)) {
    echo "<script>alert('$error');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
}

?>