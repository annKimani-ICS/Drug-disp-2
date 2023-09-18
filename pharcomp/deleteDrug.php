<?php
if (isset($_GET["ID"]) && isset($_GET["pharID"])) {
    $pharID = $_GET["pharID"];
    $ID = $_GET["ID"];

    require_once("connect.php");
    $sql = "SELECT * FROM tbldrugs WHERE drug_company = '$pharID' AND drug_id = '$ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $updateQuery = "UPDATE tbldrugs SET onSale = 'N' WHERE drug_company = '$pharID' AND drug_id = '$ID'";

        if ($conn->query($updateQuery) === TRUE) {
            echo "<script>alert('Drug marked as not available for sale')
            window.location.href = 'pharcomp.php';
            </script>";
        } else {
            echo "<script>alert('Error in marking the drug as not available. Try Again')
            window.location.href = 'pharcomp.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Error occurred during the update. Please contact the related company.')
            window.location.href = 'pharcomp.php';
            </script>";
    }
} else {
    header("Location: pharcomp.php");
    exit;
}
?>
