<?php
require_once("connect.php");

if (isset($_GET["ID"])){
    $ID = $_GET["ID"];

    $result = $conn->query(
        "UPDATE tblprescription SET prescribed = 'Y' WHERE pres_id = '$ID'"
    );

    if ($result === TRUE) {
        echo "<script>
            alert('Drug Dispensed.')
            window.location.href = 'pharmacy.php';
            exit;
            </script>";
    } else {
        echo "<script>
        alert('Error in dispensing. Try again in a few minutes.')
        window.location.href = 'pharmacy.php';
        exit;
        </script>";
    }
}
?>
