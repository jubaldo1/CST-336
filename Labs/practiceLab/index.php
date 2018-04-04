<?php
    session_start();
    if (isset($_POST['user']))
    {
        echo $_POST['user'];
    }
?>
<!--DOCTYPE html-->
<html>
    <head>
        <title>
            Lab 6
        </title>
    </head>
    <body>
        <form action="./login.php" method="post">
            <div>
                Username: <input type="text" name="user"><br>
                Password: <input type="text" name="pass"><br>
                <input type="submit" value="Log In">
            </div>
        </form>
        <!--<form action="./logoff.php">-->
        <!--    <input type="submit" value="Log Off">-->
        <!--</form>-->
        
        <div>
            <hr>
            <h1>Lab 6</h1>
            Welcome to Lab 6.
        </div>
    </body>
</html>