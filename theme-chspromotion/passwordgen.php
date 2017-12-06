<?php
require "encrypt.php";


$password = "CHSediting2018";
$password = encrypt($password);

echo $password;

?>
