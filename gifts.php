<?php


require "Database.php";
$config = require ("config.php");

$db = new Database($config["database"]);


$posts=$db->query("SELECT * FROM gifts")-> fetchALL();

echo "<ol>";
foreach($posts as $🤣){
    
    echo "<li>" . $🤣 ["name"]. "  ".$🤣 ["count_available"].  "</li>";
    
    
}
echo "</ol>";



