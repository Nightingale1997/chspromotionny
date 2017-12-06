<?php
session_start();

require "encrypt.php";

require "connectDB.php";
$con = connect(); //Anropar och ansluter till db.

//Request 1 innebär en förfrågan om inloggning
if(isset($_POST['request']) &&  $_POST['request'] == 1){

$password = $_POST['password'];
//Kallar på encrypt funktionen för att kryptera lösenordet innan det kan jämnföras med databasen.
$password = encrypt($password);

$username = $_POST['username'];

//Väljer alla poster där lösenorder och användarnamn matchar inloggningen
$selectadmin = mysqli_query($con, "SELECT * FROM account WHERE password = '$password' AND username = '$username'");
	
//Ser hur många poster man hittat för båda nivåerna
 
        
   
$nradmin = mysqli_num_rows($selectadmin);
 

//om man hittat en post med den inloggningsinformationen som är ett admin account loggas man in som administratör och skickas tillbaka.  Misslyckade lög-in försök resettas. 
if($nradmin == 1)
{
    $data = mysqli_fetch_array($selectadmin);
    
	$_SESSION['username'] = $data['username'];
    $_SESSION['admin_login'] = 1;
    
}
    else{
         $_SESSION['admin_login'] = 0;
    }
}
 
//Request 2 innebär en förfrågan om tillägning av medarbetare
else if(isset($_POST['request']) &&  $_POST['request'] == 2){
    if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 1) 
{

        $imagePass = false;
         $namePass = false;
        $categoryPass = false;
        $nameTakenPass = false;
       
        
         if(is_uploaded_file($_FILES['pic']['tmp_name']))
  {
$imagePass = true;
             
  }
        
         if(isset($_POST['name']) &&  !empty($_POST['name'])){
             $name = $_POST['name'];
            $namePass = true;
             
             //Kollar om namnet redan finns
             $selectName = mysqli_query($con, "SELECT * FROM workers WHERE name = '$name'");
	
$nrName = mysqli_num_rows($selectName);
             
             if($nrName == 0){
                 $nameTakenPass  = true;
             }
             
        }
       
        
        if(isset($_POST['category']) && $_POST['category'] !== 0){
             $category = $_POST['category'];
           
            $categoryPass = true;
        }
       
    
            
            //Om alla obligatoriska fält är ifyllda skickas en förfrågan att lägga in informationen i databasen.
            if($categoryPass == true && $nameTakenPass == true && $imagePass == true){
            
                
                 
 
                $phone = "";
                $email = "";
                $position = "";
                
                 if(isset($_POST['phone']) &&  !empty($_POST['phone'])){
                  $phone = $_POST['phone'];
                 }
                    
                    if(isset($_POST['email']) &&  !empty($_POST['email'])){
                  $email = $_POST['email'];
                 }
                       
                       if(isset($_POST['position']) &&  !empty($_POST['position'])){
                  $position = $_POST['position'];
                 }
                
                mysqli_query($con, "INSERT INTO workers (name, category, phone, email, position) VALUES ('$name','$category','$phone','$email','$position')");
                          
                $selectNew = mysqli_query($con, "SELECT * FROM workers WHERE name = '$name'");
                
                $data = mysqli_fetch_array($selectNew);
                
                
                
          //Ladda upp bild
                    
    $path = "assets/img/team/";
    $path = $path . $data['workerid'].".jpg";
    
    move_uploaded_file($_FILES['pic']['tmp_name'], $path);
               
  
            
                          }
       
        
 

}
}
                          

