<?php
    function displayAdvt($n, $f, $t)
    {
        echo "";
    }
    
    function displayInfo($n, $f, $t)
    {
        if (!empty($n) && !empty($f) && !empty($t))
            {
                echo "Welcome, " . $n . "! <br>";
                     displayAdvt($n, $f, $t);
            }
            else {
                if (empty($f))
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
    
    function gimme($n, $f, $t)
    {
        displayInfo($n, $f, $t);
    }
?>