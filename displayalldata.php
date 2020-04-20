<?php
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}
?>
<p> </p>
<label for="sectiond" class="showhide">View Table</label>
<input type="checkbox" id="sectiond" value="button" style="display:none;"/>
<section id="dsection">
    <h3></h3>
<table>

<thead>
    <th>HANDLE</th>
    <th>BLOCKNAME</th>
    <th>PROJECT</th>
    <th>DOCUMENT_DESCRIPTION</th>
    <th>PROJECT_ID</th>
    <th>REVISION</th>
    <th>SCALE</th>
    <th>DOCUMENT_NUMBER</th>
    <th>DRAWN_BY</th>
    <th>APPROVED_BY</th>
    <th>CHECKED_BY</th>
    <th>ISSUED_BY</th>
    <th>DRAWN_DATE</th>
    <th>APPROVED_DATE</th>
    <th>CHECKED_DATE</th>
    <th>ISSUED_DATE</th>
    <th>PURPOSE_OF_ISSUE</th>
    <th>NOTES</th>
   
</thead>

<?php
$sql = "SELECT HANDLE, BLOCKNAME, PROJECT, DOCUMENT_DESCRIPTION, PROJECT_ID, REVISION, SCALE, DOCUMENT_NUMBER, DRAWN_BY, APPROVED_BY, CHECKED_BY, ISSUED_BY, DRAWN_DATE, APPROVED_DATE, CHECKED_DATE, ISSUED_DATE, PURPOSE_OF_ISSUE, NOTES FROM $mytable"; 
$result = mysqli_query($dbhandle, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        echo 
        "<tr><td>" . htmlspecialchars($row["HANDLE"]). 
        "</td><td>" . htmlspecialchars($row["BLOCKNAME"]). 
        "</td><td>" . htmlspecialchars($row["PROJECT"]). 
        "</td><td>" . htmlspecialchars($row["DOCUMENT_DESCRIPTION"]). 
        "</td><td>" . htmlspecialchars($row["PROJECT_ID"]). 
        "</td><td>" . htmlspecialchars($row["REVISION"]). 
        "</td><td>" . htmlspecialchars($row["SCALE"]). 
        "</td><td>" . htmlspecialchars($row["DOCUMENT_NUMBER"]). 
        "</td><td>" . htmlspecialchars($row["DRAWN_BY"]). 
        "</td><td>" . htmlspecialchars($row["APPROVED_BY"]). 
        "</td><td>" . htmlspecialchars($row["CHECKED_BY"]). 
        "</td><td>" . htmlspecialchars($row["ISSUED_BY"]). 
        "</td><td>" . htmlspecialchars($row["DRAWN_DATE"]). 
        "</td><td>" . htmlspecialchars($row["APPROVED_DATE"]). 
        "</td><td>" . htmlspecialchars($row["CHECKED_DATE"]). 
        "</td><td>" . htmlspecialchars($row["ISSUED_DATE"]).
        "</td><td>" . htmlspecialchars($row["PURPOSE_OF_ISSUE"]). 
        "</td><td>" . htmlspecialchars($row["NOTES"]). "
        </tr>";
    }
} else {
    echo "0 results";
};
?>
</table>
</section>