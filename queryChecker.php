<?php
if (!defined('ISITSAFETORUN')){
	die("This file does no useful work alone.");
}



//set $_GET data to variables

		if (isset($_GET['BLOCKNAME'])){ //If query has been added
			$BLOCKNAME = $_GET['BLOCKNAME'];
			}
		else{
			$BLOCKNAME = Null;
			}
		
		if (isset($_GET['PROJECT'])){ //If query has been added
			$PROJECT = $_GET['PROJECT'];
			}
		else{
			$PROJECT = Null;
			}
		
		if (isset($_GET['DOCUMENT_DESCRIPTION'])){ //If query has been added
			$DOCUMENT_DESCRIPTION = $_GET['DOCUMENT_DESCRIPTION'];
			}
		else{
			$DOCUMENT_DESCRIPTION = Null;
			}
		
		if (isset($_GET['PROJECT_ID'])){ //If query has been added
			$PROJECT_ID = $_GET['PROJECT_ID'];
			}
		else{
			$PROJECT_ID = Null;
			}
		
		if (isset($_GET['REVISION'])){ //If query has been added
			$REVISION = $_GET['REVISION'];
			}
		else{
			$REVISION = Null;
			}
		
		if (isset($_GET['SCALE'])){ //If query has been added
			$SCALE = $_GET['SCALE'];
			}
		
		else{
			$SCALE = Null;
			}
		
		if (isset($_GET['DOCUMENT_NUMBER'])){ //If query has been added
			$DOCUMENT_NUMBER = $_GET['DOCUMENT_NUMBER'];
			}
		else{
			$DOCUMENT_NUMBER = Null;
			}
		
		if (isset($_GET['DRAWN_BY'])){ //If query has been added
			$DRAWN_BY = $_GET['DRAWN_BY'];
			}
		else{
			$DRAWN_BY = Null;
			}
		
		if (isset($_GET['APPROVED_BY'])){ //If query has been added
			$APPROVED_BY = $_GET['APPROVED_BY'];
			}
		else{
			$APPROVED_BY = Null;
			}
		
		if (isset($_GET['CHECKED_BY'])){ //If query has been added
			$CHECKED_BY = $_GET['CHECKED_BY'];
			}
		else{
			$CHECKED_BY = Null;
			}
		
		if (isset($_GET['ISSUED_BY'])){ //If query has been added
			$ISSUED_BY = $_GET['ISSUED_BY'];
			}
		else{
			$ISSUED_BY = Null;
			}
		
		if (isset($_GET['DRAWN_DATE'])){ //If query has been added
			$DRAWN_DATE = $_GET['DRAWN_DATE'];
			}
		else{
			$DRAWN_DATE = Null;
			}
		
		if (isset($_GET['APPROVED_DATE'])){ //If query has been added
			$APPROVED_DATE = $_GET['APPROVED_DATE'];
			}
		else{
			$APPROVED_DATE = Null;
			}
		if (isset($_GET['CHECKED_DATE'])){ //If query has been added
			$CHECKED_DATE = $_GET['CHECKED_DATE'];
			}
		else{
			$CHECKED_DATE = Null;
			}
		
		if (isset($_GET['ISSUED_DATE'])){ //If query has been added
			$ISSUED_DATE = $_GET['ISSUED_DATE'];
			}
		else{
			$ISSUED_DATE = Null;
			}
		
		if (isset($_GET['PURPOSE_OF_ISSUE'])){ //If query has been added
			$PURPOSE_OF_ISSUE = $_GET['PURPOSE_OF_ISSUE'];
			}
		else{
			$PURPOSE_OF_ISSUE = Null;
			}
		
		if (isset($_GET['NOTES'])){ //If query has been added
			$NOTES = $_GET['NOTES'];
			}
		else{
			$NOTES = Null;
			}


	?>