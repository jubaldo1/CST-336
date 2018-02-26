<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
         <div>
            <?php
                if (!empty($_POST["name"]))
                {
                    echo 'Hey, ' . $_POST["name"] . '!';
                }
                else {
                    echo 'Hey, you have no name!';
                }
            ?>
        </div>
    </body>
</html>