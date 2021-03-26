<?php // index.php page, that can only reached if you login in!!

session_start();
include('config.php');

//########### start daily.php  #################
date_default_timezone_set('America/Los_Angeles');
$todayDate = date('H:i A'); //set to 12 hours clock

if( isset($_GET['today']) ) {
    $today = $_GET['today'] ;
}
else {
    $today = date('l');
}

switch($today) {
        
        case 'Monday';
        $title = 'We\'re Picking Soil for Our Tree on Monday';
        $pic = 'soil.jpg';
        $alt = "Good Soil";
        
        $content = 'Fruit trees grow best in well-drained soil with a sandy, loamy texture. They need at least 3 feet of topsoil to support their deep root systems. Heavy clay soils, overly rocky soils or soils lacking in nutrients can stunt tree growth. Also most fruit tree want a soil pH between 6.0 and 6.5. You can test your soil pH online or at gardening supply stores. 
        ';
        
        $body = 'lightsalmon';
            break;
        
        case 'Tuesday';
        $title = 'It\'s Tuesday, and We are Selecting Plant';
        $pic = 'select.jpg';
        $alt = "Plant Selecting";
        $content = 'We want to select a blueberries that have some natural resistance to disease.Another important thing is to get a plant that won\'t get damaged over the winter.Also consider bloom time. If your area is prone to late frosts, early bloomers in spring will never truly thrive or reliably set fruit.';
        $body = 'coral';
            break;
        
        case 'Wednesday';
        $title = 'We\'re Picking up our Blueberry Tree at the Store';
        $pic = 'plant.jpg';
        $alt = "Blueberry Tree";
        
        $content = 'We picked up a Continer-grown blueberry tree. It\'s available later in the spring, so the trees may not be able to establish tehmselves before the hottest part of summer. They are often rootbound within the pot, it\'s difficult to seperate for planting. But container grown fruit trees perform better for fall planting.';
        
        $body = 'powderblue';
            break;
        
        case 'Thursday';
        $title = 'We Choosing a Site to Plant our Blueberry Tree';
        $pic = 'hole.jpg';
        $alt = "Planting site";
        
        $content = 'We are choosing a site where there would be a minimum of 8 hours of sunlight daily for fruit trees to produce fruit, and it can also protect from strong winds. We need to dig a hole before planting, it\'s very important to dig the hole to fit the roots, don\'t force the roots to fit the hole!';
        
        $body = 'papayawhip';
            break;
        
        case 'Friday';
        $title = 'We Planting our Tree on Friday';
        $pic = 'instruction.jpg';
        $alt = "Plant Instruction";
        $content = 'We need a shovel or garden fork, tree support & ties, hammer, and fencing if we have animal in the area. For container-grown trees, we to carefully removed it from the pot. Shake out as much of the growing media as possible and spread the roots out as much as possible.<br> 
        <a href="images/instruction.jpg"> Click here for the instruction image</a>';
        $body = 'sandybrown';
            break;
        
        case 'Saturday';
        $title = 'We Learn about Blueberries on Saturday';
        $pic = 'blueberry.jpg';
        $alt = "A Blueberry Plant";
        
        $content = 'It takes blueberry three to four years to grow big enough to produce fruit. The number of months needed in a year for an established bush to produce berries depend on what type of bush you have planted. Climate also plays a role in the time it takes for the tree to produce berries. During the first one or two growing season, you should pull off any flowers to encourage your blueberry plant to concentrate on growth.';
        
        $body = 'chocolate';
            break;
        
        case 'Sunday';
        $title = 'It\'s Sunday, We\'re Waiting for our Blueberry Plant to Grow';
        $pic = 'blueberry.jpg';
        $alt = "Bluerry Branch";
        
        $content = 'We are resting and watch this man harvesting wild blueberries.<br>
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/Gd8fYewyiKk?start=13" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        
        $body = 'mistyrose';
            break;       
   
}

//end daily.php 

// login
if(!isset($_SESSION['userName'])) {
    $_SESSION['msg'] = 'You must login first';
    header('Location:login.php');
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userName']);
    header('Location:login.php');
}
// end login

include('includes/header.php');
?>
     
<main id="our_main_style">
    <h1>Welcome my daily page!</h1>
    <h2><?php echo $title ;?></h2>
    <p class="content_text"><?php echo $content; ?></p>
    
    <h3>Our Weekly Planting</h3> 
      <ul class="style-daily">
        <li> <a href="daily.php?today=Monday">Monday</a></li>
        <li> <a href="daily.php?today=Tuesday">TuesDay</a></li>
        <li> <a href="daily.php?today=Wednesday">Wednesday</a></li>
        <li> <a href="daily.php?today=Thursday">Thursday</a></li>
        <li> <a href="daily.php?today=Friday">Friday</a></li>
        <li> <a href="daily.php?today=Saturday">Saturday</a></li>
        <li> <a href="daily.php?today=Sunday">Sunday</a></li>
    </ul>
    
</main>
<aside>
 <div class="aside_div_box">
    <h3>Picture of the day</h3>   
     <img id="smaller_image" src="images/<?php echo $pic ;?>" alt="<?php echo $alt ;?>">
</div>   
</aside>
</div> <!-- wrapper -->
<?php include('includes/footer.php');
?>