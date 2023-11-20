<?php

session_start();
include "../login/connect.php";

// Assume you fetch $userid and $user from the database after login
$userid = 'your_user_id';  // Replace with the actual user ID
$user = ['user_data'];     // Replace with the actual user data

// After user login, set session variables
$_SESSION["userid"] = $userid;
$_SESSION["user"] = $user;
function categorizeDrug($drugName) {
    $categories = [
        "Pain Relief" => ["Warfarin", "Simvastatin", "Paracetamol", "Metoprolol"],
        "Vitamins and Supplements" => ["Metformin", "Loratadine", "Citalopram"],
        "Cough and Flu" => ["Cetirizine", "Aspirin"],
    ];

    foreach ($categories as $category => $drugs) {
        if (in_array($drugName, $drugs)) {
            return $category;
        }
    }

    return "Other"; // Default category if not found
}



// After user login, set session variables
$_SESSION["userid"] = $userid; // Replace with the actual user ID
$_SESSION["user"] = $user;     // Replace with the actual user data

// Fetch drugs from the database and categorize them
$sql = "SELECT drug_trade_name, drug_company, image FROM tbldrugs"; // Replace with your actual table name
$result = $conn->query($sql);

$categorizedDrugs = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $drugName = $row["drug_trade_name"];
        $category = categorizeDrug($drugName);
        $categorizedDrugs[$category][] = [
            "name" => $drugName,
            "drug_company" => $row["drug_company"], // Add description column in your database
            "image" => $row["image"], // Add image_url column in your database
        ];
    }
}

$conn->close();
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
    <link rel="stylesheet" href="./cat.css">
    <title>Pharmacy Drug Catalog</title>
</head>
<body>
<?php include '../inc/header.php'; ?>
    <header>
        <h1>Pharmacy Drug Catalog</h1>
    </header>
    <!-- ... (existing code) -->

<div class="container">
   
    <button class="dropdown-btn" onclick="toggleCategories()">Toggle Drug Categories</button>
    <div id="categories" style="display: none;">
        <ul>
            <?php
            foreach ($categorizedDrugs as $category => $drugs) {
                echo "<li><a href='#' onclick=\"toggleCategory('$category')\">$category</a></li>";
            }
            ?>
        </ul>
    </div>

    <?php
    foreach ($categorizedDrugs as $category => $drugs) {
        echo "<div id='$category' style='display: none;'>";
        echo "<h2>$category</h2>";
        echo "<ul>";
        foreach ($drugs as $drug) {
            echo "<li>";
            echo "<img src='{$drug['image']}' alt='{$drug['name']} Image' width='100' height='100'>";
            echo "<a href='details.php?drug_name={$drug['name']}'>{$drug['name']} - View Details</a>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    ?>
    <?php include '../inc/footer.php'; ?>
</div>

<!-- ... (existing code) -->

    <script>
        function toggleCategories() {
            var categories = document.getElementById('categories');
            if (categories.style.display === "none") {
                categories.style.display = "block";
            } else {
                categories.style.display = "none";
            }
        }

        function toggleCategory(categoryId) {
            var category = document.getElementById(categoryId);
            if (category.style.display === "none") {
                category.style.display = "block";
            } else {
                category.style.display = "none";
            }
        }
    </script>

  
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <title>Back Button Example</title>
</head>
<body>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>
