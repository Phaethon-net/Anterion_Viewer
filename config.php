<?php
	$Sitle = "AnterionViewer";
	$favicon = "faviconCW.ico";
	$machine = "Anterion";
	$version = "20230119A";
	$viewer = "spotlight";
	$today = date("Ymd");
	$toggleView = [];
	switch($_SERVER['SERVER_NAME']){
		case "localhost":
		case "visionresearch.org":
			$file = $_SERVER ["SCRIPT_NAME"];
			$path = dirname(__DIR__).$machine."_data\\";
			$baseURL = url();
			$dataURL = $baseURL."/".$machine."_data/";
			break;
		case "eyeclinic":
			$file = $_SERVER ["SCRIPT_NAME"];
			$path = "D:/".$machine."_data/";
			$baseURL = url()."/".$machine."Viewer/";
			$dataURL = url()."/".$machine."_data/";
			break;
	}

	function url(){
	  return sprintf(
		"%s://%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME']
	  );
	}


/*
	echo "<pre>";
	echo print_r($_SERVER);
	echo "</pre>";
	echo $_SERVER['SERVER_NAME']."<br>";
	echo $path."<br>";
	echo $baseURL."<br>";
	echo $dataURL."<br>";
*/
