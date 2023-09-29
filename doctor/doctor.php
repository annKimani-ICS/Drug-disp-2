<?php
session_start();

include('../login/login.php');

$username = $_SESSION["user"]["doc_name"];
$user = $_SESSION["user_type"];
$ID = $_SESSION["user"]["doc_hos_id"];

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
    <link rel="stylesheet" href="./doctor.css">
    <title>Doctor Dashboard</title>
</head>
<body>

<section class = "header">
    <nav>
        <ul>
          <li><a href="../homepage/index.php">Home</a></li>
          <li><a href="#Patients">Manage Patients</a></li>
          <li><a href="#Drugs">Prescribe Drugs</a></li>
          <li><a href="#Prescriptions">Prescriptions</a></li>
          <li><a href="#"><i class='bx bxs-user-account'></i><br><?php echo $username?></a></li>
          <li><a href="../logout.php"><i class='bx bxs-exit'></i><br>Logout</a></li>
        </ul>
    </nav>

    <div class="container">
    <h1 style="font-family: 'Kaushan Script', cursive;">Welcome Doctor <?php echo $username?> </h1>

    <br><br><br><br>

</section>
    <div class="table-1">
          <h2 id="Patients">Patients</h2>
          <a class="btn btn-primary" href="patientList.php" role="button">Add New Patient</a>
          <br>
          <table>
            <tbody>
              <tr>
                <th>National-ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Action</th>
              </tr>
      
              <?php
      require_once("connect.php");

      $result = $conn->query("
      SELECT p.patient_nat_id, p.patient_name, p.patient_address, p.patient_email, p.patient_phone, p.patient_age
      FROM tblpatient p
      INNER JOIN doctor_patient dp ON p.patient_nat_id = dp.patient_nat_id
      WHERE dp.doc_hos_id = '$ID';");
      
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          
          echo "<tr>";
          echo "<td data-th=\"National-ID\">" . $row["patient_nat_id"]. "</td>";
          echo "<td data-th=\"Name\">" . $row["patient_name"] . "</td>";
          echo "<td data-th=\"Address\">" .$row["patient_address"] . "</td>";
          echo "<td data-th=\"Email\">" . $row["patient_email"] . "</td>";
          echo "<td data-th=\"Phone\">" . $row["patient_phone"] . "</td>";
          echo "<td data-th=\"Age\">" . $row["patient_age"] . "</td>";
          echo "<td>";
          echo    "<a class='btn btn-primary btn-sm' href='confirmDeletePatient.php?id=" . $row["patient_nat_id"] . "'>Delete</a>";
          echo "</td>";
          echo "</tr>";
        }
      }
      ?>
            </tbody>
          </table>
        </div>

        <br><br><br><br>

      <h2 id="Drugs">DRUGS</h2>
      <div class="login">
        <h2 class="active">PRESCRIBE DRUGS</h2>
        <form action="submitPrescription.php" method="post">
            <input type="text"  class="text input"  name="patient_nat_id" required>
            <span>Patient National ID:</span>
            <br><br><br><br>

            <input type="text"  class="text input"  name="doc_hos_id" required>
            <span>Your Hospital ID:</span>
            <br><br><br><br>

            <span>Drug:</span>
            <select name="drug_id" id="drug_id" required>
                <?php
                $sql = "SELECT `drug_id`, `drug_trade_name` FROM tbldrugs";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value=" '. $row["drug_id"] .' "> '. $row["drug_trade_name"] .' </option>';
                    }
                } else {
                    echo '<option value="">No drugs found</option>';
                }

                $result->close();
                ?>
            </select>

            <input type="text"  class="text input"  name="pres_amount" required>
            <span>Prescription Amount:</span>
            <br><br><br><br>

            <input type="text"  class="text input"  name="pres_dosage" required>
            <span>Prescription Dosage:</span>
            <br><br>
          
            <button class="signin">Send Prescription</button>
            <br><br>
            <hr>
        </form>     
      </div> 

      <br><br><br><br>
      
      <div class="table-1">
          <h2 id="Prescriptions">Prescriptions</h2>
          <br>
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

      $sql = "SELECT * FROM tblprescription WHERE doc_hos_id = $ID;";
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
      
    <?php include('../inc/footer.php'); ?>
</body>
</html>