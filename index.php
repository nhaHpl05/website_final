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
    <h1 id="main_h1">Welcome to our homepage!</h1>
    <img  id="index_image" src="images/index_image.jpg"  alt="Pears Ochard" >

</div> <!-- wrapper -->

<?php include('includes/footer.php');
?>