<?php

session_start();

$username = $_SESSION["userid"];
$user = $_SESSION["user"];

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="./admin.css">
</head>
<body>

<section class = "header">
  <nav>
    <ul><li><a href="../homepage/index.php">Home</a></li>
      <li><a href="#Patients">Patients</a></li>
      <li><a href="#Doctors">Doctors</a></li>
      <li><a href="#Pharmaceutical">Companies</a></li>
      <li><a href="#Pharmacies">Pharmacies</a></li>
      <li><a href="#Admins">Admininstrators</a></li>
      <li><a href="#Supervisors">Supervisors</a></li>
      <li><a href="../cat/catalogue.php">Drugs Catalog</a></li>  
      <li><a href="#"><i class='bx bxs-user-account'></i><br><?php echo $username?> </a></li>
      <li><a href="../logout.php"><i class='bx bxs-exit'></i><br>Logout</a></li>

    </ul>
  </nav>
  <div class="container">
    <h1 style="font-family: 'Kaushan Script', cursive;">Welcome <?php echo $username?> </h1>

    <br><br><br><br>

  </section>

<div class="container">
  <h1 style="font-family: 'Kaushan Script', cursive;">Website Users</h1>
  <div class="table-1">
    <h2 id="Patients">Patients</h2>
    <table>
      <tbody>
        <tr>
          <th>National-ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Age</th>
        </tr>

        <?php
require_once("connect.php");

$sql = "SELECT * FROM tblpatient";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td data-th=\"National-ID\">$row[patient_nat_id]</td>
    <td data-th=\"Name\">$row[patient_name]</td>
    <td data-th=\"Address\">$row[patient_address]</td>
    <td data-th=\"Email\">$row[patient_email]</td>
    <td data-th=\"Phone\">$row[patient_phone]</td>
    <td data-th=\"Age\">$row[patient_age]</td>
  </tr>
    ";
}
?>
      </tbody>
    </table>
  </div>

  <div class="table-2">
    <h2 id="Doctors">Doctors</h2>
    <table>
      <tbody>
        <tr>
          <th>Hospital-ID</th>
          <th>Name</th>
          <th>Phone</th>  
          <th>Speciality</th>
          <th>Experience</th>
        </tr>
        <?php
require_once("connect.php");

$sql = "SELECT * FROM tbldoctor";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td data-th=\"Hospital-ID\">$row[doc_hos_id]</td>
    <td data-th=\"Name\">$row[doc_name]</td>
    <td data-th=\"Phone\">$row[doc_phone]</td>
    <td data-th=\"Speciality\">$row[doc_spec]</td>
    <td data-th=\"Experience\">$row[doct_years]</td>
  </tr>
    ";
}
?>
      </tbody>
    </table>
  </div>

  <div class="table-3">
    <h2 id="Pharmacies">Pharmacies</h2>
    <table>
      <tbody>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Address</th>
        </tr>
        <?php
require_once("connect.php");

$sql = "SELECT * FROM tblpharmacy";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td data-th=\"Name\">$row[pharmacy_name]</td>
    <td data-th=\"Phone\">$row[pharmacy_phone]</td>
    <td data-th=\"Address\">$row[pharmacy_address]</td>
  </tr>
    ";
}
?>
      </tbody>
    </table>
  </div>

  <div class="table-4">
    <h2 id="Pharmaceutical">Pharmaceutical companies</h2>
    <table>
      <tbody>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Address</th>
        </tr>
        <?php
require_once("connect.php");

$sql = "SELECT * FROM pharcomp";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td data-th=\"Name\">$row[phar_comp_name]</td>
    <td data-th=\"Phone\">$row[phar_comp_phone]</td>
    <td data-th=\"Address\">$row[phar_comp_address]</td>
  </tr>
    ";
}
?>
      </tbody>
    </table>
  </div>

  <div class="table-5">
    <h2 id="Admins">Admininstrators</h2>
    <table>
      <tbody>
        <tr>
          <th>Admin-ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Phone</th>
        </tr>
        <?php
require_once("connect.php");

$sql = "SELECT * FROM tbladmin";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td data-th=\"Admin-ID\">$row[admin_id]</td>
    <td data-th=\"Name\">$row[admin_name]</td>
    <td data-th=\"Age\">$row[admin_age]</td>
    <td data-th=\"Phone\">$row[admin_phone]</td>
  </tr>
    ";
}
?>
      </tbody>
    </table>
  </div>

  <div class="table-6">
    <h2 id="Supervisors">Supervisors</h2>
    <table>
      <tbody>
        <tr>
          <th>Supervisor-ID</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
        <?php
require_once("connect.php");

$sql = "SELECT * FROM tblsuperv";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td data-th=\"Supervisor-ID\">$row[supervisor_id]</td>
    <td data-th=\"Name\">$row[supervisor_name]</td>
    <td data-th=\"Email\">$row[supervisor_email]</td>
  </tr>
    ";
}
?>
      </tbody>
    </table>
  </div>

</div>
<!-- partial -->
  
</body>
</html>
