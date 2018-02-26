<?php
    function displayAdvt($n, $c, $t)
    {
        echo "Once upon a time, there was a ". $c
        . " named " . $n .". <br> They wanted to find the
        greatest";
        
        //if ($f == )
    }
    
    function displayInfo($n, $c, $t)
    {
        if (!empty($n) && !empty($c) && !empty($t))
            {
                echo "Welcome, " . $n . "! <br>";
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