
<?php

/*
This file contains the code for data control from query String to database

	 
	 */


//Current string for use within QGIS

if (!defined('ISITSAFETORUN')){
	die("This file does no useful work alone.");
}

//vars
$new = "";
$date = date("Y-m-d");

date_default_timezone_set("Europe/London");


//if $_GET not empty
if (!empty($_GET)){
	
	if (isset($_GET['HANDLE'])){ //If query has been added
		$HANDLE = $_GET['HANDLE'];
		require "queryChecker.php";
		//check to see if database already contains handle
		$thisquery = "SELECT * from $mytable WHERE HANDLE = ?";
		$stmt = mysqli_prepare($dbhandle, $thisquery ) or die('mysqli error: '.mysqli_error($dbhandle));
		mysqli_stmt_bind_param($stmt, 's', $HANDLE);
		mysqli_stmt_execute($stmt);
		
		$result = $stmt->get_result();
		$row = $result->fetch_assoc(); //Create Array
		$num = mysqli_num_rows($result); //Counts number of rows
		mysqli_stmt_close($stmt);
		//if handle exists.. prepare statements
		if($num > 0){
			require "databaseChecker.php"; // Check varaibles against whats sorted in database
			
			//Edit the table entry
			$sql = "UPDATE $mytable SET BLOCKNAME = ?, PROJECT = ?, DOCUMENT_DESCRIPTION = ?, PROJECT_ID = ?, REVISION = ?, SCALE = ?, DOCUMENT_NUMBER = ?, DRAWN_BY = ?, APPROVED_BY = ?, CHECKED_BY = ?, ISSUED_BY = ?, DRAWN_DATE = ?, APPROVED_DATE = ?, CHECKED_DATE = ?, ISSUED_DATE = ?, PURPOSE_OF_ISSUE = ?, NOTES = ? WHERE HANDLE = ? ";
			$stmt = mysqli_prepare($dbhandle, $sql ) or die('mysqli error: '.mysqli_error($dbhandle));
			mysqli_stmt_bind_param($stmt, 'ssssssssssssssssss', $BLOCKNAME, $PROJECT, $DOCUMENT_DESCRIPTION, $PROJECT_ID, $REVISION, $SCALE, $DOCUMENT_NUMBER, $DRAWN_BY, $APPROVED_BY, $CHECKED_BY, $ISSUED_BY, $DRAWN_DATE, $APPROVED_DATE, $CHECKED_DATE, $ISSUED_DATE, $PURPOSE_OF_ISSUE, $NOTES, $HANDLE) or die("stmt error: ".mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt);
			
		}

		elseif ($num == 0){//Theres no entry in the database
			$sql = "INSERT INTO $mytable (BLOCKNAME, PROJECT, DOCUMENT_DESCRIPTION, PROJECT_ID, REVISION, SCALE, DOCUMENT_NUMBER, DRAWN_BY, APPROVED_BY, CHECKED_BY, ISSUED_BY, DRAWN_DATE, APPROVED_DATE, CHECKED_DATE, ISSUED_DATE, PURPOSE_OF_ISSUE, NOTES, HANDLE) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = mysqli_prepare($dbhandle, $sql ) or die("mysqli error: ". mysqli_error($dbhandle));
			mysqli_stmt_bind_param($stmt, 'ssssssssssssssssss', $BLOCKNAME, $PROJECT, $DOCUMENT_DESCRIPTION, $PROJECT_ID, $REVISION, $SCALE, $DOCUMENT_NUMBER, $DRAWN_BY, $APPROVED_BY, $CHECKED_BY, $ISSUED_BY, $DRAWN_DATE, $APPROVED_DATE, $CHECKED_DATE, $ISSUED_DATE, $PURPOSE_OF_ISSUE, $NOTES, $HANDLE) or die("stmt error: ".mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_error($dbhandle));

		
		}
		else{
			echo "Something has gone terribly wrong!";
		}


	}
	else{
		echo "A Handle must be entered.";
		}
}

mysqli_stmt_close($stmt);

