<?php // log in page will be poiting to the server.php page - username and password successfully!!!
include('server.php');
include('includes/header.php');

?>

<h1 class="center">Login Page!</h1>

<form class="register_login_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post">
<fieldset>
  <label>Username</label>
  <input type="text" name="userName" value="<?php if(isset($_POST['userName'])) echo htmlspecialchars($_POST['userName']) ;?>" >
  
  <label>Your Password</label>
  <input type="password" name="password">
  <?php
    include('includes/errors.php');
  ?>
    
   <button type="submit" class="btn" name="login_user">Login</button>
    
   <button type="button" class="btn_reset" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>'">Reset</button>
    
</fieldset>
</form>

<p class="bottom">Haven't Registered? <a href="register.php">Register Here!</a></p>

</div> <!-- end wrapper -->
<?php include('includes/footer.php');
?>
