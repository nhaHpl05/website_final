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
<main>
    <?php
    //Notification message
    if(isset($_SESSION['success'])) :?>
    <div class="success">
        <h3>
        <?php echo $_SESSION['success'] ;
        unset($_SESSION['success']) ;
        endif; ?>  
        </h3>
    </div> <!-- end success -->
    <h1>Welcome my about page!</h1>
    <h2>SQL Table of Registered Users </h2>
    <a href="images/users_table.png"><img  id="about_image" src="images/users_table.png"  alt="User Table" ></a>
</main>
<aside>
<h3> this is my aside</h3>
</aside>
</div> <!-- wrapper -->

<?php include('includes/footer.php');
?>