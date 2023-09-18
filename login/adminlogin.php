<?php
session_start();
require_once("connect.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adminID = trim($_POST['admin_id']);
    $password = trim($_POST['admin_password']);

    if (empty($error)) {

        if ($query = $conn->prepare("SELECT * FROM `tbladmin` WHERE `admin_id` = ?")) {
            $query->bind_param('i', $adminID);
            $query->execute();
            $row = $query->get_result()->fetch_assoc();

            if ($row) {
                if ($password == $row['admin_password']){
                    $_SESSION["userid"] = $row['admin_name'];
                    $_SESSION["user"] = $row;

                    $query->close();
                    $conn->close();
            
                    header("Location: ../admin/admin.php");
                    exit;
                } else {
                    $error .= 'The password is not valid.';
                }
            } else {
                $error .= 'No user exists with that Admin_ID or Account has been deactivated. Please try again or contact us.';
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