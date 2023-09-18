<?php
session_start();

$_SESSION['loading'] = true;
sleep(1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loading</title>
    <link rel="stylesheet" href="loading.scss">
    <script>
        setTimeout(function() {
            window.location.href = 'homepage/homepage.html';
        }, 4000); // 5 seconds delay in milliseconds
    </script>
</head>
<body>
    <div class="loading-container">
        <div class="loading-text">
            <span>L</span>
            <span>O</span>
            <span>A</span>
            <span>D</span>
            <span>I</span>
            <span>N</span>
            <span>G</span>
        </div>
    </div>
</body>
</html>
