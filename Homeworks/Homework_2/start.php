<?php
    include 'inc/functions.php'
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Starting</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <!-- Navigation -->
        <div>
            <nav>
                 <a href="start.php">Start</a>
            </nav>
        </div>
        <br  />
        <hr  />
        <br  />
        
        <div>
            <form action="submit.php" method="post">
                <!--Adding a name-->
                Please enter your name here:
                <input type="text" name="name"/>
                <br  />
                <br  />
                
                <!--Selecting a preference-->
                Select how you would like to be referred to:<br>
                <input type="radio" value="warrior" name="choice">
                    <label for="warrior">Human</label>
                    <br>
                <input type="radio" value="doggie" name="choice">
                    <label for="doggie">Doggie</label>
                    <br>
                <input type="radio" value="thing" name="choice">
                    <label for="thing">The Thing</label>
                
                <br  />
                <br  />
                
                <!-- Typing in text    -->
                <textarea name="text" cols="20" rows="3"></textarea>
                
                <br  />
            
            <!-- Submit above info -->
            <input type="submit" value="Submit"/>
            
            </form>
        </div>
        
    </body>
</html>