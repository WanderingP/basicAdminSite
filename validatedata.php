<?php
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}

/* This file validates data that is input via the web interface*/


?>
<?php
$formerror['HANDLE'] = '';
$formerror['BLOCKNAME'] = '';
$formerror['PROJECT'] = '';
$formerror['DOCUMENT_DESCRIPTION'] = '';
$formerror['PROJECT_ID'] = '';
$formerror['REVISION'] = '';
$formerror['SCALE'] = '';
$formerror['DOCUMENT_NUMBER'] = '';
$formerror['DRAWN_BY'] = '';
$formerror['CHECKED_BY'] = '';
$formerror['APPROVED_BY'] = '';
$formerror['ISSUED_BY'] = '';
$formerror['DRAWN_DATE'] = '';
$formerror['CHECKED_DATE'] = '';
$formerror['APPROVED_DATE'] = '';
$formerror['ISSUED_DATE'] = '';
$formerror['PURPOSE_OF_ISSUE'] = '';
$formerror['NOTES'] = '';

$vaild = TRUE; 

//CLIENT
if(isset($webdata['HANDLE'])){
    if (!preg_match("/^'[0-9a-fA-F]{2,12}$/",$webdata['HANDLE'])) {
    $formerror['HANDLE'] = '<span class="warn" >Not valid on server: Enter a valid CAD handle</span>'; 
    $valid = FALSE;
  }
}
//PROJECT
if(isset($webdata['BLOCKNAME'])){
    if (!preg_match("/^[a-zA-Z0-9 ]{0,50}$/",$webdata['BLOCKNAME'])){
        $formerror['BLOCKNAME'] = '<span class="warn" >Not valid on server.</span>'; 
        $valid = FALSE;
    }
}
//DESCRIPTION
if(isset($webdata['PROJECT'])){
    if (!preg_match("/^[a-zA-Z0-9 .,']{4,75}$/",$webdata['PROJECT'])){
        $formerror['PROJECT'] = '<span class="warn" >Not valid on server: Enter the project name.</span>'; 
        $valid = FALSE;
    }
}
//FILENAME
if(isset($webdata['DOCUMENT_DESCRIPTION'])){
    if (!preg_match("/^[a-zA-Z0-9 .,-]{0,100}$/",$webdata['DOCUMENT_DESCRIPTION'])){
        $formerror['DOCUMENT_DESCRIPTION'] = '<span class="warn" >Not valid on server. </span>'; 
        $valid = FALSE;
    }
}
//REVISION
if(isset($webdata['PROJECT_ID'])){
    if (!preg_match("/^[a-zA-Z 0-9]{0,15}$/",$webdata['PROJECT_ID'])){
        $formerror['PROJECT_ID'] = '<span class="warn" >Not valid on server.</span>'; 
        $valid = FALSE;
    }
}
//STATUS
if(isset($webdata['REVISION'])){
    if (!preg_match("/^[a-zA-Z0-9 ]{0,20}$/",$webdata['REVISION'])){
        $formerror['REVISION'] = '<span class="warn" >Not valid on server.</span>'; 
        $valid = FALSE;
    }
}
//SCALE
if(isset($webdata['SCALE'])){
    if (!preg_match("/^[a-zA-Z0-9 :]{0,20}$/",$webdata['SCALE'])){
        $formerror['SCALE'] = '<span class="warn" >Not valid on server: A scale is required. </span>'; 
        $valid = FALSE;
    }
}
//SHEETSIZE
if(isset($webdata['DOCUMENT_NUMBER'])){
    if (!preg_match("/^[a-zA-Z0-9 _\/?]{4,30}$/",$webdata['DOCUMENT_NUMBER'])){
        $formerror['DOCUMENT_NUMBER'] = '<span class="warn" >Not valid on server: A document number is required.</span>'; 
        $valid = FALSE;
    }
}
//DRAWN
if(isset($webdata['DRAWN_BY'])){
    if (!preg_match("/^[a-zA-Z ]{0,24}$/",$webdata['DRAWN_BY'])){
        $formerror['DRAWN_BY'] = '<span class="warn" >Not valid on server: Only letters and white space allowed. </span>'; 
        $valid = FALSE;
    }
}
//CHECKED
if(isset($webdata['CHECKED_BY'])){
    if (!preg_match("/^[a-zA-Z ]{0,24}$/",$webdata['CHECKED_BY'])){
        $formerror['CHECKED_BY'] = '<span class="warn" >Not valid on server: Only letters and white space allowed. </span>'; 
        $valid = FALSE;
    }
}
//APPROVED
if(isset($webdata['APPROVED_BY'])){
    if (!preg_match("/^[a-zA-Z ]{0,24}$/",$webdata['APPROVED_BY'])){
        $formerror['APPROVED_BY'] = '<span class="warn" >Not valid on server: Only letters and white space allowed. </span>'; 
        $valid = FALSE;
    }
}
//ISSUED
if(isset($webdata['ISSUED_BY'])){
    if (!preg_match("/^[a-zA-Z ]{0,24}$/",$webdata['ISSUED_BY'])){
        $formerror['ISSUED_BY'] = '<span class="warn" >Not valid on server: Only letters and white space allowed. </span>'; 
        $valid = FALSE;
    }
}
//DRAWN DATE
if(isset($webdata['DRAWN_DATE'])){
    if (!preg_match("/^[0-9 \/]{0,10}$/",$webdata['DRAWN_DATE'])){
        $formerror['DRAWN_DATE'] = '<span class="warn" >Not valid on server: This should be a 8 digit date written as follows - dd/mm/yyyy.  </span>'; 
        $valid = FALSE;
    }
}
//CHECKED DATE
if(isset($webdata['CHECKED_DATE'])){
    if (!preg_match("/^[0-9 \/]{0,10}$/",$webdata['CHECKED_DATE'])){
        $formerror['CHECKED_DATE'] = '<span class="warn" >Not valid on server: This should be a 8 digit date written as follows - dd/mm/yyyy.  </span>'; 
        $valid = FALSE;
    }
}
//APPROVED DATE
if(isset($webdata['APPROVED_DATE'])){
    if (!preg_match("/^[0-9 \/ ]{0,10}$/",$webdata['APPROVED_DATE'])){
        $formerror['APPROVED_DATE'] = '<span class="warn" >Not valid on server: This should be a 8 digit date written as follows - dd/mm/yyyy. </span>'; 
        $valid = FALSE;
    }
}
//ISSUED DATE
if(isset($webdata['ISSUED_DATE'])){
    if (!preg_match("/^[0-9 \/ ]{0,10}$/",$webdata['ISSUED_DATE'])){
        $formerror['ISSUED_DATE'] = '<span class="warn" >Not valid on server: This should be a 8 digit date written as follows - dd/mm/yyyy. </span>'; 
        $valid = FALSE;
    }
}
//PURPOSE_OF_ISSUE
if(isset($webdata['PURPOSE_OF_ISSUE'])){
    if (!preg_match("/^[a-zA-Z .,]{0,80}$/",$webdata['PURPOSE_OF_ISSUE'])){
        $formerror['PURPOSE_OF_ISSUE'] = '<span class="warn" >Not valid on server: Please remove any special characters </span>'; 
        $valid = FALSE;
    }
}
//NOTES
if(isset($webdata['NOTES'])){
    if (!preg_match("/^[a-zA-Z0-9 ,. ]{0,80}$/",$webdata['NOTES'])){
        $formerror['NOTES'] = '<span class="warn" >Not valid on server: Please remove any special characters. </span>'; 
        $valid = FALSE;
    }
}

?>