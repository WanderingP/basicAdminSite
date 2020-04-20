<?php
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}
/*This file provides the seach interface*/
?>
<p> </p>
<section>
<label for="sectionc" class="showhide">Search Form</label>
<input type="checkbox" id="sectionc" value="button" style="display:none;"/>
<section id="csection">
	<h3>Search Form</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name = "searchform" >
<?php
	$myselect='<label for="sortby">Select column to be sorted: </label><select name ="sortby" id="sortby" ><option value="Sort By" selected >Sort By ? </option>';
	$thisquery = "SHOW COLUMNS FROM " . $mytable ;
	$result = mysqli_query( $dbhandle, $thisquery ) or die (" Could not action the query " . $thisquery );
	while ($row = mysqli_fetch_array($result)) {
	?>
	<label for="searchcolumn<?php echo $row[0]; ?>"><?php echo $row[0]; ?>:</label><input type="text" name="searchcolumn<?php echo $row[0]; ?>" id="searchcolumn<?php echo $row[0]; ?>"  maxlength="20" minlength="0" value="" ><br />
	<?php
	$myselect = $myselect . '<option value="'.$row[0].'">'.$row[0].'</option>';
	}

$myselect = $myselect .'</select>';

echo $myselect; //to browser

?>
Ascending: <input type="radio" name="sortdirection" id="ASC" value="ASC" CHECKED > 
Descending: <input type="radio" name="sortdirection" id="DESC" value="DESC"><br />
<p><label for="submit">Submit: </label><input type="submit" name="submitss" id="submitss" value="Search"></p>
<input type="hidden" name="action" value="search" >
</form>
</section>


 