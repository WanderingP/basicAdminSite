<?php
define('ISITSAFETORUN', TRUE);

/*Verticl query-able table index
*/

$mytable = "testdata";
$mytitle = 'Qgis table';
$mycss   = "css/table_styles.css"; 
$myjs    = "Jfunctions.js"; 
$valid   = TRUE; //set flag for errors in form

require 'head.php';
require 'database.php'; //Database login details
include_once 'db_connect.php'; // database access
require 'query.php'; //adds querys to database and controls datetimes
require 'v_q.php'; //displays the table data
require 'foot.php';
?>