<?php 
    include 'DBConnection.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <!--form for login-->
        <div>
            <form method="post">
                Username: <t><input type = "text" name = "user"></t><br><br>
                Password: <t><input type = "text" name = "pass"></t><br><br>
                
                <input type = "submit" name = "submit" value="Login">
            </form>
        </div>
            
        <div>
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
                }
                echo $record['id'] . " user: " . $record['username'] . $record['password'] . "<br>";
                    
            ?>
        </div>
    </body>
</html>
