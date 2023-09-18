<?php
session_start();
require_once("connect.php");

$user = $_SESSION["user"];
$ID = $_SESSION["user"]["pharmacy_name"];

$error = '';

$drug_id = $_POST["drug_id"];
$drug_price = $_POST["drug_price"];

if (empty($drug_id) || empty($drug_price)) {
$error = "All fields are required";
}

if (empty($error)) {

    $checkQuery = "SELECT * FROM drug_prices WHERE drug_id = '$drug_id' AND pharmacy_name = '$ID'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $error = "This drug already exists in your list.";
    } else {
        $insertQuery = "INSERT INTO drug_prices (drug_id, pharmacy_name, drug_price)
                        VALUES ('$drug_id', '$ID', '$drug_price')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Drug added successfully');
                  window.location.href = 'pharmacy.php';
                  </script>";
        } else {
            $error = "Error in drug addition.";
        }
    }
}



if (!empty($error)) {
    echo "<script>alert('$error')
    window.location.href = 'pharmacyAddDrug.php';
    </script>";
}
?>