?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="">
        <meta name="author" content="">
        <title>CHS Promotion</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <!-- Styles -->
        <link rel='stylesheet' href='assets/css/bootstrap.min.css'>
        <link rel='stylesheet' href='assets/css/animate.min.css'>
        <link rel='stylesheet' href="assets/css/font-awesome.min.css" />
        <link rel='stylesheet' href="assets/css/style.css" />
			<link rel="stylesheet" type="text/css" href="assets/css/default.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<script src="assets/js/modernizr.custom.js"></script>

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

        <!-- Favicon -->
        <link rel="shortcut icon" href="#">
        <link href='https://fonts.googleapis.com/css?family=Raleway:300,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/mapstyle.css" type="text/css" media="all">
        <script src="assets/js/modernizr.js"></script>
    </head>

    <body>

        <!-- Begin Hero Bg -->



        <!-- End Hero Bg
	================================================== -->
        <!-- Start Header
	================================================== -->
        <header id="header" class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <!-- Your Logo -->
                    <a href="index.html" class="navbar-brand"> <img src="assets/img/Officiell%20logga%20CSP.jpg"></a>
                </div>
                <!-- Start Navigation -->
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">




                    <ul class="nav navbar-nav">




                        <li class="active">
                            <a href="index.html">Hem</a>
                        </li>

                    </ul>


                    <ul class="nav navbar-nav">

                        <li class="navbarseparator">
                            <div>
                                |
                            </div>
                        </li>


                        <li class="active">
                            <a href="students.html">Studenter</a>
                        </li>
                        <li class="navbarseparator">
                            <div>
                                |
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">





                        <li class="active">
                            <a href="company.html">Företag</a>
                        </li>
                        <li class="navbarseparator">
                            <div>
                                |
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#contactarea">Kontakt</a>
                        </li>

                        <li class="mobilehide">
                            <a href="#workers">Våra Medarbetare</a>
                        </li>



                        <li class="navbarseparator">
                            <div>
                                |
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Intro
	================================================== -->
        <section id="contactarea" class="parallax section">

            <div class="wrapsection">
                <div class="parallax-overlay" style="background-color: white;opacity:0.85;"></div>
                <div class="container">
                    <?php
                

if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 1) 
{
  echo "<h1 style='color:black'>Redigeringsläge Aktiverat</h1>";

}
                    ?>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="contactlist">
                                    <li>
                                        <strong>Chalmers Studentkår Promotion</strong>
                                        <br> Stena Center 1B
                                        <br> 412 92 Göteborg



                                    </li>
                                    <li>
                                        <br>
                                    </li>
                                    <li>
                                        <a class="clearfix contact-box" href="mailto:info@chspromotion.se">
                                            <div class="contact-icon theme-background"><i class="fa fa-envelope-o"></i></div>
                                            <div class="single-row">info@chspromotion.se</div>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="clearfix contact-box" href="https://www.facebook.com/chspromotion">
                                            <div class="contact-icon theme-background"><i class="fa fa-facebook"></i></div>
                                            <div class="single-row">chspromotion</div>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="clearfix contact-box" href="https://instagram.com/chspromotion/">
                                            <div class="contact-icon theme-background"><i class="fa fa-instagram"></i></div>
                                            <div class="single-row">chspromotion</div>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="clearfix contact-box" href="https://www.linkedin.com/company/chalmers-studentk-r-promotion">
                                            <div class="contact-icon theme-background"><i class="fa fa-linkedin"></i> </div>
                                            <div class="double-row">Chalmers Studentkår
                                                <br>Promotion</div>
                                        </a>
                                    </li>







                                </ul>






                            </div>
                            <div class="col-md-8">
                                <div id="map" class="map desk-three-forth"></div>
                                <script>
                                    var map, desktopScreen = Modernizr.mq("only screen and (min-width:1024px)"),
                                        zoom = desktopScreen ? 18 : 17,
                                        scrollable = draggable = !Modernizr.hiddenscroll || desktopScreen,
                                        isIE11 = !!(navigator.userAgent.match(/Trident/) && navigator.userAgent.match(/rv[ :]11/));

                                    function initMap() {
                                        var myLatLng = {
                                            lat: 57.690913,
                                            lng: 11.972037
                                        };
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            zoom: zoom,
                                            center: myLatLng,
                                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                                            scrollwheel: scrollable,
                                            draggable: draggable,
                                            styles: [{
                                                "stylers": [{
                                                    "saturation": -100
                                                }]
                                            }],
                                        });

                                        var locations = [{
                                                title: 'CHS Promotion',
                                                position: {
                                                    lat: 57.690913,
                                                    lng: 11.972037
                                                },
                                                icon: {
                                                    url: isIE11 ? "assets/img/place.png" : "assets/img/place.png",
                                                    scaledSize: new google.maps.Size(64, 64)
                                                }

                                            }









                                            , {
                                                title: 'CHS Promotion',
                                                position: {
                                                    lat: 48.85484,
                                                    lng: 2.366427
                                                },
                                                icon: {
                                                    url: isIE11 ? "images/markers/png/Arrow_1.png" : "images/markers/svg/Arrow_1.svg",
                                                    scaledSize: new google.maps.Size(96, 96)
                                                }
                                            }
                                        ];

                                        locations.forEach(function(element, index) {
                                            var marker = new google.maps.Marker({
                                                position: element.position,
                                                map: map,
                                                title: element.title,
                                                icon: element.icon,
                                            });
                                        });
                                    }

                                </script>
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcg9cSqCmEeROXrAHQQlI20sJJioPfcRA&callback=initMap" async defer></script>
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <!-- About
	================================================== -->


        <section id="workers" class="parallax section" style="background-image: url(assets/img/Backgrounds/portalenred.jpg); background-size: 250%;">
            <div class="wrapsection">
                <div class="parallax-overlay" style="background-color:rgb(218,26,89);opacity:0.85;"></div>
                <div class="container">
                    <div class="row">
                        <article>
                            <div class="col-md-12 sol-sm-12">

                                <div class="maintitle">
                                    <h2 class="section-title">Våra Medarbetare</h2><br>

                                    <?php
            if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 1){

?>
<button id="insert" class="btn btn-3 btn-3e icon-arrow-right mobilehide popupcontent">Lägg till ny</button>
                                      
                                        <br>

                                        <?php
            } 
      

                ?>


                                            <h3>Ledningsgruppen </h3><br>

                                </div>
                            </div>


                            <?php 
                        $select = mysqli_query($con, "SELECT  *  FROM workers WHERE category = 'leader'");
                        
                        
                        //loopar ut tabellen för medarbetare för ledningsgruppen
