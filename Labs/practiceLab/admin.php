<?php 
    include 'DBConnection.php';
    session_start();
    
    if (isset($_POST['newFirst']))
    { echo $_POST['newFirst']; }
    else
    { echo "No, it's not set"; }
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
                        
                        // store action choice
                        $_SESSION['adminToDo']=$adminToDo;
                        
                        if ($adminToDo=="create")
                        {
                            echo '
                                <h3>Creating a new User Account:</h3>
                                <form action="./admin.php" method="post">
                                    First name: <input type="text" name="newFirst"><br>
                                    Last name: <input type="text" name="newLast"><br>
                                    Username: <input type="text" name="newUser"><br>
                                    Password: <input type="text" name="newPass"><br>
                                    <input type="submit" value="Create Account">
                                </form>';
                            
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
                            // find the account
                            echo '<h3>Find the user to update:</h3><br>
                            <form>
                                Username: <input type="text" name="newUser"><br>
                                Password: <input type="text" name="newPass"><br>
                                <input type="submit" value="Find User Account">
                            </form>';
                        }
                        else if (($adminToDo)=="delete")
                        {
                            echo '<h3>Delete User:</h3>';
                            
                            $sql = "SELECT username,isAdmin FROM `users`";
                    
                            // the ` symbol is needed for the SELECT,
                            // * is for selecting EVERYTHING
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                            foreach ($records as $record) {
                                if ($record['isAdmin']==0)
                                {
                                    echo 
                                    "<form method='post'>
                                        Username: <input type='radio' name='deleteUser' value=" . $record['username'] . ">".$record['username']."<br>";
                                }
                            }
                            echo 
                                    '<input type="submit" value="Delete User Account">
                                </form>';
                        }
                    }
                    else if (isset($_SESSION['adminToDo']))
                    {
                        $theAdminToDo = $_SESSION['adminToDo'];
                        
                        if ($theAdminToDo = "create")
                        {
                            
                        }
                        else if ($theAdminToDo = "update")
                        {
                            
                        }
                        else if ($theAdminToDo = "delete")
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