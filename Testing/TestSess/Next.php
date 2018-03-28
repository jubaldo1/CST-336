<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>The Next Page</title>
    </head>
    <body>
        <?php 
            // the value has been given
            if (!empty($_POST['myName']))
            {
                $_SESSION['name'] = $_POST['myName'];
                echo 'Hello, ' . $_SESSION['name'] . '. Welcome!';
            }
            else
            {
                $_SESSION['name'] = 'Bob';
                echo 'No name given! Your name is now ' . $_SESSION['name'] . '.';  
            }
        ?>
    </body>
</html>