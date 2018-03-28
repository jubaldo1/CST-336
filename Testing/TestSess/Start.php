<!DOCTYPE html>
<html>
    <head>
        <title>The Start Page</title>
    </head>
    <body>
        <form action="Next.php" method="post">
            Name: <input type="text" name="myName"><br>
            <input type="submit" value="submit">
        </form>
        
        <?php 
            if (isset($_POST['myName']))
            {
                echo $_POST['myName'];
            }
        ?>
    </body>
</html>