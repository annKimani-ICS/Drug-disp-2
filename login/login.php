<?php

require_once("connect.php");

if (isset($_POST["login"])) {

    $P_username = mysqli_real_escape_string($conn, $_POST["username"]);
    $P_user_type_select = mysqli_real_escape_string($conn, $_POST["user_type_select"]);
    $P_password = mysqli_real_escape_string($conn, $_POST["password"]);

    if ($P_user_type_select == "patient") {
        $sqlquery = "SELECT * FROM tblpatient WHERE patient_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if ($query_result->num_rows > 0) {
           
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["patient_password"];
            $stored_username = $_SESSION["control"]["patient_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                 // STORE THE SESSION VARIABLE FOR USERNAME, USER TYPE AND SSN HERE
                 $_SESSION['username'] = $stored_username;
                 $_SESSION['user'] = $P_user_type_select;
                 $_SESSION['patient_nat_id'] = $_SESSION['control']['patient_nat_id'];
                 
                header('Location: ../patient/patient.php');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }


    } else if ($P_user_type_select == "doctor") {
        $sqlquery = "SELECT * FROM tbldoctor WHERE doc_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if ($query_result->num_rows > 0) {
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["doc_password"];
            $stored_username = $_SESSION["control"]["doc_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                $_SESSION['username'] = $stored_username;
                $_SESSION['user'] = $P_user_type_select;
                $_SESSION['doc_hos_id'] = $_SESSION['control']['doc_hos_id'];
                
                header('Location: ../doctor/doctor.php');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }


    } else if ($P_user_type_select == "pharmacist") {
        $sqlquery = "SELECT * FROM tblpharmacy WHERE pharmacy_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if ($query_result->num_rows > 0) {
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["pharmacy_password"];
            $stored_username = $_SESSION["control"]["pharmacy_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                header('Location: ../AddingPharmacy/index.html');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }
    }else if($P_user_type_select == "pharcomp"){
        $sqlquery = "SELECT * FROM pharcomp WHERE phar_comp_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if($query_result->num_rows > 0){
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["phar_comp_password"];
            $stored_username = $_SESSION["control"]["phar_comp_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                header('Location: ../pharcomp/pharcomp.php');
                exit;
            } else {
                header('Location: ../register/signup.html');
                exit;
            }
        }
    }else if ($P_user_type_select == "admin") {
        $sqlquery = "SELECT * FROM tbladmin WHERE admin_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if ($query_result->num_rows > 0) {
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["admin_password"];
            $stored_username = $_SESSION["control"]["admin_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                header('Location: ../admin/admin.html');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }
    } else {
        header('Location: index.html');
        exit;
    }



}

?>