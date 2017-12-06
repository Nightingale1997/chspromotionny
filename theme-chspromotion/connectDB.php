<?php

/**

* Databasanslutning

* 

* Funktionen för att ansluta till databasen persondb
*

* @param author kevin.solovjov@itggot.se

*/

?>
    <?php
function connect(){
$con = mysqli_connect("nyachspromotion-176619.mysql.binero.se","176619_lr10491","testtest","176619-nyachspromotion");
mysqli_set_charset($con,'utf8'); //sätter teckenkod utf8
return $con;
}
?>
