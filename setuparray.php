<?php
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}

/*Sets up an emptry array ready to store data the is entered via the web interface*/
?>
<?php
$thisquery = "SHOW COLUMNS FROM $mytable";
$result = mysqli_query( $dbhandle, $thisquery ) or die (" Could not action the query " . $thisquery );
while ($row = mysqli_fetch_array($result)) {
	$webdata[$row[0]] = ""; 
}
?>