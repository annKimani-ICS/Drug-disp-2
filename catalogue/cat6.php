<?php
include_once 'connect.php';

$section = isset($_GET['cat']) ? $_GET['cat'] : null;
$PageTitle = "All drugs";

function displayCategory($section, $categoryTitle, $conn)
{
    echo "<h1>{$categoryTitle}</h1><br>";
    echo "<div class='category-container'>";

    $category = htmlspecialchars($section); // Sanitize input to prevent SQL injection
    $sql = "SELECT * FROM drugs WHERE Drug_Category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
            echo '<p>' . $row["Drug_Name"] . '</p>';
            echo '<a href="details.php?Drug_ID=' . $row["Drug_ID"] . '">View Details</a>';
            echo '</div>';
        }
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug catalog</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="viewDrugs.php">All Categories</a></li>
            <li><a href="viewDrugs.php?cat=antibiotics">Antibiotics</a></li>
            <li><a href="viewDrugs.php?cat=painrelievers">Pain relievers</a></li>
            <li><a href="viewDrugs.php?cat=antifungal">Antifungal</a></li>
            <li><a href="viewDrugs.php?cat=immunotherapy">Immunotherapy</a></li>
            <li><a href="viewDrugs.php?cat=immunosuppressants">Immunosuppressants</a></li>
            <li><a href="viewDrugs.php?cat=antiparasitic">AntiParasitic</a></li>
            <li><a href="companyView.php">Back</a></li>
        </ul>
    </div>
    
    <div class="categories">
    <button class="btn-login-popup" onclick="window.location.href='companyView.php'">BACK</button>
    <br><br>
    <hr>
    <strong><center><h1>CATEGORIES</h1></center></strong>
    <ul>
        <?php $section = isset($_GET['cat']) ? $_GET['cat'] : null; ?>
        <li class="antibiotics" <?php if ($section == "antibiotics") echo "class='on'"; ?>><a href="viewDrugs.php?cat=antibiotics">Antibiotics</a></li>
        <li class="painrelievers" <?php if ($section == "painrelievers") echo "class='on'"; ?>><a href="viewDrugs.php?cat=painrelievers">Pain relievers</a></li>
        <li class="antifungal" <?php if ($section == "antifungal") echo "class='on'"; ?>><a href="viewDrugs.php?cat=antifungal">Antifungal</a></li>
        <li class="immunotherapy" <?php if ($section == "immunotherapy") echo "class='on'"; ?>><a href="viewDrugs.php?cat=immunotherapy">Immunotherapy</a></li>
        <li class="immunosuppressants" <?php if ($section == "immunosuppressants") echo "class='on'"; ?>><a href="viewDrugs.php?cat=immunosuppressants">Immunosuppressants</a></li>
        <li class="antiparasitic" <?php if ($section == "antiparasitic") echo "class='on'"; ?>><a href="viewDrugs.php?cat=antiparasitic">AntiParasitic</a></li>
        <!-- Add more categories here as needed -->
    </ul>
</div>
<hr>
<br><br><br>

    </div>
    <hr>
    <br><br><br>
    <div class="details">
        <?php
        if ($section) {
            if ($section == "antibiotics") {
                displayCategory($section, "Antibiotics", $conn);
            } elseif ($section == "painrelievers") {
                displayCategory($section, "Pain relievers", $conn);
            }
            // Add conditions for other categories here
        }
        ?>
    </div>
    <div class="item"></div>
</body>
</html>

<?php
// Close the database connection if needed
$conn->close();
?>
