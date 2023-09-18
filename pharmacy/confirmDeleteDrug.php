<?php 
session_start();
require_once("connect.php");


$username = $_SESSION["userid"];
$user = $_SESSION["user"];

if (isset($_GET["id"])) {

    $ID = $_GET["id"];

    $sql = "SELECT * FROM drug_prices WHERE drug_id = '$ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Prompt the user for confirmation before deleting the patient
        echo "<script>
        if (confirm('Are you sure you want to remove this drug from your list?')) {
            window.location.href = 'deleteDrug.php?pharID=" . $username . "&ID=" . $ID . "';
        } else {
            window.location.href = 'pharmacy.php';
        }
    </script>";
    
    } 
    else{
        echo "<script>
            alert('Drug does not exist any more or there is an issue with their deletion. Please contact related company.')
            window.location.href = 'pharmacy.php';
            exit;
            </script>";
    }
}
?>
