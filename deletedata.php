<?php
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}
?>

<?php
if (!empty($_POST))
{
	
	if (isset($webdata['editid'] )){
		
		$sql = "DELETE FROM  $mytable  WHERE HANDLE= ? ";
		
		$stmt = mysqli_prepare($dbhandle, $sql );

		mysqli_stmt_bind_param($stmt,'s',$webdata['editid']);
		

	mysqli_stmt_execute($stmt);
	printf("%d Row deleted.\n", mysqli_stmt_affected_rows($stmt));

	mysqli_stmt_close($stmt);
}}
?>