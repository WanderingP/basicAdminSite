<?php
	if(!defined('ISITSAFETORUN')) {
	   die('This file does no useful work alone'); 
	}
	?>
	
	<?php
	 	
error_reporting(E_ALL); 
	$section="";
	$thisquery = "SHOW COLUMNS FROM $mytable";
	$result = mysqli_query( $dbhandle, $thisquery ) or die (" Could not action the query " . $thisquery );
	while ($myrow = mysqli_fetch_array($result)) {
		$row[ $myrow[0] ] = ""; 
	}
	?>
	
	<?php
	if(!$valid){echo "<h1>Errors in form - message from server</h1>";}
	//if($valid){echo "<h1>No errors in form - message from server</h1>";}
	if( !empty($webdata['action'])){
	if($webdata['action'] == 'save'){
		$webdata['editid'] ="";
	}}
	
	if( !empty($webdata['editid'])){
		$sql = "SELECT id, HANDLE, BLOCKNAME, PROJECT, DOCUMENT_DESCRIPTION, PROJECT_ID, REVISION, SCALE, DOCUMENT_NUMBER, DRAWN_BY, APPROVED_BY, CHECKED_BY, ISSUED_BY, DRAWN_DATE, APPROVED_DATE, CHECKED_DATE, ISSUED_DATE, PURPOSE_OF_ISSUE, NOTES FROM $mytable WHERE id = ?" ;
		if ($stmt = $dbhandle->prepare($sql)) {
	
			$stmt->bind_param("s", $webdata['editid']);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows > 0) {
				$row = $result->fetch_array(MYSQLI_ASSOC);
	}}
	
	if($webdata['action'] == 'delete'){
		?>
		<h2>Confirm delete this existing data record</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name = "formdelete<?php echo $row["HANDLE"]; ?>" >
		<input type="hidden" name= "editid" id= "editid" value="<?php echo $row["HANDLE"]; ?>" >
		<input type="hidden" name= "action" id= "confirmdelete" value="confirmdelete" >
		<p class="delete"><label for="submitdelete">DELETE:<?php echo $row["HANDLE"] . "  " .htmlspecialchars($row["BLOCKNAME"]). "  " . htmlspecialchars($row["DOCUMENT_NUMBER"]);?></label>
		<input type = "submit" class = "delete" name = "submitdelete" id = "submitdelete" value = "Confirm delete:<?php echo $row['HANDLE'] . "  " .htmlspecialchars($row['BLOCKNAME']). "  " . htmlspecialchars($row['DOCUMENT_NUMBER']) ;?>"></p>
		</form>
		<?php
	}
	
	elseif($webdata['action'] == 'edit'){
					
					?>
						 <h2>Edit an existing data record</h2>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name = "formdelete<?php echo $row["HANDLE"]; ?>" >
						<input type="hidden" name= "editid" id= "editid" value="<?php echo $row["id"]; ?>" >
						<input type="hidden" name= "action" id= "action" value="delete" >
						<p><label for="delete">Delete: </label><input type="submit" name="delete" id="delete" value="Delete Record:  <?php echo $row["HANDLE"] . "  " .htmlspecialchars($row["PROJECT"]).  "  " . htmlspecialchars($row["DOCUMENT_NUMBER"]);?>"></p>
						</form>
						
	
	
	<?php					
					}	
						
						
	}
	else{ 
		if ($valid ){
		?>
		
		<p> </p>
		<label for="sectionb" class="showhide">Enter a new record</label>
		<input type="checkbox" id="sectionb" value="button" style="display:none;"/>
		<section id="bsection">
		<h3>Data Entry Form</h3>
		 <?php
		 $section="</section>";
		}
	}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name = "qgis<?php echo $row["id"]; ?>" onsubmit="return validate()">
		
		<label for="HANDLE">Handle: </label>
		<input type="text" name="HANDLE" id="HANDLE" required maxlength="50" minlength="1" value="<?php if ($valid){echo htmlspecialchars($row["HANDLE"]);}
		else{echo htmlspecialchars($webdata["HANDLE"]);} ?>" onchange="fieldcheck(this.id)">
		<span id="FBHANDLE">  
		</span><?php if (!$valid){echo $formerror["HANDLE"]  ;} ?>
	
	
		
		<p><label for="BLOCKNAME">Block Name: </label>
		<input type="text" name="BLOCKNAME" id="BLOCKNAME" required maxlength="50" minlength="1" value="<?php if ($valid){echo htmlspecialchars($row["BLOCKNAME"]);}
		else{echo htmlspecialchars($webdata["BLOCKNAME"]);} ?>" onchange="fieldcheck(this.id)">
		<span id="FBBLOCKNAME">  </span>
		<?php if (!$valid){echo $formerror["BLOCKNAME"]  ;} ?></p>
	
	
		<p><label for="PROJECT">Project: </label>
		<input type="text" name="PROJECT" id="PROJECT"  maxlength="75" minlength="4" value="<?php if ($valid){echo htmlspecialchars($row["PROJECT"]); }else{echo htmlspecialchars($webdata["PROJECT"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBPORJECT">  </span><?php if (!$valid){echo  $formerror["PROJECT"]  ;} ?></p>
	
	
		<p><label for="DOCUMENT_DESCRIPTION">Document Description: </label>
		<input type="text" name="DOCUMENT_DESCRIPTION" id="DOCUMENT_DESCRIPTION" minlength="8" maxlength="40" value="<?php if ($valid){echo htmlspecialchars($row["DOCUMENT_DESCRIPTION"]); }else{echo htmlspecialchars($webdata["DOCUMENT_DESCRIPTION"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBDOCUMENT_DESCRIPTION">  </span><?php if (!$valid){echo  $formerror["DOCUMENT_DESCRIPTION"]  ;} ?></p>
	
		<p><label for="PROJECT_ID">Project ID: </label>
		<input type="text" name="PROJECT_ID" id="PROJECT_ID" minlength="1" maxlength="15" value="<?php if ($valid){echo htmlspecialchars($row["PROJECT_ID"]); }else{echo htmlspecialchars($webdata["PROJECT_ID"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBPROJECT_ID">  </span><?php if (!$valid){echo  $formerror["PROJECT_ID"]  ;} ?></p>
	
		<p><label for="REVISION">Revision: </label>
		<input type="text" name="REVISION" id="REVISION" minlength="1" maxlength="15" value="<?php if ($valid){echo htmlspecialchars($row["REVISION"]); }else{echo htmlspecialchars($webdata["REVISION"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBREVISION">  </span><?php if (!$valid){echo  $formerror["REVISION"]  ;} ?></p>
	

		<p><label for="SCALE">Scale: </label>
		<input type="text" name="SCALE" id="SCALE" minlength="1" maxlength="20" value="<?php if ($valid){echo htmlspecialchars($row["SCALE"]); }else{echo htmlspecialchars($webdata["SCALE"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBSCALE">  </span><?php if (!$valid){echo  $formerror["SCALE"]  ;} ?></p>
	
	
		<p><label for="DOCUMENT_NUMBER">Document Number: </label>
		<input type="text" name="DOCUMENT_NUMBER" id="DOCUMENT_NUMBER" minlength="1" maxlength="20" value="<?php if ($valid){echo htmlspecialchars($row["DOCUMENT_NUMBER"]); }else{echo htmlspecialchars($webdata["DOCUMENT_NUMBER"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBDOCUMENT_NUMBER">  </span><?php if (!$valid){echo  $formerror["DOCUMENT_NUMBER"]  ;} ?></p>


		<p><label for="DRAWN_BY">Drawn By: </label>
		<input type="text" name="DRAWN_BY" id="DRAWN_BY" minlength="0" maxlength="8" value="<?php if ($valid){echo htmlspecialchars($row["DRAWN_BY"]); }else{echo htmlspecialchars($webdata["DRAWN_BY"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBDRAWN_BY">  </span><?php if (!$valid){echo  $formerror["DRAWN_BY"]  ;} ?></p>
	

		<p><label for="APPROVED_BY">Approved by: </label>
		<input type="text" name="APPROVED_BY" id="APPROVED_BY" minlength="0" maxlength="8" value="<?php if ($valid){echo htmlspecialchars($row["APPROVED_BY"]); }else{echo htmlspecialchars($webdata["APPROVED_BY"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBAPPROVED_BY">  </span><?php if (!$valid){echo  $formerror["APPROVED_BY"]  ;} ?></p>
	
		<p><label for="CHECKED_BY">Checked By: </label>
		<input type="text" name="CHECKED_BY" id="CHECKED_BY" minlength="0" maxlength="8" value="<?php if ($valid){echo htmlspecialchars($row["CHECKED_BY"]); }else{echo htmlspecialchars($webdata["CHECKED_BY"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBCHECKED_BY">  </span><?php if (!$valid){echo  $formerror["CHECKED_BY"]  ;} ?></p>
	
	
		<p><label for="ISSUED_BY">Issued By: </label>
		<input type="text" name="ISSUED_BY" id="ISSUED_BY" minlength="0" maxlength="8" value="<?php if ($valid){echo htmlspecialchars($row["ISSUED_BY"]); }else{echo htmlspecialchars($webdata["ISSUED_BY"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBISSUED_BY">  </span><?php if (!$valid){echo  $formerror["ISSUED_BY"]  ;} ?></p>
	
		<p><label for="DRAWN_DATE">Drawn Date: </label>
		<input type="text" name="DRAWN_DATE" id="DRAWN_DATE" minlength="0" maxlength="8" value="<?php if ($valid){echo htmlspecialchars($row["DRAWN_DATE"]); }else{echo htmlspecialchars($webdata["DRAWN_DATE"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBDRAWN_DATE">  </span><?php if (!$valid){echo  $formerror["DRAWN_DATE"]  ;} ?></p>
	

		<p><label for="APPROVED_DATE">Approved Date: </label>
		<input type="text" name="APPROVED_DATE" id="APPROVED_DATE" minlength="0" maxlength="8" value="<?php if ($valid){echo htmlspecialchars($row["APPROVED_DATE"]); }else{echo htmlspecialchars($webdata["APPROVED_DATE"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBAPPROVED_DATE">  </span><?php if (!$valid){echo  $formerror["APPROVED_DATE"]  ;} ?></p>
	
		<p><label for="CHECKED_DATE">Checked Date: </label>
		<input type="text" name="CHECKED_DATE" id="CHECKED_DATE" minlength="0" maxlength="8" value="<?php if ($valid){echo htmlspecialchars($row["CHECKED_DATE"]); }else{echo htmlspecialchars($webdata["CHECKED_DATE"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBCHECKED_DATE">  </span><?php if (!$valid){echo  $formerror["CHECKED_DATE"]  ;} ?></p>
	
	
		<p><label for="ISSUED_DATE">Issued Date: </label>
		<input type="text" name="ISSUED_DATE" id="ISSUED_DATE" minlength="0" maxlength="8" value="<?php if ($valid){echo htmlspecialchars($row["ISSUED_DATE"]); }else{echo htmlspecialchars($webdata["ISSUED_DATE"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBISSUED_DATE">  </span><?php if (!$valid){echo  $formerror["ISSUED_DATE"]  ;} ?></p>
	
	
		<p><label for="PURPOSE_OF_ISSUE">Purpose Of Issue: </label>
		<input type="text" name="PURPOSE_OF_ISSUE" id="PURPOSE_OF_ISSUE" minlength="1" maxlength="30" value="<?php if ($valid){echo htmlspecialchars($row["PURPOSE_OF_ISSUE"]); }else{echo htmlspecialchars($webdata["PURPOSE_OF_ISSUE"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBPURPOSE_OF_ISSUE">  </span><?php if (!$valid){echo  $formerror["PURPOSE_OF_ISSUE"]  ;} ?></p>

		<p><label for="NOTES">Notes: </label>
		<input type="text" name="NOTES" id="NOTES" minlength="1" maxlength="30" value="<?php if ($valid){echo htmlspecialchars($row["NOTES"]); }else{echo htmlspecialchars($webdata["NOTES"]);}?>" onchange="fieldcheck(this.id)">
		<span id="FBNOTES">  </span><?php if (!$valid){echo  $formerror["NOTES"]  ;} ?></p>
		
		<input type="submit" name="submit<?php echo $row["id"]; ?>" id="submit<?php echo $row["id"]; ?>" value="SUBMIT"></p>
		<input type ="hidden" name = "editid" id= "editid" value = "<?php if ($valid){echo $row["HANDLE"];}else{echo $webdata["HANDLE"];} ?>" >
		<input type ="hidden" name = "action" id= "action" value = "save" >
	</form>
	<?php
	
	echo $section;
	?>