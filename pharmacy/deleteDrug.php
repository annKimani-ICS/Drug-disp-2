<?php
if (isset($_GET["ID"]) && isset($_GET["pharID"])) {
    $pharID = $_GET["pharID"];
    $ID = $_GET["ID"];

    require_once("connect.php");
    $sql = "SELECT * FROM drug_prices WHERE pharmacy_name = '$pharID' AND drug_id = '$ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $deleteQuery = "DELETE FROM drug_prices WHERE pharmacy_name = '$pharID' AND drug_id = '$ID'";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "<script>alert('Successful deletion of drug')
            window.location.href = 'pharmacy.php';
            </script>";
        } else {
            echo "<script>alert('Error in deletion of drug. Try Again')
            window.location.href = 'pharmacy.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Error occured during deletion. Please contact related company.')
            window.location.href = 'pharmacy.php';
            exit;
            </script>";
    }
} else {
    header("Location: pharmacy.php");
    exit;
}
?>
