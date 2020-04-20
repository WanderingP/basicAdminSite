<?PHP
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}
/*This file saves or updates the database with data entered via the web interface*/
?>

<?php
date_default_timezone_set("Europe/London");
$databasedate = date("Y/m/d");
$date = date("Y/m/d");
$emptydate = '0000-00-00 00:00:00';


if (!empty($_POST)){

	//if (isset($webdata['editid'] )) {echo "<h2>editid is set</h2>";}
	//if (!empty($webdata['editid'] )){echo "<h2>editid is not empty</h2>";}
	
	if (isset($webdata['HANDLE'] ) && !empty($webdata['HANDLE'] )){

		//If for edit, find the related file in database
		$thisquery = "SELECT * from $mytable WHERE HANDLE = ?" ;
		$stmt1 = mysqli_prepare($dbhandle, $thisquery) or die(mysqli_error($dbhandle));
		mysqli_stmt_bind_param($stmt1, 's', $webdata['HANDLE']);
		mysqli_stmt_execute($stmt1);

		$result = $stmt1->get_result();
		$row = $result->fetch_assoc();
		$num = mysqli_num_rows($result);
		mysqli_stmt_close($stmt1);
		
		if ($num > 0){
			
			if(strlen($webdata['DRAWN_BY']) != 0){//If there is webdata
					$webdata['DRAWN_DATE'] = $databasedate;
				}
				else{//if there is database data
					$webdata['DRAWN_DATE'] = $row['DRAWN_DATE'];
				}
			}
			if(strlen($webdata['CHECKED_BY']) != 0){//If there is webdata
				if(strlen($row['CHECKED_BY']) == 0){//but no database data
					$webdata['CHECKED_DATE'] = $databasedate;
				}
				else{//if there is database data
					$webdata['CHECKED_DATE'] = $row['CHECKED_DATE'];
				}
			}
			if(strlen($webdata['APPROVED_BY']) != 0){//If there is webdata
				if(strlen($row['APPROVED_BY']) == 0){//but no database data
					$webdata['APPROVED_DATE'] = $databasedate;
				}
				else{//if there is database data
					$webdata['APPROVED_DATE'] = $row['APPROVED_DATE'];
				}
			}
			if(strlen($webdata['ISSUED_BY']) != 0){//If there is webdata
				if(strlen($row['ISSUED_BY']) == 0){//but no database data
					$webdata['ISSUED_DATE'] = $databasedate;
				}
				else{//if there is database data
					$webdata['ISSUED_DATE'] = $row['ISSUED_DATE'];
				}
			}
				$sql = "UPDATE $mytable SET BLOCKNAME= ? , PROJECT = ?, DOCUMENT_DESCRIPTION = ?, PROJECT_ID = ? , REVISION = ? , SCALE = ?, DOCUMENT_NUMBER = ?, DRAWN_BY = ?, APPROVED_BY= ? , CHECKED_BY = ?, ISSUED_BY = ?, DRAWN_DATE = ?, APPROVED_DATE = ?, CHECKED_DATE = ?, ISSUED_DATE = ?, PURPOSE_OF_ISSUE = ?, NOTES = ? WHERE HANDLE = ? ";
				$stmt = mysqli_prepare($dbhandle, $sql ) or die('mysqli error: '.mysqli_error($dbhandle));
				//var_dump($webdata);
				mysqli_stmt_bind_param($stmt, 'ssssssssssssssssss', $webdata['BLOCKNAME'], $webdata['PROJECT'], $webdata['DOCUMENT_DESCRIPTION'], $webdata['PROJECT_ID'], $webdata['REVISION'], $webdata['SCALE'], $webdata['DOCUMENT_NUMBER'], $webdata['DRAWN_BY'], $webdata['APPROVED_BY'], $webdata['CHECKED_BY'], $webdata['ISSUED_BY'], $webdata['DRAWN_DATE'], $webdata['APPROVED_DATE'], $webdata['CHECKED_DATE'], $webdata['ISSUED_DATE'], $webdata['PURPOSE_OF_ISSUE'], $webdata['NOTES'], $webdata['HANDLE'],) or die("stmt error: ".mysqli_stmt_error($stmt));		
				//var_dump($stmt);
		}
	else{
		
		if (strlen($webdata['DRAWN_BY']) != 0){//If this field has data
			$webdata['DRAWN_DATE'] = $databasedate;
		} 
		if (strlen($webdata['CHECKED_BY']) != 0){//If this field has data
			$webdata['CHECKED_DATE'] = $databasedate;
		} 
		if (strlen($webdata['APPROVED_BY']) != 0){//If this field has data
			$webdata['checked_datetime'] = $databasedate;
		} 
		if (strlen($webdata['ISSUED_BY']) != 0){//If this field has data
			$webdata['ISSUED_DATE'] = $databasedate;
		} 

		$sql = "INSERT INTO $mytable (HANDLE, BLOCKNAME, PROJECT, DOCUMENT_DESCRIPTION, PROJECT_ID, REVISION, SCALE, DOCUMENT_NUMBER, DRAWN_BY, APPROVED_BY, CHECKED_BY, ISSUED_BY, DRAWN_DATE, APPROVED_DATE, CHECKED_DATE, ISSUED_DATE, PURPOSE_OF_ISSUE, NOTES) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($dbhandle, $sql ) or die("mysqli error: ". mysqli_error($dbhandle));
		mysqli_stmt_bind_param($stmt, 'ssssssssssssssssss', $webdata['HANDLE'], $webdata['BLOCKNAME'], $webdata['PROJECT'], $webdata['DOCUMENT_DESCRIPTION'], $webdata['PROJECT_ID'], $webdata['REVISION'], $webdata['SCALE'], $webdata['DOCUMENT_NUMBER'], $webdata['DRAWN_BY'], $webdata['APPROVED_BY'], $webdata['CHECKED_BY'], $webdata['ISSUED_BY'], $webdata['DRAWN_DATE'], $webdata['APPROVED_DATE'], $webdata['CHECKED_DATE'], $webdata['ISSUED_DATE'], $webdata['PURPOSE_OF_ISSUE'], $webdata['NOTES']);
		} 
	}
	mysqli_stmt_execute($stmt) or die(mysqli_error($dbhandle));
	printf("%d row(s) changed <h2>Data Saved</h2>\n", mysqli_stmt_affected_rows($stmt));
	mysqli_stmt_close($stmt);
	

?>