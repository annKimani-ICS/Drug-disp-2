<?php
session_start();

$username = $_SESSION["userid"];
$user = $_SESSION["user"];
$ID = $_SESSION["user"]["phar_comp_name"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./pharcomp.css">
    <title>Company Dashboard</title>
</head>
<body>

<section class = "header">

<nav>
  <ul>
    <li><a href="../homepage/index.php">Home</a></li>
    <li><a href="#Drugs">Manage Drugs</a></li>
    <li><a href="#Contracts">Contracts</a></li>
    <li><a href="#">Drugs Catalog</a></li>
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
          <a class="btn btn-primary" href="companyAddDrug.php" role="button">Add New Drug</a>
          <br>
          <table>
            <tbody>
              <tr>
                <th>Drug Name</th>
                <th>Drug ID</th>
                <th>Drug Formula</th>
                <th>On Sale</th>
                <th>Action</th>
              </tr>
              <?php
                  require_once("connect.php");

                  $sql = "
                  SELECT d.drug_id, d.drug_trade_name, d.drug_formula, d.drug_expiry, d.onSale, p.phar_comp_name
                  FROM tbldrugs d
                  INNER JOIN pharcomp p ON p.phar_comp_name = d.drug_company
                  WHERE p.phar_comp_name = '$ID'
                  ;";
                    
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()){
                      echo"
                      <tr>                                 
                        <td>$row[drug_trade_name]</td>
                        <td>$row[drug_id]</td>
                        <td>$row[drug_formula]</td>
                        <td>$row[onSale]</td>
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
      
      <div class="table-2">
          <h2 id="Contracts">Contracts</h2>
          <br>
          <table>
            <tbody>
              <tr>
                  <th>Contract ID</th>
                  <th>Company</th>
                  <th>Pharmacy</th>
                  <th>Supervisor</th>
                  <th>supervisor Email</th>
                  <th>Start Date</th>
                  <th>End Date</th>
              </tr>
              <?php
      require_once("connect.php");

      $sql = "
      SELECT c.*, s.supervisor_name, s.supervisor_email 
      FROM tblcontract c
      INNER JOIN tblsuperv s ON s.supervisor_id = c.supervisor_id
     ;";
  
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "</tr>";
            echo "<tr>";                                         
            echo "<td>" . $row["contract_id"]. "</td>";
            echo "<td>" . $row["company_name"]. "</td>";
            echo "<td>" . $row["pharmacy_name"] . "</td>";
            echo "<td>" . $row["supervisor_name"] . "</td>";
            echo "<td>" . $row["supervisor_email"] . "</td>";
            echo "<td>" . $row["Start_Date"] . "</td>";
            echo "<td>" . $row["End_Date"] . "</td>";
            echo "<td>" . $row["Status"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No contracts found.</td></tr>";
    }
    ?>
            </tbody>
          </table>
        </div>
      


    </div>
      
    
</body>
</html>