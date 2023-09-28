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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./pharcomp.css">
    <title>Company Dashboard</title>
</head>
<body>

<nav>
  <ul>
    <li><a href="./pharcomp.php">Back</a></li>
    <li><a href="#">Home</a></li>
    <li><a href="pharcomp.php#Drugs">Manage Drugs</a></li>
    <li><a href="pharcomp.php#Contracts">Contracts</a></li>
    <li><a href="#"><i class='bx bxs-user-account'></i><br><?php echo $username?> </a></li>
    <li><a href="../logout.php"><i class='bx bxs-exit'></i><br>Logout</a></li>
  </ul>
</nav>

    <div class="container">
        <br><br><br><br>

      <h2 id="Drugs">DRUGS</h2>
      <div class="login">
        <h2 class="active">ADD DRUGS</h2>
        <form action="addDrug.php" method="post">
            <input type="hidden" name="drug_company" value=<?php echo $ID ?> >

            <input type="text"  class="text" name="drug_trade_name" required>
            <span>DRUG trade name:</span>
            <br><br><br><br>

            <input type="file"  class="text" name="drug_image" required>
            <span>DRUG image:</span>
            <br><br><br><br>

            <input type="text"  class="text" name="drug_formula">
            <span>DRUG formula : <small><small>(*optional)</small></small></span>
            <br><br><br><br>

            <input type="text"  class="text" name="drug_category" required>
            <span>DRUG drug_category:</span>
            <br><br><br><br>

            <input type="date"  class="text" name="drug_expiry" required>
            <span>DRUG expiry:</span>
            <br><br><br><br>

          
            <button class="signin">Add Drug</button>
            <br><br>
            <hr>
        </form>     
      </div> 
    </div>
      
    
</body>
</html>