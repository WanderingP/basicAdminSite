<?php
if (!defined('ISITSAFETORUN')){
	die("This file does no useful work alone.");
}



//set $row data to variables

	if (isset($row['BLOCKNAME']) and ($BLOCKNAME == Null)){ //If database contains data already
		$BLOCKNAME = $row['BLOCKNAME'];
		}
	else{
		$BLOCKNAME = Null;
		}
	if (isset($row['PROJECT']) and ($PROJECT == Null)){ //If database contains data already
		$PROJECT = $row['PROJECT'];
		}
	else{
		$PROJECT = Null;
		}
	if (isset($row['DOCUMENT_DESCRIPTION']) and ($DOCUMENT_DESCRIPTION == Null)){ //If database contains data already
		$DOCUMENT_DESCRIPTION = $row['DOCUMENT_DESCRIPTION'];
		}
	else{
		$DOCUMENT_DESCRIPTION = Null;
		}
	if (isset($row['PROJECT_ID']) and ($PROJECT_ID == Null)){ //If database contains data already
		$PROJECT_ID = $row['PROJECT_ID'];
		}
	else{
		$PROJECT_ID = Null;
		}
	if (isset($row['REVISION']) and ($REVISION == Null)){ //If database contains data already
		$REVISION = $row['REVISION'];
		}
	else{
		$REVISION = Null;
		}
	if (isset($row['SCALE']) and ($SCALE == Null)){ //If database contains data already
		$SCALE = $row['SCALE'];
		}
	else{
		$SCALE = Null;
		}
	if (isset($row['DOCUMENT_NUMBER']) and ($DOCUMENT_NUMBER == Null)){ //If database contains data already
		$DOCUMENT_NUMBER = $row['DOCUMENT_NUMBER'];
		}
	else{
		$DOCUMENT_NUMBER = Null;
		}
	if (isset($row['DRAWN_BY']) and ($DRAWN_BY == Null)){ //If database contains data already
		$DRAWN_BY = $row['DRAWN_BY'];
		}
	else{
		$DRAWN_BY = Null;
		}
	if (isset($row['APPROVED_BY']) and ($APPROVED_BY == Null)){ //If database contains data already
		$APPROVED_BY = $row['APPROVED_BY'];
		}
	else{
		$APPROVED_BY = Null;
		}
	if (isset($row['CHECKED_BY']) and ($CHECKED_BY == Null)){ //If database contains data already
		$CHECKED_BY = $row['CHECKED_BY'];
		}
	else{
		$CHECKED_BY = Null;
		}
	if (isset($row['ISSUED_BY']) and ($ISSUED_BY == Null)){ //If database contains data already
		$ISSUED_BY = $row['ISSUED_BY'];
		}
	else{
		$ISSUED_BY = Null;
		}
	if (isset($row['DRAWN_DATE']) and ($DRAWN_DATE == Null)){ //If database contains data already
		$DRAWN_DATE = $row['DRAWN_DATE'];
		}
	else{
		$DRAWN_DATE = Null;
		}
	if (isset($row['APPROVED_DATE']) and ($APPROVED_DATE == Null)){ //If database contains data already
		$APPROVED_DATE = $row['APPROVED_DATE'];
		}
	else{
		$APPROVED_DATE = Null;
		}
	if (isset($row['CHECKED_DATE']) and ($CHECKED_DATE == Null)){ //If database contains data already
		$CHECKED_DATE = $row['CHECKED_DATE'];
		}
	else{
		$CHECKED_DATE = Null;
		}
	if (isset($row['ISSUED_DATE']) and ($ISSUED_DATE == Null)){ //If database contains data already
		$ISSUED_DATE = $row['ISSUED_DATE'];
		}
	else{
		$ISSUED_DATE = Null;
		}
	if (isset($row['PURPOSE_OF_ISSUE']) and ($PURPOSE_OF_ISSUE == Null)){ //If database contains data already
		$PURPOSE_OF_ISSUE = $row['PURPOSE_OF_ISSUE'];
		}
	else{
		$PURPOSE_OF_ISSUE = Null;
		}
	if (isset($row['NOTES']) and ($NOTES == Null)){ //If database contains data already
		$NOTES = $row['NOTES'];
		}
	else{
		$NOTES = Null;
		}
	?>