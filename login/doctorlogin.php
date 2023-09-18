<?php
session_start();
require_once("connect.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ID = trim($_POST['doc_hos_id']);
    $password = trim($_POST['doc_password']);

    if (empty($error)) {

        if ($query = $conn->prepare("SELECT * FROM `tbldoctor` WHERE `doc_hos_id` = ?")) {
            $query->bind_param('i', $ID);
            $query->execute();
            $row = $query->get_result()->fetch_assoc();

            if ($row) {
                if ($password == $row['doc_password']){
                    $_SESSION["userid"] = $row['doc_name'];
                    $_SESSION["user"] = $row;

                    $query->close();
                    $conn->close();
            
                    header("Location: ../doctor/doctor.php");
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