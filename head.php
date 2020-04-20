<?php
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}


$address = "Unit E, Level 2 North, New England House,<br/> New England Street, Brighton, BN1 4GH";
$phone = " 01273 806 220";
$web = "CurveIT.com";
$imagefile = 'img/curve_logo.jpg';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name = "viewport" content = "width=device-width initial-scale = 1.0" />
        <meta name = "author" content = "Liarra" />
		<meta name = "description" content = "Web interface for database table that provides the ability to add, edit, search and delete from the database. It also produces a ready to go table for easy QGIS html import" />
        <title> <?php echo $mytitle ?> </title>
        <link rel="stylesheet" href="<?php echo $mycss ?>">
    </head>
    <body>