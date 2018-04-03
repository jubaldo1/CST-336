<?php 
    include 'DBConnection.php'; 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Program Practice 2</title>
    </head>
    <body>
        <?php
            $conn = getDataBaseconnection('midterm_Pract');
            
            echo "<b>Population prob:<br></b>";
            
            $sql = "SELECT * FROM `mp_town`
                    WHERE population 
                    BETWEEN 50000 AND 80000";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
            foreach($records as $record)
            {
                echo $record['town_name'] . " " . $record['population'] . "<br>";
            }
            
            echo "<br><b>County and Order:</b><br>";
            
            $sql = "SELECT *
                    FROM `mp_town`
                    LEFT JOIN `mp_county` ON mp_town.county_id = mp_county.county_id
                    ORDER BY mp_town.population DESC";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
            foreach($records as $record)
            {
                echo $record['town_name'] 
                . " " 
                . $record['county_name'] 
                . " " 
                . $record['population'] 
                . "<br>";
            }
            
            echo "<br>County and Population:<br></b>";
            
            $sql = "SELECT SUM(population) as sum, mp_county.county_name FROM `mp_town`
                    LEFT JOIN `mp_county`
                    ON mp_town.county_id = mp_county.county_id
                    GROUP BY mp_county.county_name";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
            foreach($records as $record)
            {
                echo $record['sum'] . " " . $record['county_name'] . "<br>";
            }
            
            echo "<br><b>State</b><br>";
            
            $sql = "SELECT SUM(population) as sum, state_name FROM mp_town
                    LEFT JOIN mp_county
                    ON mp_town.county_id = mp_county.county_id
                    LEFT JOIN mp_state
                    ON mp_county.state_id = mp_state.state_id
                    GROUP BY state_name";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($records as $record)
            {
                echo $record['sum'] . " " . $record['state_name'] . "<br>";
            }
            
            echo "<br><b>Least Pop:</b><br>";
            
            $sql = "SELECT * FROM mp_town
                    ORDER BY population ASC
                    LIMIT 3";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($records as $record)
            {
                echo $record['town_name'] . " " . $record['population'] . "<br>";
            }
            
            echo "<br><b>County w/o a Town:</b><br>";
            
            $sql = "SELECT DISTINCT mp_county.county_name FROM mp_county
                    WHERE mp_county.county_id NOT IN (SELECT county_id FROM mp_town)";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($records as $record)
            {
                echo $record['county_name'] . "<br>";
            }
        ?>
    </body>
</html>