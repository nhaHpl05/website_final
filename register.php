<?php 
// My Register page - a simple form -- pointing to the srver.php
// our fields
//firstName
//lastName
//email
//user
//password

include('server.php');
include('includes/header.php');
//inlcude('footer.php');

?>
<h1 class="center"> Register Today</h1>
<form  class="register_login_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post">
  <fieldset>
      <label>Fisrt Name</label>
      <input type="text" name="firstName" value="<?php if(isset($_POST['firstName'])) echo htmlspecialchars($_POST['firstName'])  ;?>">
      
      <label>Last Name</label>
      <input type="text" name="lastName" value="<?php if(isset($_POST['lastName'])) echo htmlspecialchars($_POST['lastName'])  ;?>">
      
       <label>Email</label>
      <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email'])  ;?>">
      
       <label>User Name</label>
      <input type="text" name="userName" value="<?php if(isset($_POST['userName'])) echo htmlspecialchars($_POST['userName'])  ;?>">
      
      <label>Your Password</label>
      <input type="password" name="password_1">
      
      <label>Confirm Password</label>
      <input type="password" name="password_2">
      
      <button type="submit" class="btn" name="reg_user">Register</button>
      
      <button type="button" class="btn_reset" onclick="window.location.href='<?php echo htmlspecialchars($SERVER['PHP_SELF'])  ;?>'" >Reset </button>
      
      <?php include('includes/errors.php') ;?>
  </fieldset>
    
</form>

<p class="bottom"><a href="login.php">Already a Member? Please Login!</a></p>

</div> <!-- end wrapper -->
<?php
include('includes/footer.php');
