<?php
session_start();
require_once("connect.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ID = trim($_POST['phar_comp_name']);
    $password = trim($_POST['phar_comp_password']);

    if (empty($error)) {

        if ($query = $conn->prepare("SELECT * FROM `pharcomp` WHERE `phar_comp_name` = ?")) {
            $query->bind_param('s', $ID);
            $query->execute();
            $row = $query->get_result()->fetch_assoc();

            if ($row) {
                if ($password == $row['phar_comp_password']){
                    $_SESSION["userid"] = $row['phar_comp_name'];
                    $_SESSION["user"] = $row;

                    $query->close();
                    $conn->close();
            
                    header("Location: ../pharcomp/pharcomp.php");
                    exit;
                } else {
                    $error .= 'The password is not valid.';
                }
            } else {
                $error .= 'No user exists with that name or Account has been deactivated. Please try again or contact us.';
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