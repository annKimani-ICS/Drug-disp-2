<?php
session_start();
require_once("connect.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ID = trim($_POST['pharmacy_name']);
    $password = trim($_POST['pharmacy_password']);

    if (empty($error)) {

        if ($query = $conn->prepare("SELECT * FROM `tblpharmacy` WHERE `pharmacy_name` = ?")) {
            $query->bind_param('s', $ID);
            $query->execute();
            $row = $query->get_result()->fetch_assoc();

            if ($row) {
                if ($password == $row['pharmacy_password']){
                    $_SESSION["userid"] = $row['pharmacy_name'];
                    $_SESSION["user"] = $row;

                    $query->close();
                    $conn->close();
            
                    header("Location: ../pharmacy/pharmacy.php");
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