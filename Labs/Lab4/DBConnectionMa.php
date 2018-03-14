<?php
function getDataBaseconnection($opt){
    $connParts = parse_url($url);
    
    $host = $connParts['host'];
    $dbname = ltrim($connParts['path'],'/');         // database connection, name of database assigned to name
    $username=$connParts['user'];
    $password=$connParts['pass'];           // blank b/c no password
    
    $connUrl = getenv('JAWSDB_MARIA_URL');
//$connUrl = "mysql://j4dca6gxki2p2a7s:puwg05o53pi5g1r0@p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/hllilhmqaqrauk1m";
$hasConnUrl = !empty($connUrl);

$connParts = null;
if ($hasConnUrl) {
    $connParts = parse_url($connUrl);
}

//var_dump($hasConnUrl);
$host = $hasConnUrl ? $connParts['host'] : getenv('IP');
$dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'tech_checkout';
$username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
$password = $hasConnUrl ? $connParts['pass'] : '';

return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
?>