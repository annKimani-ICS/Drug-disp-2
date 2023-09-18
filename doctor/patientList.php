<?php
session_start();

if (!isset($_SESSION["userid"]) || !isset($_SESSION["user"])) {
    header("Location: ../login/login.html");
    exit;
}

$username = $_SESSION["userid"];
$user = $_SESSION["user"];
$ID = $_SESSION["user"]["doc_hos_id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title> Doctor View - Add New Patient </title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="doctor.css">
</head>
<body class="DoctorView">


<nav>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="doctor.php#Patients">Manage Patients</a></li>
    <li><a href="doctor.php#Drugs">Prescribe Drugs</a></li>
    <li><a href="doctor.php#Prescriptions">Prescriptions</a></li>
    <li><a href="#"><i class='bx bxs-user-account'></i><br><?php echo $username?> </a></li>
    <li><a href="../logout.php"><i class='bx bxs-exit'></i><br>Logout</a></li>
  </ul>
</nav>

    <div class="container my-5">
        <div class="table-1">
        <h2>List of Patients</h2>
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
      SELECT * FROM tblpatient p
      INNER JOIN doctor_patient dp ON p.patient_nat_id = dp.patient_nat_id
      WHERE dp.doc_hos_id != '$ID';");
      
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
          echo    "<a class='btn btn-primary btn-sm' href='doctorAddPatient.php?id=" . $row["patient_nat_id"] . "'>Add</a>";
          echo "</td>";
          echo "</tr>";
        }
      }
      ?>
         </tbody>
    </table>

    </div>
</body>
</html>

