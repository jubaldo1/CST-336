<!DOCTYPE html>
<html>
    <head>
        <title>PHP Arrays</title>
    </head>
    <body>
        <?php
        
            /*Any element of the array can be of any type in PHP*/
        
        
            // zero based: the first index is 0
            // Indexed array
            // Order matters
            // Can initialize with values
            $groceryList = array("candy", "newspaper");
        
            // Add elements in order to the indexed array
            $groceryList[] = "bread";
            $groceryList[] = "milk";
            
            // the push method is used to push more items onto
            // the array, and order matters here
            // push only adds to the end
            array_push($groceryList, "cheese", "butter");
            
            // How to get the elements out???\
            echo "<div>".$groceryList."</div>";
            
            var_dump($groceryList); 
            
            // Insert and delete
            // how to get things in and take things out
            // tell it where to start, how many to delete, add in the ones to insert
            // get rid of candy and insert more cheese
            array_splice($groceryList, 0, 1, "more cheese");
            
            echo "<div>".$groceryList."</div>";
            var_dump($groceryList);
            
            "count($groceryList)";
            
            // if you assign an array to element 0, it becomes a multidimensinal array
            // array within an array within an array
            // when you first initialize an array with an element,
            // it'll always start at index 0
            // so, the array being given is being assigned into index 0 of the array
            $hearts = array("Ace", "2", "3", "4");
            $partialDeck = array($hearts);
            
            for ($i = 0; $i < count($hearts[0]); $i++)
            {
                echo "Item ($i): ".$hearts[0][$i]." ";
            }
            
            echo "<h1>Associative</h1>";
            
            // Associative Arrays
            $deck = array("hearts" => $hearts);
            
            var_dump($deck);
            
            echo "<h3>Full Array</h3>";
        ?>
        
    </body>
</html>