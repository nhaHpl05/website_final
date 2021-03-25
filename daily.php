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
        $tree = 'Monday is Aloe Vera day';
        $pic = 'aloe-vera.jpg';
        $alt = "Aloe Vera Plant";
        
        $content = 'Aloe Vera plant usually grows to a height of about 12 to 16 inches. It has thick and fleshy leaves with sharp edges but does not have a stem. Long leaves are mainly in triangular fashion inside which contains the aloe vera gel. It grows in sandy soil in a sunny location though need to be watered on a regular basis. Aloe Vera is useful to hair to remove dandruff and the itchy effect. Though they are essential in cosmetic products, they are equally important to the food industry.<br><br>
        <b>Source:</b><br>
        <a href="https://stylesatlife.com/articles/types-of-trees/">Styles at life.com </a>';
        
        $body = 'lightsalmon';
            break;
        
        case 'Tuesday';
        $tree = 'Tuesday is Tulsi day';
        $pic = 'tulsi.png';
        $alt = "Tulsi Plant";
        $content = 'Tulsi plant is considered as a holy and religious plant in India. Height reaches about 75 cm to 90 cm. The leaves are round oval shaped which contain essential oils. It has high medicinal value. It provides relief in fever, cold and cough, effective against insomnia, indigestion, etc.<br><br>
        <b>Source:</b><br>
        <a href="https://stylesatlife.com/articles/types-of-trees/">Styles at life.com </a>';
        $body = 'coral';
            break;
        
        case 'Wednesday';
        $tree = 'Wednesday is Oak day';
        $pic = 'oak.jpg';
        $alt = "Oak Tree";
        
        $content = 'Oaktree falls under the group of flowering plants. There are different types of oak trees present in nature. It has simply spirally arranged leaves. Some leaves have lobate margins and others have serrated leaves or have smooth margins. The bark of the white oak tree is usually dried and used for medical purposes. Manuscript inks were previously made from oak galls for many centuries. The bark of cork oak is used as a bottle stopper. The wood of this tree is used as valuable timber.<br><br>
        <b>Source:</b><br>
        <a href="https://stylesatlife.com/articles/types-of-trees/">Styles at life.com </a>';
        
        $body = 'powderblue';
            break;
        
        case 'Thursday';
        $tree = 'Thursday is Amla day';
        $pic = 'amla.jpg';
        $alt = "Amla Plant";
        
        $content = 'Amlaki’ is the household name very commonly used for amla. This type of tree is a medium deciduous plant of height about 8-18 meters. Spreading branches and crooked trunk are the prominent features of this plant. Feathery and linear-oblong shaped leaves mostly smell like lemon. In extreme heat, it wraps and splits. Amla is highly rich in Vitamin C, thus used in common cold. This improves the immunity of our body and is useful for healthy hair. Other than that, amla is used in shampoo and many food items like jellies, pickle, etc.<br><br>
        <b>Source:</b><br>
        <a href="https://stylesatlife.com/articles/types-of-trees/">Styles at life.com </a>';
        
        $body = 'papayawhip';
            break;
        
        case 'Friday';
        $tree = 'Friday is Tulip day';
        $pic = 'tulip.png';
        $alt = "Tulip Tree";
        $content = 'Indian Tulip is found in lower dry to wet forest. The height of Indian tulip tree is usually more than 40 feet. The flowers are cup shaped and the leaves are of heart shaped. This evergreen tree is very fast growing. Main branches of the tulip tree grow in straight along with thick bark. As the tree gets older it thins out, though it was bushy while it was young. Flowers, fruits and the young leaves are edible. Timber is used for making paper, paddles and also used to make gums and oils. Leaves are also used for swollen joints.<br><br>
        <b>Source:</b><br>
        <a href="https://stylesatlife.com/articles/types-of-trees/">Styles at life.com </a>';
        $body = 'sandybrown';
            break;
        
        case 'Saturday';
        $tree = 'Saturday is Turmeric day';
        $pic = 'turmeric.png';
        $alt = "Turmeric Plant";
        
        $content = 'The other commonly used name, colloquially used, is Haldi. It is also called Indian saffron and is widely cultivated in India. The stem of the turmeric plant is very short which is of 60-90 cm. Flowers are of yellow-white and pink. It is highly antiseptic, thus, it is used for internal injuries, wound, pimples, etc. It acts as a remedy for cold and cough and also given in jaundice.<br><br>
        <b>Source:</b><br>
        <a href="https://stylesatlife.com/articles/types-of-trees/">Styles at life.com </a>';
        
        $body = 'chocolate';
            break;
        
        case 'Sunday';
        $tree = 'Sunday is Maple day';
        $pic = 'maple.jpg';
        $alt = "Maple";
        
        $content = 'Maple is a common type of shrub. There are as many as 125 species of maple trees which are present in nature. The main types of maple trees are sugar maple, red maple, silver maple, Japanese maple, Norway maple and paperbark maple. The trees are deciduous trees which mean they lose their leaves in each fall but some are there that do not shed the leaves. Canadian flag depicts a maple leaf on it. It is used as an art of bonsai and is extensively used as an ornamental tree due to its different vibrant colours.<br><br>
        <b>Source:</b><br>
        <a href="https://stylesatlife.com/articles/types-of-trees/">Styles at life.com </a>';
        
        $body = 'mistyrose';
            break;       
        
}

//end daily.php test

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
    </div>
    <h1>Welcome my daily page!</h1>
    <?php
    if ($todayDate <= 11) {
    echo 'Good Morning!<br>';
    echo '<br>';
    }

    elseif($todayDate <= 15) {
        echo 'Good Afternoon!<br>';    
    }

    else {
        echo 'Good Evening<br>';
    } 
      
    echo $tree;
        
    ?> 
    <p class="content_text"><?php echo $content; ?></p>
</main>
<aside>
<h3>Daily content</h3> <br>
      <ul class="style-daily">
        <li> <a href="daily.php?today=Monday">Monday</a></li>
        <li> <a href="daily.php?today=Tuesday">TuesDay</a></li>
        <li> <a href="daily.php?today=Wednesday">Wednesday</a></li>
        <li> <a href="daily.php?today=Thursday">Thursday</a></li>
        <li> <a href="daily.php?today=Friday">Friday</a></li>
        <li> <a href="daily.php?today=Saturday">Saturday</a></li>
        <li> <a href="daily.php?today=Sunday">Sunday</a></li>
</aside>
</div> <!-- wrapper -->

<?php include('includes/footer.php');
?>