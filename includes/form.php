

<form class="form-style" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post">
  <fieldset>
    <label>First Name</label>
    <input type ="text" name="firstName" value="<?php if(isset($_POST['firstName'])) echo htmlspecialchars($_POST['firstName']) ;?>">
    <span><?php echo $firstNameErr ;?></span>
      
    <label>Last Name</label>
    <input type="text" name="lastName" value="<?php if(isset($_POST['lastName'])) echo htmlspecialchars($_POST['lastName']) ;?>">
    <span><?php echo $lastNameErr ;?></span>
      
    <label>Email</label>
    <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']) ;?>">
    <span><?php echo $emailErr ;?></span>
      
    <label>Phone Number</label>
    <input type="tel" placeholder="xxx-xxx-xxxx" name="phone" value="<?php if(isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']) ;?>">
    <span><?php echo $phoneErr ;?></span>
    
    <label>Your favorite colors</label>
    <ul>
        <li><input type="checkbox" name="colors[]" value="red" <?php if(isset($_POST['colors']) && (in_array("red", $colors)) ) echo 'checked' ;?>>Red</li>
        <li><input type="checkbox" name="colors[]" value="blue" <?php if(isset($_POST['colors']) && in_array('blue', $colors)) echo 'checked' ;?>>Blue</li>
        <li><input type="checkbox" name="colors[]" value="yellow" <?php if(isset($_POST['colors']) && in_array('yellow', $colors)) echo 'checked' ;?>>Yellow</li>
        <li><input type="checkbox" name="colors[]" value="black" <?php if(isset($_POST['colors']) && in_array('black', $colors)) echo 'checked' ;?>>Black</li>
        <li><input type="checkbox" name="colors[]" value="white" <?php if(isset($_POST['colors']) && in_array('white', $colors)) echo 'checked' ;?>>White</li>
        <li><input type="checkbox" name="colors[]" value="green" <?php if(isset($_POST['colors']) && in_array('green', $colors)) echo 'checked' ;?>>Green</li>
    </ul>
    <span><?php echo $colorsErr ;?></span>
      
    <label>What flower do you like</label>
    <select name="flower">
    <option value="NULL" <?php if(isset($_POST['flower']) && $_POST['flower'] == 'NULL') echo 'unselected' ;?>>Select one</option> 
    <option value="rose"  <?php if(isset($_POST['flower']) && $_POST['flower'] == 'rose') echo 'selected' ;?>>Rose</option>
    <option value="gerbera" <?php if(isset($_POST['flower']) && $_POST['flower'] == 'gerbera') echo 'selected' ;?>>Gerbera</option>
    <option value="tulip" <?php if(isset($_POST['flower']) && $_POST['flower'] == 'tulip') echo 'selected' ;?>>Tulip</option>
    <option value="lily" <?php if(isset($_POST['flower']) && $_POST['flower'] == 'lily') echo 'selected' ;?>>Lily</option>
    <option value="orchid" <?php if(isset($_POST['flower']) && $_POST['flower'] == 'orchid') echo 'selected' ;?>>Orchid</option>    
    </select>
    <span><?php echo $flowerErr ;?></span>  
      
    <label>Agree To Send</label>
    <ul>
        <li><input type="radio" name="agree" value="agree" <?php if(isset($_POST['agree']) && $_POST['agree'] == 'agree') echo 'checked' ;?>></li> 
    </ul>
    <span><?php echo $agreeErr ;?></span>
      
    <input type="submit" value="Submit">
    <p><a href="">Reset</a></p>
  </fieldset>      
</form>