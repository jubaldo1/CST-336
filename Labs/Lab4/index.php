 <?php
    include 'DBConnection.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Home Page </title>
    </head>
    <body>
        <div>
            <form action="index.php" method="post">
                <!--need name, type, availability, create table-->
                <b>Name:</b> <input type="text" name="name">
                <b>Type:</b> <input type="text" name="type">
                <b>Availability:</b>
                <input type="radio" name="avail" value="available"> Yes 
                <input type="radio" name="avail" value="checkedout"> No
                <b>Order by:</b> 
                <input type="radio" name="order" value="deviceName"> Name
                <input type="radio" name="order" value="price"> Price
                <br>
                <input type="submit" name="Submit">
            </form>
        </div>
        
        <div>
            <?php
                $conn = getDataBaseconnection("tech_checkout");
                
                
                $name = "*";
                $type = "*";
                $avail1 = "*";
                $avail2 = "*";
                $order = "*";
                
                // if name has info
                if (isset($_POST['name']))
                {
                    $name  = $_POST['name'];
                }
                if (isset($_POST['type']))
                {
                    $type  = $_POST['type'];
                }
                if (isset($_POST['avail']))
                {   // also check out 
                    $avail1 = $_POST['avail'];
                    $avail2 = 'checkout';
                }
                if (isset($_POST['order']))
                {
                    $order = $_POST['order'];
                }
                
                // use 
                /*$sql = "SELECT * from `device`
                WHERE (status
                LIKE '$avail1' OR status LIKE '$avail2')
                OR deviceType 
                LIKE '$type'";
                //deviceName 
                //LIKE '$name'"; 
                //*/ 
                
                $sql = "SELECT * from `device`
                WHERE (status LIKE '$avail1' OR status LIKE '$avail2')
                AND
                (deviceType LIKE '$type')
                AND
                (deviceName LIKE '$name')
                ORDER BY $order DESC";
                
                //OR
                //((status LIKE '$avail1' OR status LIKE '$avail2')
                //AND deviceType LIKE '$type')";
                //OR
                //((status LIKE '$avail1' OR status LIKE '$avail2')";
                ////OR deviceType LIKE '$type'))";
                
                // the ` symbol is needed for the SELECT,
                // * is for selecting EVERYTHING
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
                //print_r ($records);

                // the above statement has been replaced by the below
                // for each record, find the name
                // Python dictionary style
                foreach($records as $record){
                echo $record['deviceName'] . " " . $record['deviceType'] 
                . " " . $record['status'] . " " . $record['price'] ."<br>";
                }
            ?>
        </div>
    </body>
</html>