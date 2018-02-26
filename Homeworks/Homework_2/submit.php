<?php
    include 'inc/functions.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Aftermath</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
        <!-- Navigation -->
        <nav>
            <a href="index.php">Start</a>
        </nav>
        
         <div>
            <?php
                displayInfo($_POST["name"], $_POST["genderChoice"], $_POST[""], $_POST[""]);
            ?>
        </div>
    </body>
</html>