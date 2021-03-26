<?php // server page, which will be communicating with our database!!! will be pointing to the config file
// session_start()
// mysqli_real_escape_string --- O'Brien 
// md5()

session_start();
include('config.php');
//initialize the variables
$firstName = '';
$lastName = '';
$email = '';
$userName = '';
$errors = array();
$success = 'You are now logged in!';


// connect tot the database!!!
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

// register the user

if(isset($_POST['reg_user'])) {
    // receive the information
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $userName = mysqli_real_escape_string($db, $_POST['userName']); 
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
    // array_push();
    
    if(empty($firstName)) {
        array_push($errors, 'First Name is required!');
        
    }
    
    if(empty($lastName)) {
        array_push($errors, 'Last Name is required!');
        
    }
    
    if(empty($userName)) {
        array_push($errors, 'User name is required!');
        
    }
    
    if(empty($email)) {
        array_push($errors, 'Email is required!');
        
    }
    
    if(empty($password_1)) {
        array_push($errors, 'Password is required!');
        
    }
    
    if($password_1 != $password_2) {
        array_push($errors, 'Passwords do not match!');
        
    }
    
// check if the username and email is already registered!!
    
    $user_check_query = "SELECT * FROM Users WHERE userName = '$userName' OR email = '$email' LIMIT 1";
    
    $result = mysqli_query($db, $user_check_query) or die(myError(__FILE__,__LINE__,mysqli_error($db)));
    
    $user = mysqli_fetch_assoc($result);
    
    if($user) {
        
        if($user['userName'] == $userName){
            array_push($errors, 'Username already exists'); 
        }
        
        if($user['email'] == $email){
            array_push($errors, 'Email already exists'); 
        }
            
    } // end user
    
    // if everything is okay and there are no errors, we need now need to insert data into the database
    
      if(count($errors) == 0) {
          $password = md5($password_1);
          
      
      
        $query = "INSERT INTO Users(firstName, lastName, email, userName, password) VALUES ('$firstName', '$lastName', '$email', '$userName', '$password')";
    
        mysqli_query($db, $query);
        
        $_SESSION['userName'] = $userName;
        $_SESSION['success'] = $success;
    
        header('Location:login.php');
        
      } // end count
    
} // close isset

if(isset($_POST['login_user'])) {
    // receive the information
    $userName = mysqli_real_escape_string($db, $_POST['userName']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if(empty($userName)) {
        array_push($errors, 'User name is required!!');
        
    }
    
    if(empty($password)) {
        array_push($errors, 'Password is required!!');
        
    }
    
    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM Users WHERE userName = '$userName' AND password = '$password' ";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['userName'] = $userName;
            $_SESSION['success'] = $success;
            
            header('Location:index.php');
            
            
        } else {
            array_push($errors, 'Username or password isn\'t correct');
            
        } // close else
        
    } // end count
   
    
} // end isset

