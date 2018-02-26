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
                gimme($_POST["name"], $_POST["choice"], $_POST["text"]);
            ?>
        </div>
    </body>
    
    <footer>
        <hr />
        CST 336: Internet Programming. 2018&copy; Ubaldo <br />
        <strong>Disclaimer:</strong>Homework 1<br />
        This is my Homework 1.
        <img src="img/oteer.jpg" alt="CSUMB logo" />
    </footer>
</html>