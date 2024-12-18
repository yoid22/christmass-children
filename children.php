<?php
require "Database.php";
$config = require ("config.php");

$db = new Database($config["database"]);

$labor = $db->query("SELECT * FROM children")->fetchAll();
$sigma = $db->query("SELECT * FROM letters")->fetchAll();
$gift = $db->query("SELECT * FROM gifts")->fetchAll();
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f0f8ff; /* Light blue background for wintery look */
      color: #333;
      margin: 0;
      padding: 0;
      background-image: url('https://www.transparenttextures.com/patterns/wood-pattern.png'); /* Subtle texture */
      background-repeat: repeat;
    }
    h2 {
      text-align: center;
      color: #b22222; /* Christmas Red */
      font-size: 40px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 40%;
      margin: 20px auto;
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      border: 2px solid #228b22; /* Christmas Green border */
      background-image: linear-gradient(to bottom right, #ffebcd, #ffcc99); /* Subtle gradient */
    }
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
      transform: scale(1.05);
    }
    .container {
      padding: 10px 20px;
      background-color: #f8f8f8;
      text-align: center;
    }
    ul {
      list-style-type: none;
      padding: 0;
    }
    li {
      font-size: 18px;
      color: #333;
      margin: 10px 0;
    }
    .emoji {
      font-size: 24px;
      margin: 0 10px;
    }
    .snowfall {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
    }
    .snowflake {
      position: absolute;
      top: -10px;
      opacity: 0;
      font-size: 24px;
      animation: fall 10s linear infinite;
    }
    @keyframes fall {
      0% {
        top: -10px;
        opacity: 1;
      }
      100% {
        top: 100%;
        opacity: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Snowfall Effect -->
  <div class="snowfall">
    <?php for ($i = 0; $i < 50; $i++) { ?>
      <span class="snowflake">❄️</span>
    <?php } ?>
  </div>

  <h2>🎄🎅 Merry Christmas! 🎅🎄</h2>

  <?php
  foreach ($labor as $🤣) {
    
    ?>
    <div class="card">
      <div class="container">
        <?php
        
        echo "<ul>";
        echo "<li><strong>Name:</strong> " . $🤣["firstname"] . " " . $🤣["middlename"] . " " . $🤣["surname"] . " 🎁</li>";
        echo "<li><strong>Age:</strong> " . $🤣["age"] . " 🎅</li>";
       
        echo "</ul>";

        foreach ($sigma as $🤦‍♀️) {
          if ($🤣["id"] == $🤦‍♀️["sender_id"]) {


          $letter_text = $🤦‍♀️["letter_text"];

          $presents = explode(":", $letter_text);
          $presents = explode(",", $presents[sizeof($presents) - 1]);

          foreach ($presents as $present) {
            $trimmedGift = trim($present);
            $letter_text = str_replace($trimmedGift, "<strong>$trimmedGift</strong>", $letter_text);
        }

            echo "<ul><li><strong>Letter:</strong> " . $letter_text . " 😜</li></ul>";
            foreach ($gift as $gifts) {
              
               if(str_contains($🤦‍♀️["letter_text"],  strtolower($gifts["name"]) )){
                echo "<li><strong>Present:</strong> " . $gifts["name"] . " 😁</li>"; 
               } 
               
               }
          }
        }
       
        ?>
      </div>
    </div>
    <?php

}
  ?>

</body>
</html>

<script>
  // Snowfall animation setup
  document.querySelectorAll('.snowflake').forEach((snowflake, index) => {
    let positionX = Math.random() * window.innerWidth;
    let animationDuration = Math.random() * 5 + 5; // Random between 5s and 10s
    let animationDelay = Math.random() * 5; // Random delay
    snowflake.style.left = `${positionX}px`;
    snowflake.style.animationDuration = `${animationDuration}s`;
    snowflake.style.animationDelay = `${animationDelay}s`;
  });
</script>
