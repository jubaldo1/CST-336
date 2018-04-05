<?php
    include 'DBConnection.php';
    session_start();
    echo $_SESSION['user'];
    echo $_SESSION['pass'];

    // want to ccreate forms so that the admin
    // can put information into it to create a new user
    // 
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
                    echo "<div>
                        What do you want to do?
                        <form method='post'>
                            <input type='radio' name='whatDo' value='create'> Create User<br>
                            <input type='radio' name='whatDo' value='edit'> Edit User<br>
                            <input type='radio' name='whatDo' value='delete'> Delete User<br>
                        </form>
                    </div>";
                }
                else {
                    echo "YOU ARE NOT AN ADMIN HOW DARE YOU";
                }
            ?>    
        </div>
    </body>
</html>
