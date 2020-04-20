<?php 

/*Vertical Query-able view for QGIS table
                    Must run after query.php
                    THIS FILE WILL NOT WORK CORRECTLY WITHOUT QUERY.php
                    */

if(!defined('ISITSAFETORUN')){
	die('This file does no useful work alone');
}



//result comes from query.php
if ($result->num_rows > 0) {
        echo "<div class = 'main'>
        <table>
			<caption id = 'Logos'>
				<img src = 'images/curve_logo.jpg' alt = 'Where the logo goes' />
			</caption>
            <thead>
			    <tr id = 'address'>
                    <td colspan = '2'>
				        <p>"
                         . $address .    
                        "</p>
                    </td>
				</tr>
			<tr id = 'phone'>
				<td colspan = '1'>
                    <p>
                        T:" . $phone . "
                    </p>
                </td>
				<td colspan = '1'>
                    <p>
                        Web: " . $web . "
                    </p>
                </td>
            </tr>
            <tr id = 'HANDLE'>
				<td colspan = '2'>
                    <p>
                        HANDLE <br/>"
					    .htmlspecialchars($row["HANDLE"]). "
                    </p>
                </td>
            </tr>

            <tr id = 'BLOCKNAME'>
                <td colspan = '2'>
                    <p>
                        BLOCKNAME <br/>"
                        .htmlspecialchars($row["BLOCKNAME"])." 
                    </p>
                </td>
            </tr>
            <tr id = 'PROJECT'>
                <td colspan = '2'>
                    <p>
                        PROJECT <br/> "
                        .htmlspecialchars($row["PROJECT"]). "
                    </p>
                </td>
            </tr>
            <tr id = 'DOCUMENT_DESCRIPTION'>
                <td colspan = '2'>
                    <p>
                        DOCUMENT_DESCRIPTION <br/>"
                         .htmlspecialchars($row["DOCUMENT_DESCRIPTION"]). "
                    </p>
                </td>
            </tr>
            <tr>
                <td id = 'PROJECT_ID'>
                    <p>
                        PROJECT_ID<br/>"
                        .htmlspecialchars($row["PROJECT_ID"]). "
                    </p>
                </td>
                <td id = 'REVISION'>
                    <p>
                        REVISION<br/>"
                        .htmlspecialchars($row["REVISION"]). "
                    </p>
                </td>
            </tr>
            <tr>
                <td id = 'SCALE'>
                    <p>
                        SCALE <br/>" 
                        .htmlspecialchars($row["SCALE"]). "
                    </p>
                </td>
                <td id = 'DOCUMENT_NUMBER'>
                    <p>
                        DOCUMENT_NUMBER <br/>"
                       .htmlspecialchars($row["DOCUMENT_NUMBER"]). "
                    </p>
                </td>
            <tr>
                <td colspan = '1' id = 'DRAWN'>
                    <p>
                        DRAWN_BY <br/>"
                        . htmlspecialchars($row["DRAWN_BY"])."<br/>"
                        . htmlspecialchars($row["DRAWN_DATE"]). "
                    </p>
                </td>
                <td colspan = '1' id = 'APPROVED'>
                    <p>
                        APPROVED_BY <br/>"
                        . htmlspecialchars($row["APPROVED_BY"])."<br/>"
                        . htmlspecialchars($row["APPROVED_DATE"]). "
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan = '1' id = 'CHECKED'>
                    <p>
                        CHECKED_BY <br/>"
                        . htmlspecialchars($row["CHECKED_BY"])."<br/>"
                        . htmlspecialchars($row["CHECKED_DATE"]). "
                    </p>
                </td>
                <td colspan = '1' id = 'ISSUED'>
                    <p>
                        ISSUED_BY <br/>"
                        . htmlspecialchars($row["ISSUED_BY"])."<br/>"
                        . htmlspecialchars($row["ISSUED_DATE"]). "
                    </p>
                </td>
            </tr>
            <tr>
                <td id = 'PURPOSE_OF_ISSUE'>
                    <p>
                        PURPOSE_OF_ISSUE <br/>"
                       .htmlspecialchars($row["PURPOSE_OF_ISSUE"]). "
                    </p>
                </td>
                <td id = 'NOTES'>
                    <p>
                        NOTES <br/>"
                       .htmlspecialchars($row["NOTES"]). "
                    </p>
                </td>
            </tr>
        </div>
       ";
    }
else{
    echo "0 results";
}
?>

