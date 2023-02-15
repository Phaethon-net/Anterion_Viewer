<?php
print"<hr>";
print"<div class='banner-content'>";
print"	<div class='banner-left'>";
print"		<span class='title-script'>Anterion</span>&nbsp;&nbsp;<span class='title-plain'>Viewer</span>";
			if($_SERVER['SERVER_NAME'] != "eyeclinic"){
				print"<span style='color:red; font-size:larger;'><br>Demonstration version: Click [T] for images of a test eye and [Z] for an exam of a real eye.</span>";
			}
print"	</div>";
print"	<div class='banner-right'>";
/*
print"	<br>";
print"		<span class='togglecaption'>Change Viewer:</span>";
	echo "<pre>";
	echo print_r($_COOKIE['toggleView']);
	echo "</pre>";
if($_COOKIE['toggleView']){
	$toggleView = $_COOKIE['toggleView'];
} else {
	$toggleView = "Spotlight";
}
print"		<div class='toggleview' id='toggleview' onclick='toggleViewer()'>$toggleView</div>";
*/
print"	<br><br><br>";
print"		<span class='phaethon'>Phaethon.net</span>";
print"		<span class='version'>v.$version</span>";
print"	</div>";
print"</div>";

/*
	echo "<pre>";
	echo print_r($_COOKIE['toggleView']);
	echo "</pre>";
*/