<?php 
    include 'DBConnection.php';
    session_start();
?>
<!--DOCTYPE html-->
<html>
    <head>
        <title>
            Log In
        </title>
    </head>
    <body>
        <form action="./login.php" method="post">
            Username: <input type="text" name="user"><br>
            Password: <input type="text" name="pass"><br>
            <input type="submit" value="Log In">
        </form>
        <form action="./logoff.php">
            <input type="submit" value="Log Off">
        </form>
        
        <div>
            <hr>
            <h1>Log In</h1>
        </div>
        
        <?php
                $conn = getDataBaseconnection("lab6");
            
                // this is the part that checks if the username == "admin"
                // and password == "s3cr3t"
                if (isset($_POST['user']) || isset($_POST['pass']))
                {
                    $userName = $_POST['user'];
                    $passWord = $_POST['pass'];
                }
                $sql = "SELECT * FROM `users`
                WHERE '$userName' = username
                AND '$passWord' = password";
                
                // the ` symbol is needed for the SELECT,
                // * is for selecting EVERYTHING
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $record = $stmt->fetch();
                
                if ($record['username'] == $userName && $record['password'] == $passWord)
                {
                    echo "user: " . $record['username'] . "<br>";
                    echo "pass: " . $record['password'] . "<br>";
                    
                    if ($record['username'] == "admin" && $record['password'] == "s3cr3t")
                    {
                        //$_SESSION['user'] = $userName;
                        $_SESSION['user'] = $userName;
                        $_SESSION['pass'] = $passWord;
                        header("Location: admin.php");
                    }
                    else
                    {
                        $_SESSION['user'] = $userName;
                        $_SESSION['pass'] = $passWord;
                        header("Location: display.php");
                    }
                }
                else {
                    echo "Wrong username/password.";
                    echo 
                    "<form action='./index.php'>
                        <input type='submit' value='Confirm'>
                     </form>";
                }
                // debugging stuff here
                echo $record['id'] . " user: " . $record['username'] . $record['password'] . "<br>";
                    
            ?>
    </body>
</html>