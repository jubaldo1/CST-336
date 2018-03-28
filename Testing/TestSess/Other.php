<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>The Other Page</title>
    </head>
    <body>
        <?php 
            // the value has been given
            if (isset($_SESSION['name']))
            {
                echo 'Hello, ' . $_SESSION['name'] . '. Welcome again!';
            }
            else
            {
                echo 'There\'s no name now.';  
            }
            
            // destroy the evidence
            // get the cookie
            if (isset($_COOKIE['session_name()'])):
                setcookie(session_name(), '', time()-700000, '/');
            endif;
            
            session_destroy();
        ?>
    </body>
</html>