<?php

require "Database.php";
$config = require ("config.php");

$db = new Database($config["database"]);

// SQL query to get the gifts along with the count of how many children want each gift
$sql = "
    SELECT g.name, g.count_available, COUNT(l.id) AS requests
    FROM gifts g
    LEFT JOIN letters l ON l.letter_text LIKE CONCAT('%', g.name, '%')
    GROUP BY g.id
";

$posts = $db->query($sql)->fetchAll();

echo "<ol>";
foreach ($posts as $gift) {
    $giftName = $gift["name"];
    $countAvailable = $gift["count_available"];
    $requests = $gift["requests"];

    echo "<li>" . $giftName . " - Prasa: " . $requests . " berni. ";

    // Check if the available count is sufficient
    if ($requests > $countAvailable) {
        echo "<strong style='color: red;'>Pietrukst!</strong>";
    } elseif ($requests < $countAvailable) {
        echo "<strong style='color: green;'>Pardaudz!</strong>";
    } else {
        echo "<strong style='color: orange;'>Precizi pietiekami!</strong>";
    }

    echo "</li>";
}
echo "</ol>";

?>