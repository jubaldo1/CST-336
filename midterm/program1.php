<!DOCTYPE html>
<html>
    <head>
        <title>Program Practice 2</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <form method="post">
            Number of Rows: <input type="text" name="numRows"><br><br>
            Number of Columns: <input type="text" name="numCols"><br><br>
            Suit to omit:
            <select name="card">
                <option value="hearts">Hearts</option>
                <option value="clubs">Clubs</option>
                <option value="diamonds">Diamonds</option>
                <option value="spades">Spades</option>
            </select>
            <input type="submit" value="Submit">
        </form>
        
        <?php
            $drawn = FALSE;
            $rows = 0;
            $cols = 0;
            $noSuite = "";
            $theSuite = "";
            
            if ($_POST['numRows']*$_POST['numCols'] > 39)
            { echo "<br>Too many rows or columns. Please try again.<br>"; }
            else {
                if (isset($_POST['numRows']))
                { $rows = $_POST['numRows']; }
                
                if (isset($_POST['numCols']))
                { $cols = $_POST['numCols']; }
                
                // 1=clubs,2=diamonds,3=hearts,4=spades
                if (isset($_POST['card']))
                {
                    $noNum = $_POST['card'];
                    if ($noNum == 1)
                    {
                        $noSuite = "clubs";
                    }
                    else if ($noSuite = 2) {
                        $noSuite = "diamonds";
                    }
                    else if ($noSuite = 3) {
                        $noSuite = "hearts";
                    }
                    else if ($noSuite = 2) {
                        $noSuite = "spades";
                    }
                }
                
                // // the cards
                // $card = array($drawn, );
                
                // $clubs = array(1,2,3,4,5,6,7,8,9,10,11,12);
                // $diamonds = array(1,2,3,4,5,6,7,8,9,10,11,12);
                // $hearts = array(1,2,3,4,5,6,7,8,9,10,11,12);
                // $spades = array(1,2,3,4,5,6,7,8,9,10,11,12);
                // $deck = array($clubs, $diamonds, $spade, $deck);
                
                // // echo "Deck: ";
                // // var_dump($deck);
                
                // $currSuite = "";
                
                // // random number to pick a suite
                // $randSuite = rand(1,4);
                
                // the table
                echo "<br><table border=1>";
                
                for ($i=0; $i<$rows;$i++)
                {
                    echo "<tr>";
                    for ($j=0;$j<$cols;$j++)
                    {
                        // gonna have to do the old fashioned way
                        // have a folder of cards, inside folders of different decks
                        // randomly pick cards
                        // range from 1 - 52
                        // need 4 arrays for each suite of cards??
                        // if the card being picked is not the card being ommitted
                        // don't show it then
                        // use the randSuite with it
                        // 1=clubs,2=diamonds,3=hearts,4=spades
                        echo "<td>";
                        $randSuite = rand(1,4);
                        
                        // if ($deck[$randSuite]!=$noSuite)
                        // {
                        //     echo "<img src='cards/".$deck[$randSuite]."/".rand(1,12).".png' alt='card'>";
                        // }
                        
                        // if ($randSuite!=$noSuite)
                        // {
                            
                        // }
                        if ($randSuite==1 && $randSuite!=$noSuite)
                        {
                            echo "<img src='cards/clubs/".rand(1,12).".png' alt='card'>";
                        }
                        else if ($randSuite==2 && $randSuite!=$noSuite)
                        {
                            echo "<img src='cards/diamonds/".rand(1,12).".png' alt='card'>";
                        }
                        else if ($randSuite==3 && $randSuite!=$noSuite)
                        {
                            echo "<img src='cards/hearts/".rand(1,12).".png' alt='card'>";
                        }
                        else if ($randSuite==4 && $randSuite!=$noSuite)
                        {
                            echo "<img src='cards/spades/".rand(1,12).".png' alt='card'>";
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            
        ?>
        
        
                                <table border="1" width="600">
                                    <tbody><tr>
                                        <th>#</th>
                                        <th>Task Description</th>
                                        <th>Points</th>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>1</td>
                                        <td>The page includes the basic form elements as in the Program Sample: Text boxes, Dropdown menu, submit button</td>
                                        <td width="20" align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>2</td>
                                        <td>When submitting the form, an error message is displayed if the product of columns and rows exceeds 39</td>
                                        <td width="20" align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>3</td>
                                        <td>When submitting the form, a table is created with random playing cards</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>4</td>
                                        <td>The size of the table corresponds to the one selected by the user </td>
                                        <td align="center">10</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>5</td>
                                        <td>The cards are NOT duplicated </td>
                                        <td align="center">10</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>6</td>
                                        <td>No cards of the suit selected by the user are displayed in the game </td>
                                        <td align="center">10</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>7</td>
                                        <td>The Aces have a yellow background</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>8</td>
                                        <td>The Kings have a cyan background</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>9</td>
                                        <td>The total number of Aces and Kings are displayed</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>10</td>
                                        <td>A message indicates who won, Aces or Kings, (or neither) </td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>11</td>
                                        <td>At least five CSS rules are included</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#99E999">
                                        <td>12</td>
                                        <td>This rubric is properly included AND UPDATED (BONUS)</td>
                                        <td width="20" align="center">2</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>T O T A L </td>
                                        <td width="20" align="center"><b></b></td>
                                    </tr>
                                </tbody></table>
                            
    </body>
</html>