<?php
session_start();

if (isset($_GET["id"])) {
    $doctorID = $_SESSION["user"]["doc_hos_id"];
    $patientID = $_GET["id"];

    require_once("connect.php");

    $result = $conn->query("
    SELECT * FROM doctor_patient WHERE doc_hos_id = '$doctorID' AND patient_nat_id = '$patientID'
    ");

    if ($result->num_rows === 0) {
        $insertQuery = "INSERT INTO doctor_patient (doc_hos_id, patient_nat_id) VALUES ('$doctorID', '$patientID')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Successful addition of new patient')
            window.location.href = 'doctor.php';
            </script>";

        } else {
            echo "<script>alert('Error in addition of new patient. Try Again')
            window.location.href = 'doctor.php';
            </script>";
        }
    } else {
        echo "<script>alert('Patient is already enrolled with you. Try Again')
        window.location.href = 'doctor.php';
        </script>";
    }
} else {
    echo "<script>alert('No Patient selected')</script>";
    header("Location: doctor.php");
    exit;
}
?>
