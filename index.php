<?php
define('ISITSAFETORUN', TRUE); 
$webdata = array();
$mytable = "testdata";
$mytitle = 'Qgis table';
$mycss   = "css/table_styles.css"; 
$myjs    = "Jfunctions.js"; 
$valid   = TRUE; //set flag for errors in form
require 'head.php'; 
require 'nav.php';
require 'intro.php';
require "database.php"; // database name, user, password
require "db_connect.php"; // script to connect to database
require "setuparray.php"; 
require 'formdata.php'; 
$testfordata = array_filter($webdata);
//var_dump($testfordata);


if (!empty($testfordata))
  {
  if (!empty($webdata['action']))
    {

    if ($webdata['action'] == 'save')
      {
      require "validatedata.php";


      if ($valid)
        {
        require "savedata.php"; 
        } 
      } 
    if ($webdata['action'] == 'confirmdelete')
      {
      require "deletedata.php"; 
      }
    if ($webdata['action'] == 'download')
      {
      require "csv_download.php"; 
      }
  
}
  require "form.php"; 
  require "displayalldata.php"; 
  require "searchandsort.php";
  if (!empty($webdata['action']))
    {
    if ($webdata['action'] == "search")
      {
      require "selectrowtoedit.php";
      }
    
    } 
  } 
require 'foot.php'; 
?>