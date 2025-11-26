<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <?php 
        if ($_GET) {
            echo "<h2>Welcome " . htmlspecialchars($_GET['user']) . "!</h2>";
        } else {
            echo "<h2>Access Denied!</h2>";
        }
        ?>
    </div>
</body>
</html>
