<?php 
    include 'DBConnection.php';
    session_start();
?>
<!--DOCTYPE html-->
<html>
    <head>
        <title>
            Log Off
        </title>
    </head>
    <body>
        
        <div>
            <h1>Log Off</h1>
            
            <?php
                // Get rid of the cookie first
                if(isset($_COOKIE[session_name()])):
                    setcookie(session_name(), '', time()-7000000, '/');
                endif;

                // Then get rid of all evidence the session existed
                session_destroy();
                unset($_POST['user']);
                unset($_POST['pass']);
            ?>
            You have been logged out.<br>
            <form action="index.php">
                <input type="submit" value="Confirm">
            </form>
        </div>
    </body>
</html>