<?php
session_start();
require_once("connect.php");

$user = $_SESSION["user"];
$ID = $_SESSION["user"]["phar_comp_name"];

$error = '';

$drug_trade_name = $_POST["drug_trade_name"];
$drug_image = $_POST["drug_image"];
$drug_formula = $_POST["drug_formula"];
$drug_category = $_POST["drug_category"];
$drug_expiry = $_POST["drug_expiry"];
$drug_company = $_POST["drug_company"];

if (empty($drug_trade_name) || empty($drug_expiry)) {
$error = "Please fill all non-optional fields are required";
}

if (empty($drug_formula)) {
    $drug_formula = null;
}

if (empty($error)) {

    $checkQuery = "
    SELECT * FROM tbldrugs WHERE drug_trade_name = '$drug_trade_name' AND drug_company = '$drug_company'
    ";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $error = "This drug already exists in your list.";
    } else {
        $insertQuery = "
        INSERT INTO `tbldrugs`(`drug_trade_name`,`drug_image`, `drug_formula`,`drug_category`,`drug_expiry`, `drug_company`)
        VALUES ('$drug_trade_name','$drug_image','$drug_formula','$drug_category','$drug_expiry','$drug_company')
        ";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Drug added successfully');
                  window.location.href = 'pharcomp.php';
                  </script>";
        } else {
            $error = "Error in drug addition.";
        }
    }
}

if (!empty($error)) {
    echo "<script>alert('$error')
    window.location.href = 'companyAddDrug.php';
    </script>";
}
?>