while($data = mysqli_fetch_array($select)){
?>
                            <div class='col-md-4 col-sm-6' style="margin-bottom: 30px;">

                                <figure>
                                    <div class='image-responsive workerpic' style='background: url(assets/img/team/<?php echo $data['workerid']?>.jpg); '>
                                        <figcaption style=''>
                                            <div class='darkoverlay'>

                                                <ul style='list-style: none;'>
                                                    <li>
                                                        <?php
                                                         if(!empty($data['email'])){
        
?>
                                                            <img class='contacticon' src='assets/img/icons/mail%20(1).png'>

                                                            <?php
                                                         } echo $data['email']?>

                                                    </li>
                                                    <li>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <?php
    if(!empty($data['phone'])){
        
?>
                                                            <img class='contacticon' src='assets/img/icons/phone%20(1).png'>
                                                            <?php
            }
    echo $data['phone']?>
                                                    </li>
                                                </ul>
                                            </div>

                                        </figcaption>
                                    </div>
                                </figure>

                                <div class='description centertext'>
                                    <p style="    margin-bottom: 0;">
                                        <?php echo $data['name']?>
                                    </p>




                                    <?php  
                                      
                                               echo "<b>".$data['position']."</b>";
                                           
                                           if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 1) 
{
   ?>
                                    <a href="delete.php?workerid=<?php echo $data['workerid'];?>"><b style="color: red;">Ta bort</b></a>
                                    <?php
}
                                           
                                           ?>

                                        <div class='clearfix'></div>
                                </div>

                            </div>
                            <?php
}
                        ?>






                        </article>

                        <article>
                            <br>
							
							<div class="col-md-12 sol-sm-12">

                                <div class="maintitle">
                                   


                                             <h3 class="centertext">Marknadsföringsavdelningen</h3><br>

                                </div>
                            </div>
                           

                            <?php 
                        $select = mysqli_query($con, "SELECT  *  FROM workers WHERE category = 'marketing'");
                        
                        
                        //loopar ut tabellen för medarbetare för marknadsgruppen
