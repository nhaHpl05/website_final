<?php // index.php page, that can only reached if you login in!!

session_start();
include('config.php');
include('includes/header.php');
?>

<?php
//Notification message
if(isset($_SESSION['success'])) :?>
<div class="success">
<h3>
 <?php echo $_SESSION['success'] ;
    unset($_SESSION['success']) ;
    ?>  
</h3>
 </div>
    <?php endif; ?>
    

    <h1>Welcome to our homepage!</h1>

</div> <!-- wrapper -->

<?php include('includes/footer.php');
?>