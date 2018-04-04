<?php 
    include 'DBConnection.php';
    session_start();
?>
<!--DOCTYPE html-->
<html>
    <head>
        <title>
            Administrator
        </title>
    </head>
    <body>
        
        <form action="./logoff.php">
            <input type="submit" value="Log Off">
        </form>
        
        <div>
            <hr>
            <h1>Administrator</h1>
            
            
            <?php
                // get the passed info
                if (isset($_SESSION['user']) || isset($_SESSION['pass']))
                {
                    $userName = $_SESSION['user'];
                    $passWord = $_SESSION['pass'];
                }
                
                if (($userName=="admin")&&($passWord=="s3cr3t"))
                {
                    echo    "<form method='post'>
                             <input type='radio' name='adminStuff' value='create'> Create User<br>
                             <input type='radio' name='adminStuff' value='update'> Update User<br>
                             <input type='radio' name='adminStuff' value='delete'> Delete User<br>
                             <input type='submit' name='Submit'>
                             </form>";
                    if (isset($_POST['adminStuff']))
                    {
                        $conn = getDataBaseconnection("lab6");
                
                        // this is the part that checks if the username == "admin"
                        // and password == "s3cr3t"
                        $sql = "SELECT * FROM `users`
                        WHERE '$userName' = username
                        AND '$passWord' = password";
                    
                        // the ` symbol is needed for the SELECT,
                        // * is for selecting EVERYTHING
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $record = $stmt->fetch();
                        
                        $adminToDo = $_POST['adminStuff'];
                    
                        if ($adminToDo=="create")
                        {
                            echo "
                                <h3>Creating a new User Account:</h3>
                                <form method='post'>
                                    First name: <input type='text' name='newFirst'><br>
                                    Last name: <input type='text' name='newLast'><br>
                                    Username: <input type='text' name='newUser'><br>
                                    Password: <input type='text' name='newPass'><br>
                                    <input type='submit' value='Create Account'>
                                </form>";
                            
                            if (isset($_POST['newFirst']))
                            {
                                echo $_POST['newFirst'];
                            }
                            /*
                            $sql = "SELECT * FROM `users`
                            WHERE '$userName' = username
                            AND '$passWord' = password";
                    
                            // the ` symbol is needed for the SELECT,
                            // * is for selecting EVERYTHING
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();*/
                        }
                        else if (($adminToDo)=="update")
                        {
                            
                        }
                        else if (($adminToDo)=="delete")
                        {
                            
                        }
                        
                        if (isset($_POST['newFirst']))
                            {
                                echo $_POST['newFirst'];
                            }
                    }
                }
                else
                {
                    echo "Access denied. Not an admin.";
                    echo "<br><form action='./logoff.php'><input type='submit' value='Confirm'></form>";
                }
                
            ?>
        </div>
    </body>
</html>