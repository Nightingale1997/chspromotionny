<?php

/**

* Utloggning

* 

* En enkel sida som förstör sessionen och skickar tillbaka till booking.php
*

* @param author kevin.solovjov@itggot.se

*/

?>

    <?php
//Startar session
 session_start();
 //Förstör session
 session_destroy();
 //Skickar tillbaka till huvudsidan
 header('location:contact.php');
 ?>
