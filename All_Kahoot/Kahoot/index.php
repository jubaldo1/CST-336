<?php 
    include 'header.php';
    include 'DBConnection.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <!--<header>-->
    <!--    <title>Kahoot Project</title>-->
    <!--    
    <!--    <style type="text/css">@import url("css/styles.css");</style>-->
    <!--    <script src="func.js"></script>-->
        <!--Reference jQuery-->
    <!--    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
    <!--</header>-->
    <body>
        <div class = "textbox">
            <form method = post>
                <input tyep = text name = newName><br>
                <input type = submit name = submit id='submit'>
            </form>
        </div>
        
        <div>
            <form action = "makeQuiz.php">
                Make a Quiz: <input type = "submit" value = "Make Quiz">
            </form>
        </div>
        
        <div class = "posted">
            How do I look?
            <?php 
                if (isset($_POST['newName']))
                {
                    echo "<br>". $_POST['newName'];
                    $name = $_POST['newName'];
                }
                
                $conn = getDataBaseconnection("Kahoot");
            ?>
        </div>
        
        <div class="display">
            <script>
                console.log($name);
                yourNameIs($name);
                
            </script>
        </div>
        <?php 
            include 'footer.php';
        ?>
    </body>
</html>