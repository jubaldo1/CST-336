<?php
    function whateverTheyAre($c)
    {
        if ($c === 'doggie')
        {
            echo "Bone";
        }
        else if ($c === 'warrior')
        {
            echo "Treasure";
        }
        else if ($c === 'thing')
        {
            echo "Something";
        }
    }

    function displayAdvt($n, $c, $t)
    {
        echo "Once upon a time, there was a ". $c
        . " named " . $n .". <br> They wanted to find the
        greatest ";
        
        whateverTheyAre($c);
        
        echo ". They searched far and wide, but " . $n
        . " could not find what they searched for... <br><br>
        until they come across the dragon!<br><br>";
        
        echo "The dragon then said, \"" . $t ." \" to the grand " . $n
        . " that they'll find their precious ";
        
        whateverTheyAre($c);
        
        echo " somewhere else. Somewhere f";
        
        $num = rand(20,100);
        
        for ($i = 0; $i < $num; $i++)
        {
            echo "a";
        }
        
        echo "r away. <br> They sighed and went that way. <br><br> <b> THE END </b>";
    }
    
    function displayInfo($n, $c, $t)
    {
        if (!empty($n) && !empty($c) && !empty($t))
            {
                echo "The Very Short Story of the " . $c . " " . $n . ": <br><br>";
                
                displayAdvt($n, $c, $t);
            }
            else {
                if (empty($c))
                {
                    echo "Hey, there is no way to know what you're supposed to be! <br>";
                }
                else if (empty($n))
                {
                    echo "Hey, you didn't give a name! <br>";
                }
                else if (empty($t))
                {
                    echo "Hey! You didn't say anything! <br>";
                }
                echo "<a href=". 'start.php' .">Return from whence you came.</a>";
            }
    }
    
    function gimme($n, $c, $t)
    {
        displayInfo($n, $c, $t);
    }
?>