while($data = mysqli_fetch_array($select)){
?>
                            <div class='col-md-4 col-sm-6' style="margin-bottom: 30px;">

                                <figure>
                                    <div class='image-responsive workerpic' style='background: url(assets/img/team/<?php echo $data['workerid']?>.jpg); '>
                                        <figcaption style=''>
                                            <div class='darkoverlay'>

                                                <ul style='list-style: none;'>
                                                    <li>
                                                        <?php
                                                         if(!empty($data['email'])){
        
?>
                                                            <img class='contacticon' src='assets/img/icons/mail%20(1).png'>

                                                            <?php
                                                         } echo $data['email']?>

                                                    </li>
                                                    <li>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <?php
    if(!empty($data['phone'])){
        
?>
                                                            <img class='contacticon' src='assets/img/icons/phone%20(1).png'>
                                                            <?php
            }
    echo $data['phone']?>
                                                    </li>
                                                </ul>
                                            </div>

                                        </figcaption>
                                    </div>
                                </figure>

                                <div class='description centertext'>
                                    <p style="    margin-bottom: 0;">
                                        <?php echo $data['name']?>
                                    </p>




                                    <?php  
                                      
                                               echo "<b>".$data['position']."</b>";
                                           
                                           if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 1) 
{
   ?>
                                    <a href="delete.php?workerid=<?php echo $data['workerid'];?>"><b style="color: red;">Ta bort</b></a>
                                    <?php
}
                                           
                                           ?>

                                        <div class='clearfix'></div>
                                </div>

                            </div>
                            <?php
}
                        ?>
                        </article>

                        <article>
						<div class="col-md-12 sol-sm-12">

                                <div class="maintitle">
                                   


                                             <h3 class="centertext">Projektgruppen för Traineedagen</h3><br>

                                </div>
                            </div>
                            

							
							 <?php 
                        $select = mysqli_query($con, "SELECT  *  FROM workers WHERE category = 'trainee'");
                        
                        
                        //loopar ut tabellen för medarbetare för traineedagen
while($data = mysqli_fetch_array($select)){
?>
                            <div class='col-md-4 col-sm-6' style="margin-bottom: 30px;">

                                <figure>
                                    <div class='image-responsive workerpic' style='background: url(assets/img/team/<?php echo $data['workerid']?>.jpg); '>
                                        <figcaption style=''>
                                            <div class='darkoverlay'>

                                                <ul style='list-style: none;'>
                                                    <li>
                                                        <?php
                                                         if(!empty($data['email'])){
        
?>
                                                            <img class='contacticon' src='assets/img/icons/mail%20(1).png'>

                                                            <?php
                                                         } echo $data['email']?>

                                                    </li>
                                                    <li>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <?php
    if(!empty($data['phone'])){
        
?>
                                                            <img class='contacticon' src='assets/img/icons/phone%20(1).png'>
                                                            <?php
            }
    echo $data['phone']?>
                                                    </li>
                                                </ul>
                                            </div>

                                        </figcaption>
                                    </div>
                                </figure>

                                <div class='description centertext'>
                                    <p style="    margin-bottom: 0;">
                                        <?php echo $data['name']?>
                                    </p>




                                    <?php  
                                      
                                               echo "<b>".$data['position']."</b>";
                                           
                                           if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 1) 
{
   ?>
                                    <a href="delete.php?workerid=<?php echo $data['workerid'];?>"><b style="color: red;">Ta bort</b></a>
                                    <?php
}
                                           
                                           ?>

                                        <div class='clearfix'></div>
                                </div>

                            </div>
                            <?php
}
                        ?>

                        </article>
                        <article>
						<div class="col-md-12 sol-sm-12">

                                <div class="maintitle">
                                   


                                             <h3 class="centertext">Project Group</h3><br>

                                </div>
                            </div>
                           

                             <?php 
                        $select = mysqli_query($con, "SELECT  *  FROM workers WHERE category = 'sales'");
                        
                        
                        //loopar ut tabellen för medarbetare för säljgruppen
