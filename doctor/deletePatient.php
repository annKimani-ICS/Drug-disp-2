<?php
if (isset($_GET["id"]) && isset($_GET["patientID"])) {
    $doctorID = $_GET["id"];
    $patientID = $_GET["patientID"];

    require_once("connect.php");
    $sql = "SELECT * FROM doctor_patient WHERE doc_hos_id = '$doctorID' AND patient_nat_id = '$patientID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $deleteQuery = "DELETE FROM doctor_patient WHERE doc_hos_id = '$doctorID' AND patient_nat_id = '$patientID'";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "<script>alert('Successful deletion of patient')
            window.location.href = 'doctor.php';
            </script>";
        } else {
            echo "<script>alert('Error in deletion of patient. Try Again')
            window.location.href = 'doctor.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Error occured during deletion. Please contact administrator.')
            window.location.href = 'doctor.php';
            exit;
            </script>";
    }
} else {
    header("Location: doctor.php");
    exit;
}
?>
