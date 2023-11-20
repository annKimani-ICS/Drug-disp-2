<?php
require_once("../patient/connect.php"); // Include your database connection logic

if (isset($_GET['drug_name'])) {
    $drugName = $_GET['drug_name'];

    // Prepare the SQL query to fetch drug details
    $sql = "SELECT drug_id, drug_trade_name, drug_formula, drug_expiry, drug_company, onSale, image FROM tbldrugs WHERE drug_trade_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $drugName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $description = "Trade Name: " . $row['drug_trade_name'] . "<br>";
        $description .= "Formula: " . $row['drug_formula'] . "<br>";
        $description .= "Expiry Date: " . $row['drug_expiry'] . "<br>";
        $description .= "Company: " . $row['drug_company'] . "<br>";
        $description .= "On Sale: " . ($row['onSale'] == 1 ? 'Yes' : 'No') . "<br>";
        $image = $row['image'];
    } else {
        $description = "Drug details not available.";
        $image = ""; // Provide a default image URL or leave it empty
    }
    $stmt->close();
} else {
    echo "Invalid drug name.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Details</title>
    <link rel="stylesheet" href="./cat.css">
    <style>
      
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .drug-details {
            display: flex;
            align-items: center;
        }
        .drug-details img {
            max-width: 200px;
            max-height: 200px;
            margin-right: 20px;
        }
        .drug-details .description {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Drug Details - <?php echo $drugName; ?></h1>

    <div class="drug-details">
        <img src="<?php echo $image; ?>" alt="<?php echo $drugName; ?> Image">
        <div class="description">
            <h2>Description</h2>
            <p><?php echo $description; ?></p>
        </div>
    </div>
</body>
</html>
