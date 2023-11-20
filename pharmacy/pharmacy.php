<?php
session_start();
require_once("connect.php");

// Check if session variables are set
if (isset($_SESSION["userid"]) && isset($_SESSION["user"]) && isset($_SESSION["user"]["pharmacy_name"])) {
    $username = $_SESSION["userid"];
    $user = $_SESSION["user"];
    $ID = $_SESSION["user"]["pharmacy_name"];
} else {
    // Handle the case where session variables are not set
    $username = "Guest"; // Provide a default value or handle the error accordingly
    $user = null;
    $ID = null;
}
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
    <link rel="stylesheet" href="./pharmacy.css">
    <title>Pharmacy Dashboard</title>
</head>
<body>

<section class = "header">
  <nav>
    <ul>
      <li><a href="../homepage/index.php">Home</a></li>
      <li><a href="#Drugs">Manage Drugs</a></li>
      <li><a href="#Pending">Prescriptions</a></li>
      <li><a href="#History">History</a></li>
      <li><a href="../cat/catalogue.php">Drugs Catalog</a></li>
      <li><a href="#"><i class='bx bxs-user-account'></i><br><?php echo $username?> </a></li>
      <li><a href="../logout.php"><i class='bx bxs-exit'></i><br>Logout</a></li>
    </ul>
  </nav>

    <div class="container">
    <h1 style="font-family: 'Kaushan Script', cursive;">Welcome <?php echo $username?> </h1>

    <br><br><br><br>

</section>
    <div class="table-1">
          <h2 id="Drugs">Drugs</h2>
          <a class="btn btn-primary" href="pharmacyAddDrug.php" role="button">Add New Drug</a>
          <br>
          <table>
            <tbody>
              <tr>
                <th>Drug Name</th>
                <th>Drug ID</th>
                <th>Drug Price</th>
                <th>Action</th>
              </tr>
              <?php
                  require_once("connect.php");

                  // Retrieve prescription data from the database
                  $sql = "
                  SELECT dp.drug_id, d.drug_trade_name, dp.drug_price, p.pharmacy_name
                  FROM drug_prices dp
                  INNER JOIN tbldrugs d ON d.drug_id = dp.drug_id
                  INNER JOIN tblpharmacy p ON p.pharmacy_name = dp.pharmacy_name
                  WHERE p.pharmacy_name = '$ID'
                  ;";
                    
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()){
                      echo"
                      <tr>                                 
                        <td>$row[drug_trade_name]</td>
                        <td>$row[drug_id]</td>
                        <td>$row[drug_price]</td>
                        <td>
                        <a class='btn btn-primary btn-sm' href='confirmDeleteDrug.php?id=" . $row["drug_id"] . "'>Delete</a>
                      </td>
                      </tr>";
                      }
                  } else {
                      echo "<tr><td colspan='6'>No drugs in stock.</td></tr>";
                  }
          ?>
            </tbody>
          </table>
        </div>

      <br><br><br><br>
      <div class="table-1">
          <h2 id="Pending">Pending Prescriptions</h2>
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

      $sql = "SELECT * FROM tblprescription WHERE prescribed = 'N';";
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
            echo "<td>";
            echo    "<a class='btn btn-primary btn-sm' href='dispenseDrug.php?ID=" . $row["pres_id"] ."'>Dispense</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No prescriptions found.</td></tr>";
    }
    ?>
            </tbody>
          </table>
        </div>

      <br><br><br><br> 
      <div class="table-1">
          <h2 id="History">Prescription History</h2>
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

      $sql = "SELECT * FROM tblprescription WHERE prescribed = 'Y';";
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