while($data = mysqli_fetch_array($select)){
?>
                            <div class='col-md-4 col-sm-6' style="margin-bottom: 30px;">

                                <figure>
                                    <div class='image-responsive workerpic' style='background: url(assets/img/team/<?php echo $data['workerid']?>.jpg); '>
                                        <figcaption style=''>
                                            <div class='darkoverlay'>

                                                <ul style='list-style: none;'>
                                                    <li>
                                                        <?php
                                                         if(!empty($data['email'])){
        
?>
                                                            <img class='contacticon' src='assets/img/icons/mail%20(1).png'>

                                                            <?php
                                                         } echo $data['email']?>

                                                    </li>
                                                    <li>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <?php
    if(!empty($data['phone'])){
        
?>
                                                            <img class='contacticon' src='assets/img/icons/phone%20(1).png'>
                                                            <?php
            }
    echo $data['phone']?>
                                                    </li>
                                                </ul>
                                            </div>

                                        </figcaption>
                                    </div>
                                </figure>

                                <div class='description centertext'>
                                    <p style="    margin-bottom: 0;">
                                        <?php echo $data['name']?>
                                    </p>




                                    <?php  
                                      
                                               echo "<b>".$data['position']."</b>";
                                           
                                           if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 1) 
{
   ?>
                                    <a href="delete.php?workerid=<?php echo $data['workerid'];?>"><b style="color: red;">Ta bort</b></a>
                                    <?php
}
                                           
                                           ?>

                                        <div class='clearfix'></div>
                                </div>

                            </div>
                            <?php
}
                        ?>
                        </article>
                        </div>
									  <?php
            if(!(isset($_SESSION['admin_login'])) || !($_SESSION['admin_login'] == 1)){

?><button id="login" style="    margin-left: 32.5%;
    width: 35%;" class="btn btn-3 btn-3d icon-cog mobilehide popupcontent">Redigeringsverktyg</button>
                

                <?php
            } 
            else{

                ?>
  <a href="logout.php"><button  style="    margin-left: 32.5%;
    width: 35%;"class="btn btn-3 btn-3d icon-cog mobilehide">Logga ut</button></a>
               

                    <?php
            }
            ?>
                        </div>
			
                        </div>
 
        </section>

        <!-- Credits 
=============================================== -->
        <section id="credits " class="text-center ">
            <br>
            <span class="social wow zoomIn ">
	<a href="https://www.facebook.com/chspromotion "><img class="socialicon " src="assets/img/icons/facebook.png "></a>
	
	<a href="https://www.linkedin.com/company/3185187/ "><img class="socialicon " src="assets/img/icons/in.png "></a>
            
            <a href="https://www.instagram.com/chspromotion/ "><img class="socialicon " src="assets/img/icons/insta.png "></a>
	</span>

            <br/> <span class="social wow zoomIn ">© 2014- CHALMERS STUDENTKÅR PROMOTION, All rights reserved <img class="chalmersicon " src="assets/img/icons/chalmers.png "></span>

         

                        <p><br></p>



        </section>




        <!--Sektion som innehåller alla pop-up fönster och skapar den mörka bakgrunden.-->
        <section id="popupbackground">

            <!--Artikel som innehåller bild och beskrivning av planeten-->
            <article id="loginform" class="popuptext popupcontent">

                <!--Box med bilden-->

                <form action="contact.php" method="post" class="popupcontent">

                    <fieldset class="popupcontent">
                        <legend class="popupcontent">Inloggning</legend>

                        <li class="popupcontent">
                            <input class="popupcontent" type="text" name="username" placeholder="Användarnamn">
                        </li>

                        <li class="popupcontent">
                            <input class="popupcontent" type="password" name="password" placeholder="Lösenord">
                        </li>

                        <input type="hidden" name="request" value="1">
                        <input class="popupcontent" type="submit" name="submit" value="Logga in" />

                        <button type="button" href="contact.php">Tillbaka</button>

                    </fieldset>
                    <?php
                    if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 0) 
{
  echo "<b style='color: red;'>Inkorrekt information/Kontot existerar ej </b> <br>";

}
                    ?>

                </form>
                <br>

            </article>

            <article id="insertworkerform" class="popuptext popupcontent">

                <!--Box med bilden-->

                <form enctype="multipart/form-data" action="contact.php" method="post" class="popupcontent" id="insertform">

                    <fieldset class="popupcontent">
                        <legend class="popupcontent">Lägg till Medarbetare</legend>

                        <li class="popupcontent"> * Obligatoriska Fält </li>

                        <li class="popupcontent">
                            <input class="popupcontent" type="text" name="name" placeholder="Namn*">
                            <br>
                        </li>

                        <li class="popupcontent">
                            <input class="popupcontent" type="text" name="position" placeholder="Roll">
                            <br>
                        </li>

                        <li class="popupcontent">
                            <input class="popupcontent" type="text" name="email" placeholder="E-Post">
                            <br>
                        </li>

                        <li class="popupcontent">
                            <input class="popupcontent" type="text" name="phone" placeholder="Telefonnummer">
                            <br>
                        </li>





                        <select form="insertform" name="category" class="popupcontent">
  <option value="0" selected disabled hidden>Välj Arbetslag*</option>
  <option value="leader">Ledningsgruppen</option>
  <option value="marketing">Marknadsföringsavdelningen</option>
  <option value="trainee">Projektgruppen för Traineedagen
