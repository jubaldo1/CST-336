<?php
    function displayInfo($name, $gender)
    {
        if (!empty($name) && !empty($gender))
            {
                echo 'Hey, ' . $name . '!';
            }
            else {
                if (empty($gender))
                {
                    echo "Hey, there is no way to know what you're supposed to be! <br>";
                }
                else if (empty($name))
                {
                    echo "Hey, you have no name! Go back and do it again! <br>";
                    
                }
                
                echo "<a href=". 'start.php' .">Return from whence you came.</a>";
            }
    }
?>