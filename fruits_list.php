<?php // index.php page, that can only reached if you login in!!

session_start();
include('config.php');

if(!isset($_SESSION['userName'])) {
    $_SESSION['msg'] = 'You must login first';
    header('Location:login.php');
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userName']);
    header('Location:login.php');
}

include('includes/header.php');
?>
<main id="fruits_list_main">
      <h1>Our Fruits Table</h1>
   <?php
   $sql = 'SELECT * FROM fruitTable';
   $iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));
     
   $result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));
   
   if (mysqli_num_rows($result) > 0) {
       
      while($row = mysqli_fetch_assoc($result)) {
          // this array is going to display the contents of your row!!!
          echo '<ul>';
          echo '<li><b>Fruit Name:</b> ' .$row['fruitName']. '<b></b></li>';
          echo '<li><b>Season Available:</b> ' .$row['seasonAvailable']. '<b></b></li>';
          echo '<li><b>Nutrition Values:</b> ' .$row['nutritionValue']. '</li>';
          echo '<li> For more information about <a href="fruit-view.php?id=' .$row['fruitId']. '">' .$row['fruitName']. '</a></li>';
          echo '</ul>';
          
      } // end while
       
   } else {
       
       echo 'Nobody home';
       
   } // close else
   
   // releasing the web server
   mysqli_free_result($result);
     
   // close the connection
   mysqli_close($iConn);
     
   ?>
</main>

</div> <!-- wrapper -->

<?php include('includes/footer.php');
?>