</option>
  <option value="sales">Project Group</option>
</select>
                        <br>
                        <br> <b class="popupcontent">Foto*</b>

                        <input style="margin-left: 25%;" class="popupcontent" type="file" name="pic" accept="image/*">


                        <br>
                        <p class="popupcontent"><b class="popupcontent">Obs!</b> Se till att bilden är i jpg format, samt att den har en aspect ratio runt 2:3. För att göra sidan snabbare, optimera bilderna helst till cirka 200kb.</p>

                        <input class="popupcontent" type="submit" name="submit" value="Lägg Till" />
                        <input type="hidden" name="request" value="2">
                        <button type="button" href="contact.php">Tillbaka</button>
                        <br>

                        <?php
                            if(isset($namePass) && $namePass == false)
                        
                     
{
  echo "<b style='color: red;'>Var vänlig och fyll i namn</b> <br>";

}
                        
                        else if(isset($nameTakenPass) && $nameTakenPass == false)
                        
                     
{
  echo "<b style='color: red;'>Det finns redan en kollega med detta namn!</b><br>";

}
                        
                            
                    if(isset($categoryPass) && $categoryPass == false)
                        
                     
{
  echo "<b style='color: red;'>Var vänlig och välj arbetslag</b> <br>";
                       

}
                        
                                 if(isset($imagePass) && $imagePass == false)
                        
                     
{
  echo "<b style='color: red;'>Var vänlig och välj en bild</b> <br>";
                   

}
                        
                        
                    ?>

                    </fieldset>
                    <?php
                    if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 0) 
{
  echo "Inkorrekt information/Kontot existerar ej <br>";

}
                    ?>
                        <br>
                </form>

            </article>



        </section>


        <!-- Bootstrap core JavaScript
	================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.localScroll.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/validate.js"></script>
        <script src="assets/js/popup.js"></script>


        <?php
                    if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 0) 
{
                        ?>
            <script>
                $(document).ready(function() {

                    $("#loginform").fadeIn("2000");
                    $("#popupbackground").fadeIn("2000");

                });

            </script>
            <?php

}
                          if(isset($_POST['request']) &&  $_POST['request'] == 2){
                          if($nameTakenPass == false  || $namePass == false || $categoryPass == false || $imagePass == false){
                              ?>
                <script>
                    $(document).ready(function() {

                        $("#insertworkerform").fadeIn("2000");
                        $("#popupbackground").fadeIn("2000");

                    });

                </script>
                <?php
                          }
                          }
                    ?>



                    <script src="assets/js/common.js"></script>
    </body>

    </html>
