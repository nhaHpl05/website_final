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
<main id="about_main_style">   
    <h1>Welcome my about page!</h1>
    
    <?php include('includes/form.php'); ?>
    
</main>

</div> <!-- wrapper -->

<?php include('includes/footer.php');
?>