<?php 
    include 'DBConnection.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <header>
        <title>Kahoot: Make a Quiz</title>
        <?php 
            $name = "";
        ?>
        <style type="text/css">@import url("css/styles.css");</style>
        <script src="func.js"></script>
        <!--Reference jQuery-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    </header>
    <body>
        <h1 id='title'>Kahoot: Make a Quiz</h1>
        <div class = "textbox">
            <form method = post>
                <input tyep = text name = newName><br>
                <input type = submit name = submit id='submit'>
            </form>
        </div>
        
        <div class = "posted">
            <?php 
                $conn = getDataBaseconnection("Kahoot");
            ?>
        </div>
        
        <div class="display">
            <script>
                console.log($name);
                yourNameIs($name);
                
            </script>
        </div>
    </body>
</html>