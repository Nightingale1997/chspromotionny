<?php

/**

* Borttagning av bokningar och personer

* 

* Denna sida tar bort bokningar eller personer beroende på från vilken sida man skickat en förfrågan ifrån genom att först kolla vilken typ av information har skicakts i if-satser och sedan använder MySQL metoden för borttagning.
*

* @param author kevin.solovjov@itggot.se

*/

?>
    <?php
//Ser om id existerar i URLen, om det ör det påbörjas borttagning för person.
session_start();


if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == 1){
    if(isset($_GET["workerid"]) && !empty($_GET["workerid"]))
    {
        require "connectDB.php";
        $con = connect(); //Anropar och ansluter till db.

        $workerid =	$_GET["workerid"];

        mysqli_query($con, "DELETE FROM workers WHERE workerid = $workerid");

        $path="assets/img/team/".$_GET["workerid"].".jpg";
        unlink($path);
        
        header('location:contact.php');
    }
}
else{
?>
        <p>Acces denied</p>
        <?php
  
}
?>
