 <?php
    include 'DBConnection.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Home Page </title>
        <style type="text/css">
            @import url("css/styles.css");
        </style>
    </head>
    <body id = "body">
        <div>
            <form action="index.php" method="post">
                <!--need name, type, availability, create table-->
                <b>Name:</b> <input type="text" name="name">
                <b>Type:</b> <input type="text" name="type">
                <b>Availability:</b>
                <input type="radio" name="avail" value="available"> Yes 
                <input type="radio" name="avail" value="check"> No
                <b>Order by:</b> 
                <input type="radio" name="order" value="deviceName"> Name
                <input type="radio" name="order" value="price"> Price
                <br>
                <input type="submit" name="Submit">
            </form>
        </div>
        
        <table border = "1">
        
        <tr>
            <td border><b>Device Name</b></td>
            <td><b>Device Type</b></td>
            <td><b>Price</b></td>
            <td><b>Status</b></td>
        </tr>
           
        <div>
            <?php
                $conn = getDataBaseconnection("tech_checkout");
                
                
                $name = "";
                $type = "";
                $avail1 = "";
                //$avail2 = "";
                $order = "deviceName";
                
                // if name has info
                if (isset($_POST['name']))
                {
                    $name  = $_POST['name'];
                }
                if (isset($_POST['type']))
                {
                    $type  = $_POST['type'];
                }
                if (!empty($_POST['avail']))
                {   // also check out 
                    $avail1 = $_POST['avail'];
                    //$avail2 = 'checkout';
                }
                if (!empty($_POST['order']))
                {
                    $order = $_POST['order'];
                }
                
                $sql = "SELECT * FROM `device`
                        WHERE status LIKE '%$avail1%'
                        AND deviceName LIKE '%$name%'
                        AND deviceType LIKE '%$type%'
                        ORDER BY $order ASC";
                
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
                    echo '<tr>';
                    echo '<td>' . $record['deviceName'] . '</td>'
                     .   '<td>' . $record['deviceType'] . '</td>' 
                     .   '<td>' . $record['status']     . '</td>'
                     .   '<td>' . $record['price']      . '</td>';
                    echo '</tr>';
                }
            ?>
        </div>
        </table>
    </body>
</html>