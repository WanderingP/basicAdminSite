<?PHP
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}
?>

<?php
$dbhandle = mysqli_connect( $hostname, $username, $password ) or die( "Unable to connect to MySQL");
$selected = mysqli_select_db(  $dbhandle, $database_name ) or die("Unable to connect to " . $database_name );
?>