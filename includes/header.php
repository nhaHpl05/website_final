<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Temporary title</title>
<link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body class="<?php echo $body;?>">
 <!-- Add your containers header, nav div id wrapper, main, aside and footer -->
      
    <header>
      <a href="index.php"><img id="logo" src="images/logo.png"
        alt="logo"></a>  
      <nav>
        <ul>
         <?php
            echo makeLinks($nav); ?>      
          </ul>
        </nav>
         <?php if(isset($_SESSION['userName'])) :?>
            
            <div class="welcome_logout">
            <h3>
            <?php echo $_SESSION['userName'] ;?>
            </h3>
            <a href="index.php?logout='1'">Log out!</a>  
            </div>
        <?php endif ;?>
    </header>

<div id="wrapper">
    
