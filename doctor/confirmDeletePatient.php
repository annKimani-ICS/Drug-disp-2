<?php 
session_start();

if (isset($_GET["id"])) {

    $patientID = $_GET["id"];

    require_once("connect.php");
    $sql = "SELECT * FROM tblpatient WHERE patient_nat_id = '$patientID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Prompt the user for confirmation before deleting the patient
        echo "<script>
            if (confirm('Are you sure you want to remove this patient from your list?')) {
                let doctorID = " . $_SESSION["user"]["doc_hos_id"] . ";
                window.location.href = 'deletePatient.php?id=' + doctorID + '&patientID=' + " . $patientID . ";
            } else {
                window.location.href = 'doctor.php';
            }
        </script>";
    } 
    else{
        echo "<script>
            alert('Patient does not exist any more or there is an issue with their deletion. Please contact administrator.')
            window.location.href = 'doctor.php';
            exit;
            </script>";
    }
}
?>
