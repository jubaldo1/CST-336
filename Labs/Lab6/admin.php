<?php
    include 'DBConnection.php';
    session_start();
    echo $_SESSION['user'];
    echo $_SESSION['pass'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Administrator</title>
    </head>
    <body>
        <div>
            <?php
                if (isset($_SESSION['user']) || isset($_SESSION['pass']))
                {
                    $user = $_SESSION['user'];
                    $pass = $_SESSION['pass'];
                }
                
                echo $user . "<br>" . $pass . "<br>";
                
                if (($user=="admin") && ($pass=="s3cr3t"))
                {
                    $conn = getDataBaseconnection("lab6");
                    
                    // this is the part that checks if the username == "admin"
                    // and password == "s3cr3t"
                    
                    
                    
                    $stmt = "INSERT INTO `users` 
                             (
                                id,
                                username,
                                password,
                                firstname,
                                lastname,
                                isAdmin
                             )
                             VALUES
                             (
                                :id,
                                :user,
                                :pass,
                                :first,
                                :last,
                                :adminStat
                             )";
                    
                    // the ` symbol is needed for the SELECT,
                    // * is for selecting EVERYTHING
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(
                                array
                                (
                                    ":id"=> ;
                                    ":user"=> ;
                                    ":pass"=> ;
                                    ":first"=> ;
                                    ":last"=> ;
                                    ":adminStat"=> ;
                                )
                            );
                    //$record = $stmt->fetch();
                    
                    //if (isset($_POST['user']) && isset($_POST['pass']))
                    //{
                    //    echo $user . "<br>" . $pass;
                    //}
                }
                else {
                    echo "YOU ARE NOT AN ADMIN HOW DARE YOU";
                }
            ?>    
        </div>
    </body>
</html>
