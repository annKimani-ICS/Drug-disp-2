<?php
session_start();

include('../loginpage/login.php');

$username = $_SESSION["username"];
$user = $_SESSION["user_type_select"];
$ID = $_SESSION["patient_nat_id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./patient.css">
    <title>Patient Dashboard</title>
</head>
<body>

<nav>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#Prescriptions">Prescriptions</a></li>
    <li><a href="#"><i class='bx bxs-user-account'></i><br><?php echo $username?> </a></li>
    <li><a href="../logout.php"><i class='bx bxs-exit'></i><br>Logout</a></li>
  </ul>
</nav>

    <div class="container">
    <h1 style="font-family: 'Kaushan Script', cursive;">Welcome <?php echo $username?> </h1>

      <br><br><br><br>
      
      <div class="table-1">
          <h2 id="Prescriptions">Pending Prescriptions</h2>
          <p>Please pick them from your nearest pharmacy.</p>

          <table>
            <tbody>
            <tr>
                <th>Prescription ID</th>
                <th>Patient ID</th>
                <th>Doctor ID</th>
                <th>Drug Name</th>
                <th>Prescription Amount</th>
                <th>Prescription Dosage</th>
            </tr>
      
              <?php
      require_once("connect.php");

      $sql = "SELECT * FROM tblprescription WHERE patient_nat_id = $ID;";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "</tr>";
            echo "<tr>";                                         
            echo "<td>" . $row["pres_id"]. "</td>";
            echo "<td>" . $row["patient_nat_id"] . "</td>";
            echo "<td>" . $row["doc_hos_id"]. "</td>";
            echo "<td>" . $row["drug_id"] . "</td>";
            echo "<td>" . $row["pres_amount"] . "</td>";
            echo "<td>" . $row["pres_dosage"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No prescriptions found.</td></tr>";
    }
    ?>
            </tbody>
          </table>
        </div>
    </div>
      
    
</body>
</html>