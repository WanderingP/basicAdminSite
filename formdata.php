<?php
if(!defined('ISITSAFETORUN')) {
   die('This file does no useful work alone'); 
}
?>
<section>
<?php

if (!empty($_POST))
{
    foreach ($_POST as $key => $value)
    {
		if ( is_array( $value )){ 
			//echo "<hr /><p>Checking checkbox data</p>";
			foreach ($value as $cbkey => $cbvalue) 
			{
				//echo "<p>Key = {$key} Array= {$cbkey}  Value= {$cbvalue} </p>";
				$webdata[$key.$cbkey] = $cbvalue; 
			}
		} else{
       // echo "<p>Key = {$key}  Value= {$value} </p>";
        $webdata[$key] = $value;
		}
    }
} 
else{
	//echo "<p>No POST data</p>";
	$webdata['none'] = 'none';
}
?>
</section>