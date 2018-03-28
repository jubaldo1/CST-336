 <?php
    include 'DBConnection.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Phancy Phoods </title>
    </head>
    <body>
    <div>
        <form action="index.php" method="post">
            <b>Recipe Name:</b> <input type="text" name="name">
            <br> </br>
            <b>Author</b> <input type="text" name="author">
            <br> </br>
            <b>Type:</b> <input type="text" name="type">
            <br> </br>
            <b>Availability:</b>
            <input type="submit" name="Submit">
        </form>
        
    </div>
    
    <?php
        include 'inc/functions.php';
    ?>

    <table border = "1">
        <tr>
            <td border><b>Recipe Name</b></td>
        </tr>
           
        <div>
            <?php
             $dbConn = getDataBaseconnection("Recipes");
                $name = "";
                
                // if name has info
                if (isset($_POST['name']))
                {
                    $name  = $_POST['name'];
                }
                
                $sql = "SELECT * FROM `Recipe`
                        WHERE name LIKE '%$name%'";
                
                // the ` symbol is needed for the SELECT,
                // * is for selecting EVERYTHING
                $stmt = $dbConn->prepare($sql);
                $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
                //print_r ($records);

                // the above statement has been replaced by the below
                // for each record, find the name
                // Python dictionary style
                foreach($records as $record){
                    echo "<tr>" . "<td>" . $record['name'] . "</td>" . "</tr>";
                }
            ?>
        </div>
        </table>
    </body>
</html>