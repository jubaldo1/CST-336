<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form action="challenge.php" method="post">
            Guess: <input type="text" name="guess"><br>
            Guess: <input type="text" name="guess2"><br>
            <input type="submit" value="Guess Numbers" name="guessForm">
            <br>
            <br>
            <input type="submit" value="Give Up" name="giveUp"
        </form>
        
        <?php
            // session 
            session_start();
           
            
           if ($_SESSION["guessCount"] == 0)
            {   // random: it's the name for the PHP variable
                $_SESSION["random1"] = rand(1, 10); 
                $_SESSION["random2"] = rand(1, 10);  
                
                $_SESSION["guessCount"] = 0;
            }
            
            $guessA = $_POST["guess"];
            $guessB = $_POST["guess2"];
            
            if ($guessA == $_SESSION["random1"] || $guessB == $_SESSION["random2"])
            {
                if ($guessA == $_SESSION["random1"] && $guessB == $_SESSION["random2"])
                {
                    echo ("Congrats! You got both numbers right!");
                    session_destroy();
                }
                else
                {
                    if ($guessA == $_SESSION["random1"] && !($guessB == $_SESSION["random2"]))
                    {
                        echo ("Congrats! You got the first number right!");
                    }
                    else if (!($guessA == $_SESSION["random1"]) && $guessB == $_SESSION["random2"])
                    {
                        echo ("Congrats! You got the second number right!");
                    }
                }
            }
            else 
            {
                if ($guessA < $_SESSION["random1"])
                    echo ("Guess A has to be higher.");
                if ($guessA > $_SESSION["random1"])
                    echo ("Guess A has to be lower."); 
                if ($guessB < $_SESSION["random2"])
                    echo ("Guess B has to be higher."); 
                if ($guessB > $_SESSION["random2"])
                    echo ("Guess B has to be lower.");
                    
                $_SESSION["guessCount"] += 1;
            }
            
            //$_SESSION["guessCount"] += 1;
            $_SESSION["random1"] = 9;
            print("<br>" . $_SESSION["guessCount"] . "<br>" . $_SESSION["random1"] . "<br>" . $_SESSION["random2"]);
       
            
        ?>
        
        
    </body>
</html>