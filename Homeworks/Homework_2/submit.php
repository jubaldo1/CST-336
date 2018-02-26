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
            <a href="start.php">Start</a>
        </nav>
        
         <div>
            <?php
                gimme($_POST["name"], $_POST["genderChoice"], $_POST["text"]);
            ?>
        </div>
    </body>
</html>