<?php

include 'DBConnection.php';

$conn = getDataBaseconnection("tech_checkout");

$sql = "SELECT * from `device`";   // the ` symbol is needed for the SELECT,
                                    // * is for selecting EVERYTHING
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchALL(PDO::FETCH_ASSOC);

//print_r ($records);

// the above statement has been replaced by the below
// for each record, find the name
// Python dictionary style
foreach($records as $record){
    echo $record['deviceName'] . "<br>";
}
?>