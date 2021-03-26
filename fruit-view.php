<?php
session_start();
include('config.php');
include('includes/header.php');

?>

    <main id="our_main_style">
      <?php
      if(isset($_GET['id'])){
          $id = (int)$_GET['id'];

        } else {
          header('Location:fruits_list.php');
      }
      
      $sql = 'SELECT * FROM fruitTable WHERE fruitId = ' .$id. '';
        
      $iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error())); 
        
      $result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));
      
      if (mysqli_num_rows($result) > 0) {
          
          while($row = mysqli_fetch_assoc($result)) {
              $fruitName = stripslashes($row['fruitName']);
              $season = stripslashes($row['seasonAvailable']);
              $nutrition = stripslashes($row['nutritionValue']);
              $description = stripslashes($row['description']);
              $feedback = '';
              
              
          } // close while loop
          
      } else {
          $feedback = 'We working on our page!';
          
      } // close else
     ?>
     <h1><?php echo $fruitName ?>'s page</h1>   
     <?php
      if($feedback == '') {
          echo '<ul>';
          echo '<li><b>Name:</b> ' .$fruitName. '</li>';
          echo '<li><b>Season Available:</b> ' .$season. ' </li>';
          echo '<li><b>Description:</b> ' .$description. '</li>';
          echo '</ul>';
          echo '<p><a href="fruits_list.php"> Return to the Fruits page.</a></p>';
      } else {
          echo $feedback;
      }
       
       // releasing the web server
       mysqli_free_result($result);

       // close the connection
       mysqli_close($iConn);
        
      ?>
        
    </main> 

    <aside >
      <div class="aside_div_box">
      <?php
         if($feedback == '') {
            echo ' <img id="smaller_image" src="images/fruit' .$id. '.jpg" alt="' .$fruitName. '">';
            echo '<p><b>Nutrition Values:</b> ' .$nutrition. '</p>';
         }
      ?>
      </div>
    </aside>
      
  </div> <!-- end wrapper--> 
    
<?php 
    include('includes/footer.php'); ?>