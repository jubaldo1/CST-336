<?php
include 'DBConnection.php';
try {
$conn = getDataBaseconnection('poll');

function getPollCount() {
    
}
$sql = "INSERT INTO dogs (vote)
    VALUES (3)";
    // use exec() because no results are returned
    $conn->exec($sql);
    
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
?>