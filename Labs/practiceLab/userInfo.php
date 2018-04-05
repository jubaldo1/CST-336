<?php 
    include 'DBConnection.php';
    session_start();
?>
<!--DOCTYPE html-->
<html>
    <head>
        <title>
            User
        </title>
    </head>
    <body>
        
        <form action="./logoff.php">
            <input type="submit" value="Log Off">
        </form>
        
        <div>
            <h2>User</h2>
            <?php
            
                if (isset($_SESSION['user'])||isset($_SESSION['pass']))
                {
                    $userN=$_SESSION['user'];
                    $passW=$_SESSION['pass'];
                }
                
                $conn = getDataBaseconnection("lab6");
                
                $sql = "SELECT username, firstname, lastname FROM `users`
                WHERE '$userN' = username
                AND '$passW' = password";
                
                // the ` symbol is needed for the SELECT,
                // * is for selecting EVERYTHING
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $record = $stmt->fetch();
                
                echo "Name: " . $record['firstname'] . " " . $record['lastname'] . "<br>
                      Username: " . $record['username'] . "<br>
                      Password: " . $record['password'] . "<br>";
            ?>
        </div>
    </body>
</html>