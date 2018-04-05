<?php
    include 'DBConnection.php';
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form action='./login.php'>
            <input type="submit" value="Login">
        </form>
        <form action='./logoff.php'>
            <input type="submit" value="Log Off">
        </form>
    </body>
</html>