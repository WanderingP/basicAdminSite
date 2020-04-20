<?php
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}
?>
<?php
$testfordata = array_filter($webdata);
if (!empty($testfordata)){
	$sortdirection = 'ASC';
	if ($webdata['sortdirection'] == 'DESC' ) { 
        $sortdirection = 'DESC'; 
    }
	$sortby = 'HANDLE';
	if ($webdata['sortby'] == 'BLOCKNAME') {
        $sortby = 'BLOCKNAME';
    }
	if ($webdata['sortby'] == 'PROJECT') {
        $sortby = 'PROJECT';
    }
    if ($webdata['sortby'] == 'DOCUMENT_DESCRIPTION') {
        $sortby = 'DOCUMENT_DESCRIPTION';
    }
	if ($webdata['sortby'] == 'PROJECT_ID') {
        $sortby = 'PROJECT_ID';
    }
	if ($webdata['sortby'] == 'REVISION') {
        $sortby = 'REVISION';
    }
	if ($webdata['sortby'] == 'SCALE') {
        $sortby = 'SCALE';
    }
	if ($webdata['sortby'] == 'DOCUMENT_NUMBER') {
        $sortby = 'DOCUMENT_NUMBER';
    }
	if ($webdata['sortby'] == 'DRAWN_BY') {
        $sortby = 'DRAWN_BY';
    }
	if ($webdata['sortby'] == 'APPROVED_BY') {
        $sortby = 'APPROVED_BY';
    }
	if ($webdata['sortby'] == 'CHECKED_BY') {
        $sortby = 'CHECKED_BY';
    }
	if ($webdata['sortby'] == 'ISSUED_BY') {
        $sortby = 'ISSUED_BY';
    }
    if ($webdata['sortby'] == 'DRAWN_DATE') {
        $sortby = 'DRAWN_BY';
    }
	if ($webdata['sortby'] == 'APPROVED_DATE') {
        $sortby = 'APPROVED_BY';
    }
	if ($webdata['sortby'] == 'CHECKED_DATE') {
        $sortby = 'CHECKED_BY';
    }
	if ($webdata['sortby'] == 'ISSUED_DATE') {
        $sortby = 'ISSUED_BY';
    }
    if ($webdata['sortby'] == 'PURPOSE_OF_ISSUE') {
        $sortby = 'PURPOSE_OF_ISSUE';
    }
	if ($webdata['sortby'] == 'NOTES') {
        $sortby = 'NOTES';
    }
$HANDLE= "%".$webdata['searchcolumnHANDLE']."%";
$BLOCKNAME= "%".$webdata['searchcolumnBLOCKNAME']."%";
$PROJECT ="%".$webdata['searchcolumnPROJECT']."%";
$DOCUMENT_DESCRIPTION = "%".$webdata['searchcolumnDOCUMENT_DESCRIPTION']."%";
$REVISION= "%".$webdata['searchcolumnREVISION']."%";
$PROJECT_ID= "%".$webdata['searchcolumnPROJECT_ID']."%";
$SCALE ="%".$webdata['searchcolumnSCALE']."%" ;
$DOCUMENT_NUMBER= "%".$webdata['searchcolumnDOCUMENT_NUMBER']."%";
$DRAWN_BY= "%".$webdata['searchcolumnDRAWN_BY']."%";
$APPROVED_BY ="%".$webdata['searchcolumnAPPROVED_BY']."%" ;
$CHECKED_BY= "%".$webdata['searchcolumnCHECKED_BY']."%";
$ISSUED_BY= "%".$webdata['searchcolumnISSUED_BY']."%";
$DRAWN_DATE= "%".$webdata['searchcolumnDRAWN_DATE']."%";
$APPROVED_DATE ="%".$webdata['searchcolumnAPPROVED_DATE']."%" ;
$CHECKED_DATE= "%".$webdata['searchcolumnCHECKED_DATE']."%";
$ISSUED_DATE= "%".$webdata['searchcolumnISSUED_DATE']."%";
$PURPOSE_OF_ISSUE= "%".$webdata['searchcolumnPURPOSE_OF_ISSUE']."%";
$NOTES= "%".$webdata['searchcolumnNOTES']."%";
$editid = $webdata['searchcolumnid'];

//Grabs data from database
if (!empty($webdata['searchcolumnid'] )){ 
	$sql = "SELECT id, HANDLE, BLOCKNAME, PROJECT, DOCUMENT_DESCRIPTION, REVISION, PROJECT_ID, SCALE, DOCUMENT_NUMBER, DRAWN_BY, APPROVED_BY, CHECKED_BY, ISSUED_BY, DRAWN_DATE, APPROVED_DATE, CHECKED_DATE, ISSUED_DATE, PURPOSE_OF_ISSUE, NOTES FROM $mytable WHERE id = ? ";
}   
else{
        $sql = "SELECT id, HANDLE, BLOCKNAME, PROJECT, DOCUMENT_DESCRIPTION, REVISION, PROJECT_ID, SCALE, DOCUMENT_NUMBER, DRAWN_BY, APPROVED_BY, CHECKED_BY, ISSUED_BY, DRAWN_DATE, APPROVED_DATE, CHECKED_DATE, ISSUED_DATE, PURPOSE_OF_ISSUE, NOTES FROM $mytable WHERE HANDLE LIKE ? AND BLOCKNAME LIKE ? AND PROJECT LIKE ? AND DOCUMENT_DESCRIPTION LIKE ? AND REVISION LIKE ? AND PROJECT_ID LIKE ? AND SCALE LIKE ? AND DOCUMENT_NUMBER LIKE ? AND DRAWN_BY LIKE ? AND APPROVED_BY LIKE ? AND CHECKED_BY LIKE ? AND ISSUED_BY LIKE ? AND DRAWN_DATE LIKE ? AND APPROVED_DATE LIKE ? AND CHECKED_DATE LIKE ? AND ISSUED_DATE LIKE ? AND PURPOSE_OF_ISSUE LIKE ? AND NOTES LIKE ? ORDER BY $sortby $sortdirection";
    }
//Prepare Statements
if ($stmt = $dbhandle->prepare($sql)) {

    if (!empty($webdata['searchcolumnid'])){
	       $stmt->bind_param("s",$editid ); 
          
           }
	else{
	    $stmt->bind_param("ssssssssssssssssss",$HANDLE,$BLOCKNAME,$PROJECT,$DOCUMENT_DESCRIPTION, $REVISION, $PROJECT_ID, $SCALE,$DOCUMENT_NUMBER,$DRAWN_BY,$APPROVED_BY,$CHECKED_BY,$ISSUED_BY,$DRAWN_DATE,$APPROVED_DATE,$CHECKED_DATE,$ISSUED_DATE,$PURPOSE_OF_ISSUE,$NOTES);
    }
}
    $stmt->execute();
    $result = $stmt->get_result();
    //Array for data copy
    $res_row = Array();
?>
  
    <table>
    <thead><th></th><th>Handle</th><th>Block Name</th>
                <th>Project</th><th>Document description</th>
                <th>Revision</th><th>Scale</th><th>document Number</th>
                <th>Drawn By</th><th>Approved by</th><th>Checked By</th>
                <th>Issued By</th><th>Drawn Date</th><th>Drawn Date</th>
                <th>Approved Date</th><th>Checked Date</th><th>Issued Date</th>
                <th>Purpose Of Issue</th><th>Notes</th></thead><tboby>
    <?php
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>
        <tr><td><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name = "selectform<?php echo $row["id"]; ?>" >
        <label for="submit<?php echo $row["id"]; ?>"></label>
        <input type="hidden" name="editid" value="<?php echo $row["id"]; ?>">
        <input type="hidden" name="action" value="edit">
        <input class="btn btn-danger btn-sm" type="submit" name="submit" value="Edit">
        </form>
       <?php echo "
                </td><td>" . htmlspecialchars($row["HANDLE"]). 
        "</td><td>" . htmlspecialchars($row["BLOCKNAME"]). 
        "</td><td>" . htmlspecialchars($row["PROJECT"]). 
        "</td><td>". htmlspecialchars($row["DOCUMENT_DESCRIPTION"]) . 
        "</td><td>" . htmlspecialchars($row["PROJECT_ID"]). 
        "</td><td>" . htmlspecialchars($row["REVISION"]). 
        "</td><td>". htmlspecialchars($row["SCALE"]) . 
        "</td><td>" . htmlspecialchars($row["DOCUMENT_NUMBER"]). 
        "</td><td>" . htmlspecialchars($row["DRAWN_BY"]). 
        "</td><td>". htmlspecialchars($row["APPROVED_BY"]) . 
        "</td><td>" . htmlspecialchars($row["CHECKED_BY"]). 
        "</td><td>". htmlspecialchars($row["ISSUED_BY"]) . 
         "</td><td>" . htmlspecialchars($row["DRAWN_DATE"]). 
        "</td><td>". htmlspecialchars($row["APPROVED_DATE"]) . 
        "</td><td>" . htmlspecialchars($row["CHECKED_DATE"]). 
        "</td><td>". htmlspecialchars($row["ISSUED_DATE"]) . 
         "</td><td>" . htmlspecialchars($row["PURPOSE_OF_ISSUE"]). 
        "</td><td>". htmlspecialchars($row["NOTES"]) . 
        "</tr>";
    }
}
 else { 
    echo "0 results";
}
?>
    </tbody>
</table>

   
<?php
//Puts pointer back to begining of array
$result->data_seek(0);
 while ($row = $result->fetch_assoc()){
        $res_row[] = $row;
	}

$serialize_array = serialize($res_row);
//Allows data to be passed in $_post
?>
  <div id = "download">
        <form method="post" action="csv_download.php"  name = "selectform<?php echo $row["id"]; ?>" >
        <label for="submit<?php echo $row["id"]; ?>"></label>
        <input type = "hidden" name="editid" value="Download">
        <input type="hidden" name="action" value="download">
        <input class="btn btn-danger" type="submit" name="submit" value="Download">
        <textarea name='export_data' style='display: none;'><?php echo $serialize_array; ?></textarea>
</form>
    </div>
