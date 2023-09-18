<?php

require_once("connect.php");

$patient_nat_id = $_POST['patient_nat_id'];
$doc_hos_id = $_POST['doc_hos_id'];
$drug_id = $_POST['drug_id'];
$pres_amount = $_POST['pres_amount'];
$pres_dosage = $_POST['pres_dosage'];

// Prepare the SQL statement
$sql = "INSERT INTO tblprescription (patient_nat_id, doc_hos_id, drug_id, pres_amount, pres_dosage) VALUES ('$patient_nat_id', '$doc_hos_id', '$drug_id', '$pres_amount', '$pres_dosage')";

if ($conn->query($sql) === TRUE) {
    $conn->close();

    echo "<script>
    alert('Prescription succesfully made. Pharmacy will deal with dispensing.')
    window.location.href = 'doctor.php';
    exit;
    </script>";
    
} else {
    echo "<script>
    alert('Prescription unsuccesful. Try Again')
    window.location.href = 'doctor.php';
    exit;
    </script>";
}

// Close the database connection
$conn->close();
?>
