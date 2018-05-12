<?php 
    include "DBConnection.php";
    $conn = getDataBaseConnection(`final`);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Time Slots</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="func.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>
    </head>
    <body>
        <script>
            display();
        </script>
        <form method="post" action="schedule.php">
            Start Date: <input type = "text" name="startDate"><br>
              End Date: <input type = "text" name="endDate"><br>
            Start Time: 
            <select name="startTime">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select><br>
            Number of Appointments: <select name="numOfAppt">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select><br>
            
            <input type="submit" name="submit" value="Add Times">
            <?php
                if (isset($_POST['startDate']))
                { $startDate = $_POST['startDate']; }
                if (isset($_POST['endDate']))
                { $endDate = $_POST['endDate']; }
            
                $sql = "INSERT INTO `Schedule` ('start_date', 'end_date')
                    VALUES ('$startDate', '$endDate')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                $sql="SELECT * FROM `Schedule`";
                
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
                foreach($records as $record){
                    echo $record['date'];
                }
            ?>    
        </form>
       
    </body>
</html>