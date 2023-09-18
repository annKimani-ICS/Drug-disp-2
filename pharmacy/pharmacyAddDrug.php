<?php
session_start();

$username = $_SESSION["userid"];
$user = $_SESSION["user"];

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

<nav>
  <ul>
    <li><a href="./pharmacy.php">Back</a></li>
    <li><a href="#">Home</a></li>
    <li><a href="pharmacy.php#Drugs">Manage Drugs</a></li>
    <li><a href="pharmacy.php#Pending">Prescriptions</a></li>
    <li><a href="pharmacy.php#History">History</a></li>
    <li><a href="#"><i class='bx bxs-user-account'></i><br><?php echo $username?> </a></li>
    <li><a href="../logout.php"><i class='bx bxs-exit'></i><br>Logout</a></li>
  </ul>
</nav>

    <div class="container">
        <br><br><br><br>

      <h2 id="Drugs">DRUGS</h2>
      <div class="login">
        <h2 class="active">ADD DRUGS</h2>
        <form action="add.php" method="post">

            <span>Drug NAME:</span>
            <select name="drug_id" required>
                <?php
                require_once("connect.php");

                $sql = "SELECT `drug_id`, `drug_trade_name` FROM tbldrugs";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="'. $row["drug_id"] .' "> '. $row["drug_trade_name"] . ' </option>';
                    }
                } else {
                    echo '<option value="">No drugs found</option>';
                }

                $result->close();
                ?>
            </select>

            <input type="text"  class="text" name="drug_price" required>
            <span>DRUG PRICE:</span>
            <br><br><br><br>
          
            <button class="signin">Add Drug</button>
            <br><br>
            <hr>
        </form>     
      </div> 

      <br><br><br><br>
    </div>
      
    
</body>
</html>