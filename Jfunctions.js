// JavaScript source code
function fieldcheck(id) {
    if (document.getElementById(id) === null) { return true; }
    fbid = "fb" + id;


    var fieldvalue = document.getElementById(id).value.trim();


    var pattern;
    var failmessage;


    if (id == "HANDLE") {
        pattern = /^'[0-9a-fA-F]/;
        failmessage = "That doesn't look like a CAD handle.";
    }

    if (id == "BLOCKNAME") {
        pattern = /^[a-zA-Z0-9 ]*$/;
        failmessage = "Only letters, numbers and spaces are permitted here";
    }
    if (id == "PROJECT") {
        pattern = /^[a-z A-Z0-9 .,']*$/;
        failmessage = "Enter a valid project name.";
    }
    if (id == "DOCUMENT_DESCRIPTION") {
        pattern = /^[a-z A-Z0-9 .,-]*$/;
        failmessage = "Only letters, numbers and some special characters are permitted here.";
    }

    if (id == "PROJECT_ID") {
        pattern = /^[a-z A-Z0-9]*$/;
        failmessage = "Only letters, numbers and spaces are permitted here";
    }
    if (id == "REVISION") {
        pattern = /^[a-z A-Z0-9]*$/;
        failmessage = "Only letters, numbers and spaces are permitted here";
    }

    if (id == "SCALE") {
        pattern = /^[a-zA-Z0-9 :]*$/;
        failmessage = "Only letters, numbers, colons and spaces are permitted here";
    }
    if (id == "DOCUMENT_NUMBER") {
        pattern = /^[a-z A-Z 0-9 ,./?']*$/;
        failmessage = "Only letters, numbers, spaces and some special characters are permitted here";
    }

    if (id == "DRAWN_BY") {
        pattern = /^[a-zA-Z ]*$/;
        failmessage = "Only letters and spaces are permitted here";
    }
    if (id == "APPROVED_BY") {
        pattern = /^[a-zA-Z ]*$/;
        failmessage = "Only letters and spaces are permitted here";
    }

    if (id == "CHECKED_BY") {
        pattern = /^[a-zA-Z ]*$/;
        failmessage = "Only letters and spaces are permitted here";
    }
    if (id == "ISSUED_BY") {
        pattern = /^[a-zA-Z ]*$/;
        failmessage = "Only letters and spaces are permitted here";
    }
    if (id == "DRAWN_DATE") {
        pattern = /^[0-9 \/]*$/;
        failmessage = "This should be a 8 digit date written as follows - dd/mm/yyyy.";
    }
    if (id == "APPROVED_DATE") {
        pattern = /^[0-9 \/]*$/;
        failmessage = "This should be a 8 digit date written as follows - dd/mm/yyyy.";
    }

    if (id == "CHECKED_DATE") {
        pattern = /^[0-9 \/]*$/;
        failmessage = "This should be a 8 digit date written as follows - dd/mm/yyyy.";
    }
    if (id == "ISSUED_DATE") {
        pattern = /^[0-9 \/]*$/;
        failmessage = "This should be a 8 digit date written as follows - dd/mm/yyyy.";
    }
    if (id == "PURPOSE-OF_ISSUE") {
        pattern = /^[a-zA-Z ,.]*$/;
        failmessage = "Only letters, spaces and some speical characters are permitted here";
    }
    if (id == "NOTES") {
        pattern = /^[a-zA-Z0-9 ,.]*$/;
        failmessage = "Only letters, spaces and some special characters are permitted here";
    }


     
    if (pattern.test(fieldvalue)) {     
        
        document.getElementById(fbid).innerHTML = "Valid :" + fieldvalue; 
        document.getElementById(fbid).style.backgroundColor = "lightgreen";  
        return true;
    }
    else {                                       
        report = "Only letters, numbers and spaces are permitted here";
        document.getElementById(fbid).innerHTML = failmessage + fieldvalue;    
        document.getElementById(fbid).style.backgroundColor = "red";      
        return false;
    }
}



// Function to validate form

function validate() {
    valid = fieldcheck("HANDLE");
    console.log(valid);
    valid = valid && fieldcheck("BLOCKNAME");
    console.log(valid);
    valid = valid && fieldcheck("PROJECT");
    console.log(valid);
    valid = valid && fieldcheck("DOCUMENT_DESCRIPTION");
    console.log(valid);
    valid = valid && fieldcheck("PROJECT_ID");
    console.log(valid);
    valid = valid && fieldcheck("REVISION");
    console.log(valid);
    valid = valid && fieldcheck("SCALE");
    console.log(valid);
    valid = valid && fieldcheck("DOCUMNET_NUMBER");
    console.log(valid);
    valid = valid && fieldcheck("DRAWN_BY");
    console.log(valid);
    valid = valid && fieldcheck("APPROVED_BY");
    console.log(valid);
    valid = valid && fieldcheck("CHECKED_BY");
    console.log(valid);
    valid = valid && fieldcheck("ISSUED_BY");
    console.log(valid);
    valid = valid && fieldcheck("DRAWN_DATE");
    console.log(valid);
    valid = valid && fieldcheck("APPROVED_DATE");
    console.log(valid);
    valid = valid && fieldcheck("CHECKED_DATE");
    console.log(valid);
    valid = valid && fieldcheck("ISSUED_DATE");
    console.log(valid);
    valid = valid && fieldcheck("PURPOSE_OF_ISSUE");
    console.log(valid);
    valid = valid && fieldcheck("NOTES");
    console.log(valid);
    return valid;
}


//Gets current date
var n = new Date();
var y = n.getFullYear();
var m = n.getMonth() + 1;
var d = n.getDate();
var dates = document.querySelectorAll(".date");
var t = y + "/" + m + "/" + d;

//set empty date fields with todays date
//for (var i = 0; i < dates.length; i++) {
//    var item = dates[i].innerText;
//    if (item == "") {
//        dates[i].innerHTML = d + "/" + m + "/" + y;
//    }
//};

//collects the Url information
//var query = window.location.search;
//params = (new URL(document.location)).searchParams;
//name = params.get("user");
//document.querySelector("input").value = name;



//var drawn = document.querySelector("#drawn").innerHTML;
//var checked = document.querySelector("#checked").innerHTML;
//var approved = document.querySelector("#approved").innerHTML;
//var issued = document.querySelector("#issued").innerHTML;



// adds date to table (no save)
//if (drawn != "") {
//    var x = dates[0].innerHTML;
//    if (x == "") {
//        dates[0].innerHTML = t;
//    }
//}

//if (checked != "") {
//    var x = dates[1].innerHTML;
//    if (x == "") {
//        dates[1].innerHTML = t;
//    }
//}

//if (approved != "") {
//    var x = dates[2].innerHTML;
//    if (x == "") {
//        dates[2].innerHTML = t;
//    } 
//}

//if (issued != "") {
//    var x = dates[3].innerHTML;
//    if (x == "") {
//        dates[3].innerHTML = t;
//    }
//}



function formsubmit() {
    document.myform.submit();
}