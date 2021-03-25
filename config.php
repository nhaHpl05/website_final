<?php // config.php file

// this will be
ob_start(); //prevents header errors before reading the whole page!
date_default_timezone_set('America/Los_Angeles');


// display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//ends displays php errors 

define('DEBUG', 'TRUE');
include('credentials.php');

function myError($myFile, $myLine, $errorMsg) {
    
    if(defined('DEBUG') && DEBUG){
     echo 'Error in file: <b> '.$myFile.' </b> on line: <b> '.$myLine.' </b>';
          echo 'Error message: <b> '.$errorMsg.'</b>';
          die();
    } else {
          echo ' Houston, we have a problem!';
          die();
    }
    
    
} // close function myError

define ('THIS_PAGE', basename($_SERVER['PHP_SELF'])); 
$nav['index.php']= 'Home';
$nav['about.php']= 'About';
$nav['daily.php']= 'Daily';
$nav['product-list.php']= 'Products';
$nav['contact.php']= 'Contact';

switch(THIS_PAGE) {
        
    case 'index.php':
        $title = 'Home page of our Final Project';
        $body = 'index';
        $footer = 'index';
                break;
        
    case 'about.php':
        $title = 'About page of our Final Project';
        $body = 'about';
        $footer = 'about';
                break;
        
    case 'daily.php':
        $title = 'Daily page of our Final Project';
        $body = 'daily';
        $footer = 'daily';
                break;
        
    case 'product-list.php':
        $title = 'Product page of our Fianl Project';
        $body = 'product-list';
        $footer = 'product-list';
                break;
        
    case 'contact.php':
        $title = 'Contact page of our Final Project';
        $body = 'contact';
        $footer = 'contact';
                break;
     
    // login.php and register.php
    case 'login.php':
        $title = 'Login page of our Final Project';
        $body = 'login';
        $footer = 'login';
                break;
        
    case 'register.php':
        $title = 'Register page ';
        $body = 'register';
        $footer = 'register';
                break;
    // end login.php and register.php
        
    default:
        $title = '';
}

// creating header nav function
function makeLinks($nav) {
    $myReturn = '';
    foreach($nav as $key => $value) {
        if(THIS_PAGE == $key) {
            $myReturn .= '<li><a class="active" href="'.$key. '">' .$value. '</a> </li>';
        } else {
            $myReturn .= '<li><a href="'.$key. '">' .$value. '</a> </li>';
        } // end else       
    } // end foreach
    return $myReturn;  
}

// form.php page

$fisrtName = '';
$lastName = '';
$email = '';
$phone = '';
$colors = '';
$flower = '';
$agree = '';

$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
$phoneErr = '';
$colorsErr = '';
$flowerErr = '';
$agreeErr = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (empty($_POST['firstName'])) {
        $firstNameErr = 'Please enter your first name';
    }
    
    if (empty($_POST['lastName'])) {
        $lastNameErr = 'Please enter your last name';
    }
    
    if (empty($_POST['email'])) {
        $emailErr = 'Please fill in your email';
    }
    
    if (empty($_POST['phone'])) {
        $phoneErr = 'Please fill in your phone number';
        
    } elseif (array_key_exists('phone', $_POST)){
       
       if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone'])) { // if phone input is not in xxx-xxx-xxxx format
            $phoneErr = 'Invalid format!';
        } else{
            $phone = $_POST['phone'];
        }
    }
    
    if (empty($_POST['colors'])) {
        $colorsErr = 'You can choose at least one color!';
    } else {
        $colors = ($_POST['colors']);
    }
    
    if ($_POST['flower'] == 'NULL') {
        $flowerErr = 'You could pick one flower option!';
    }
    
    if
        (empty($_POST['agree'])) {
        $agreeErr = 'Please click agree before submit';
    }
    
    function pickColors() {
        $colorsReturn = '';
        // if colors array is not empty, implode it
        
        if(!empty($_POST['colors'])) {
            $colorsReturn = implode(', ', $_POST['colors']);
        } return $colorsReturn;
    } // close function
    
    
     if (!empty($_POST['firstName']) &&
         !empty($_POST['lastName']) &&
         !empty($_POST['email']) &&
         !empty($_POST['phone']) &&
         !empty($_POST['colors']) &&
         ($_POST['flower'] != 'NULL') &&
         !empty($_POST['agree']) ) {
         
         $firstName = ($_POST['firstName']);
         $lastName = ($_POST['lastName']);
         $email = ($_POST['email']);
         $phone = ($_POST['phone']);
         $flower = ($_POST['flower']);
         $agree = ($_POST['agree']);
         
         $to = 'olga.szemetylo@seattlecolleges.edu';
         $subject = 'Email from user ' .date('m/d/y');
         $body = 'First and last name: ' .$firstName. ' ' .$lastName. '' .PHP_EOL.
         'Email: ' .$email. PHP_EOL.
         'Phone: ' .$phone. PHP_EOL.
         'Favorite colors: ' .pickColors() .PHP_EOL. 
         'Favorite flower: ' .$flower . '';
         
         $headers = array(
            'From' => 'no-reply@aegis.dreamhost.com',
            'Reply-to' => '' .$email. '');
         
         mail($to, $subject, $body, $headers);
         header('Location:thx.php');
     }
} //end request_method
// end form.php

