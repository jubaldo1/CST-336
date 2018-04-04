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
                
                if (isset($_SESSION['user']) || isset($_SESSION['pass']))
                {
                    $userName = $_SESSION['user'];
                    $passWord = $_SESSION['pass'];
                    echo "admin?: " . $userName;
                }
                
                if (($userName=="admin")&&($passWord=="s3cr3t"))
                {
                    echo    "<form method='post'>
                             <input type='radio' name='adminStuff' value='create'> Create User<br>
                             <input type='radio' name='adminStuff' value='update'> Update User<br>
                             <input type='radio' name='adminStuff' value='delete'> Delete User<br>
                             <input type='submit' name='Submit'>
                             </form>";
                    echo "why is this showing?";
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
                        
                        echo $_POST['adminStuff'];
                        $adminToDo = $_POST['adminStuff'];
                    
                        if ($adminToDo=="create")
                        {
                            
                        }
                        else if (($adminToDo)=="update")
                        {
                            
                        }
                        else if (($adminToDo)=="delete")
                        {
                            
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