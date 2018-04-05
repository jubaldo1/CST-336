<!--DOCTYPE html-->
<html>
    <head>
    </head>
    <body>
        <?php
            session_start();
            session_destroy();
            
            
            echo "okay";
            //header("Location: login.php");
        ?>
    </body>
</html>