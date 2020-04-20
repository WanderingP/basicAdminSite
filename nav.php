<?php
if(!defined('ISITSAFETORUN')){
	die("This file does no useful work by itself.");
}

/*This file produces the navigation menu*/
?>
<nav>
	<ul>
		<li>
			<a href = "index.php">View</a>
		</li>
		<li class = "dropdown">
			<a href = "javascript:void(0)" class = "dropbtn">Tables</a>
			<div class = "dropdown-content">
				<a href = "h_index_q.php"> Horizontal From Query</a>
				<a href = "v_index_q.php"> Vertical From Query</a>
			</div>
		</li>
	</ul>
</nav>