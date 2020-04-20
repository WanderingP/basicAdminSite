<?php 
/*Horizontal Query-able view for QGIS table.
                      Must run after query.php
                      THIS FILE WILL NOT WORK WITHOUT QUERY.PHP 

                      Please use head.php to change the image file
                      */


if(!defined('ISITSAFETORUN')){//Defined in h_index_q.php
	die('This file does no useful work alone');
}



//$result comes from query.php
if ($result->num_rows > 0){
        echo "<div class = 'main'>
        <table>
			<caption id = 'Logos'>
				<img src = $imagefile alt = 'Where the logo goes' />
			</caption>
            <thead>
			    <tr id = 'row'>
                    <td colspan = '6' id = 'address'>
				        <p>
                            " . $address . "
                        </p>
                    </td>
                    <td colspan = '2' id = 'HANDLE'>
                        <p>
                            HANDLE <br/>"
					        .htmlspecialchars($row["HANDE"]). "
                        </p>
                    </td>
                    <td colspan = '2' id = 'BLOCKNAME'>
                        <p>
                            BLOCKNAME <br/> "
                            . htmlspecialchars($row["BLOCKNAME"]). "
                        </p>
                    </td>
                    <td id = 'PROJECT'>
                        <p>
                            PROJECT<br/>"
                            . htmlspecialchars($row["PROJECT"]). "
                        </p>
                    </td>
                    <td id = 'DOCUMENT_DESCRIPTION'>
                        <p>
                            DOCUMENT_DESCRIPTION<br/>"
                            . htmlspecialchars($row["DOCUMENT_DESCRIPTION"]). "
                        </p>
                    </td>
                    <td id = 'PROJECT_ID'>
                        <p>
                            PROJECT_ID <br/>" 
                            . htmlspecialchars($row["PROJECT_ID"]). "
                        </p>
                    </td>
                    <td id = 'REVISION'>
                        <p>
                             REVISOIN <br/>"
                           . htmlspecialchars($row["REVISION"]). "
                        </p>
                    </td>
                    <td id = 'PURPOSE_OF_ISSUE' colspan = '2'>
                        <p>
                            PURPOSE_OF_ISSUE <br/>"
                            .htmlspecialchars($row["PURPOSE_OF_ISSUE"]). "
                        </p>
                    </td>
                </tr>
                <tr>
                <td id = 'phone' colspan = '3'>
                        <p>
                            T: " . $phone ." 
                        </p>
                    </td>
				    <td id = 'website' colspan = '3'>
                        <p>
                            Web: " . $web . "
                        </p>
                    </td>
                    <td colspan = '2' id = 'SCALE'>
                        <p>
                            SCALE <br/>"
                            . htmlspecialchars($row["SCALE"])." 
                        </p>
                    </td>
                    <td id = 'DOCUMENT_NUMBER' colspan = '2'>
                        <p>
                            DOCUMENT_NUMBER <br/>"
                            .htmlspecialchars($row["DOCUMENT_NUMBER"]). "
                        </p>
                    </td>
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
                    <td id = 'NOTES' colspan = '2'>
                        <p>
                            NOTES <br/>"
                            .htmlspecialchars($row["NOTES"]). "
                        </p>
                    </td>
                </tr>
            </div> ";
    }
else{
    echo "0 results";
}

?>

