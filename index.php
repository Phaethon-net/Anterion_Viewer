  <?php
	ini_set("memory_limit","256M");
	if(file_exists('D:\inetpub\wwwroot\staff\ACL.php')){
		include('D:\inetpub\wwwroot\staff\ACL.php');
	}
	include('config.php');

	$idx = "";
	if(isset($_GET['id'])) {
		// id index exists
		$idx = $_GET['id'];
	} else {
		$idx = 0;
	}
	if(isset($_GET['date'])) {
		// id date exists
		$date = $_GET['date'];
	} else {
		$date = "";
	}
/*
	echo "<pre>";
	echo print_r($_GET);
	echo "</pre>";
*/
	include ('header.php');
	include ('banner.php');

	print "	<div id='index'>";
	print "		<hr>";
	print"		<a class='index0' href='".$file."?id=0'><strong>TODAY</strong></a>";
	print"		<a class='index' href='".$file."?id=A'><strong>A</strong></a>";
	print"		<a class='index' href='".$file."?id=B'><strong>B</strong></a>";
	print"		<a class='index' href='".$file."?id=C'><strong>C</strong></a>";
	print"		<a class='index' href='".$file."?id=D'><strong>D</strong></a>";
	print"		<a class='index' href='".$file."?id=E'><strong>E</strong></a>";
	print"		<a class='index' href='".$file."?id=F'><strong>F</strong></a>";
	print"		<a class='index' href='".$file."?id=G'><strong>G</strong></a>";
	print"		<a class='index' href='".$file."?id=H'><strong>H</strong></a>";
	print"		<a class='index' href='".$file."?id=I'><strong>I</strong></a>";
	print"		<a class='index' href='".$file."?id=J'><strong>J</strong></a>";
	print"		<a class='index' href='".$file."?id=K'><strong>K</strong></a>";
	print"		<a class='index' href='".$file."?id=L'><strong>L</strong></a>";
	print"		<a class='index' href='".$file."?id=M'><strong>M</strong></a>";
	print"		<a class='index' href='".$file."?id=N'><strong>N</strong></a>";
	print"		<a class='index' href='".$file."?id=O'><strong>O</strong></a>";
	print"		<a class='index' href='".$file."?id=P'><strong>P</strong></a>";
	print"		<a class='index' href='".$file."?id=Q'><strong>Q</strong></a>";
	print"		<a class='index' href='".$file."?id=R'><strong>R</strong></a>";
	print"		<a class='index' href='".$file."?id=S'><strong>S</strong></a>";
	print"		<a class='index' href='".$file."?id=T'><strong>T</strong></a>";
	print"		<a class='index' href='".$file."?id=U'><strong>U</strong></a>";
	print"		<a class='index' href='".$file."?id=V'><strong>V</strong></a>";
	print"		<a class='index' href='".$file."?id=W'><strong>W</strong></a>";
	print"		<a class='index' href='".$file."?id=X'><strong>X</strong></a>";
	print"		<a class='index' href='".$file."?id=Y'><strong>Y</strong></a>";
	print"		<a class='index' href='".$file."?id=Z'><strong>Z</strong></a>";
	print"		<a class='index' href='".$file."?id=@'><strong>@</strong></a>";
	print"		<hr>";
	print "	</div>";

/*
	print "	<div id='overlay'>";
	print "		<canvas class='canvas' id='canvas' name='original'></canvas>";
	print "		<div id='brightness'>brightness: 1.00</div>";
	print "		<div id='contrast'>contrast: 1.00</div>";
	print "		<div id='zoom'>zoom: 1.00</div>";
	print "		<div id='closer' onclick='dismiss()'>X</div>";
	print "		<div id='help' onclick='openHelp()'>?</div>";
	print "		<div id='helper' onclick='closeHelp()'>";
	print "<h3>ClarusView Help</h3>";
	print "<span class='bold'>Zoom in/out:</span> Use mouse scroll over image.<br>";
	print "<span class='bold'>Toggle digital red-free mode:</span> Press Alt key and left-click on image.<br>";
	print "<span class='bold'>Pan around:</span> Click & hold left mouse button over image and drag.<br>";
	print "<span class='bold'>Contrast up/down:</span> Hold ctrl key + mouse scroll over image.<br>";
	print "<span class='bold'>Brightness up/down:</span> Hold shift key + mouse scroll over image.<br><br>";
	print "Click on this panel to dismiss.";
	print "		</div>";
	print "	</div>";
*/

	if(strlen($idx) > 2){
		// IF IDX IS A FOLDER
		if(strlen($date) == 0){
			// IF IDX DOES NOT SPECIFY A DATE (EXAM)
			$glob = $path.$idx."/*.pdf";
			$results = (glob($glob));
			foreach($results as $result)
			{
				$values = explode('_', basename($result));
				$dates[] = $values[7];
				$id = $values[0]."_".$values[1]."_".$values[2]."_".$values[3];
				$array[$id][]=$result;
			}
			$a2 = array_keys($array);
			print"		<table border=0>";
			foreach(array_keys($array) as $patient){
				$parts = explode('_', $patient);
				print"		<tr>";
				print"			<td class='name'>";
				print "					<span class='namelabel'>".$parts[0].", ".$parts[1]."</span><br/>";
				print "					<span class='idlabel'>".$parts[2]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$parts[3] = substr($parts[3], 0, 10);
				$dob = DateTime::createFromFormat('Ymd', $parts[3]);
				print $dob->format('d-M-Y')."</span>";
				print"</td>";
				$alldates = glob($patient."*.jpg");
				unset($udates);
				unset($datex);
				foreach($results as $datey){
					$vals = explode('_', $datey);
					$datex[] = substr($vals[6], 0, 10);
				}
				$udates = array_unique($datex);
				natcasesort($udates);
				foreach($udates as $date){
				$id = $parts[0]."_".$parts[1]."_".$parts[2]."_".$parts[3];
					echo "			<td class='date'><a href='".$file."?id=".urlencode($id)."&date=$date'>".date("d-M-Y", strtotime($date))."</a></td>";
				}
				print"	</tr>";
			}
			print"	</table>";
		} else {
			// IF IDX DOES SPECIFY A DATE (EXAM)
			$id = $idx."_".$date;
			$glob = $path.$idx."/*.pdf";
			$images = (glob($glob));
/*
	echo "<pre>";
	echo print_r($images);
	echo "</pre>";
*/
				if(!empty($images)){
					natcasesort($images);
					// GET ID FROM FIRST IMAGE & BUILD HEADER BOX
					$parts = explode('_', basename($images[0]));
					print "	<div class='header'>";
						if($machine == "SlitLamp"){
							print "		<span class='label'>Name:</span> $parts[0], $parts[1]&nbsp;&nbsp;&nbsp;<span class='label'>MRN:</span> $parts[2]&nbsp;&nbsp;&nbsp;<span class='label'>DoB</span>: ".date("d-M-Y", strtotime($parts[3]))."<br/>";
						}
						if($machine == "Clarus"){
							print "		<span class='label'>Name:</span> $parts[0], $parts[1]&nbsp;&nbsp;&nbsp;<span class='label'>MRN:</span> $parts[2]&nbsp;&nbsp;&nbsp;<span class='label'>DoB</span>: ".date("d-M-Y", strtotime($parts[3]))."<br/>";
						}
						if($machine == "Anterion"){
							print "		<span class='label'>Name:</span> $parts[1], $parts[2]&nbsp;&nbsp;&nbsp;<span class='label'>MRN:</span> $parts[0]&nbsp;&nbsp;&nbsp;<span class='label'>DoB</span>: ".date("d-M-Y", strtotime($parts[3]))."<br/>";
						}
					$newDate = date("d-M-Y", strtotime($date));
					print "		<span class='label'>Exam Date:</span> $newDate";
					print "	</div>";
					print "	<div class='content' id='content'>";
					// RIGHT EYE ITEMS ON SPECIFIED DATE
					print "		<div class='reports' id='reports'>";
					print "			<div class='title'>Reports</div>";
					foreach($images as $image)
					{
						if(strpos($image, ".pdf") != false && strpos($image, "_".$date) != false && strpos($image, "/t-") == false){
							$values = explode('_', basename($image, ".pdf"));
							//DEAL WITH SPECIAL CHARACTERS IN FILENAMES FOR SPOTLIGHT
							$data_src = $dataURL.$idx."/".basename($image);
							if(strpos($data_src, "'") !== false){$data_src = str_replace("'", "%27",$data_src);}// APOSTROPHES
							if(strpos($data_src, "'") !== false){$data_src = str_replace("'", "%20",$data_src);}// SPACES
							print"		<div class='cell'>";
							print"			<a target='_blank' class='pdf' href='$data_src'>";
//							print"			    <img src='pdf.png' width=16 height=20> ".$values[5]." : ".substr(basename($image),-6,-4)." ; Last Modified: ".gmdate("Y-m-d H:i:s", filemtime($image));
							print"			    <img src='pdf.png' width=16 height=20> ".$values[5]." : ".$values[7]." ; Created: ".gmdate("Y-m-d H:i:s", $values[8]);
							print"			</a>";
							print"		</div>";
						}
					}
					print "			</div>";
				}
		}
	} else {
		if($idx == '0') {
			// IF TODAY ONLY
			$results = fileFilter (glob($path."*"), $today);
			$count = 0;
/*
			foreach($results as $result){
				if(!glob($result."/*{$today}*.pdf")){
					unset($results[$count]);
					$count++;
				}
			}
	echo "<pre>";
	echo print_r($results);
	echo "</pre>";
*/
		} else {
			// OTHERWISE IF ALPHABETIC SUBGROUP OR, IF INITIAL LETTER NOT SPECIFIED, ALL PATIENTS
			$glob = $path.$idx."*";
			$results = (glob($glob,GLOB_ONLYDIR));
		}
		// LIST FOUND ITEM AND UNIQUE EXAM DATES FOR EACH
		natcasesort($results);
		foreach($results as $result){
				$parts = explode('_', $result);
				//FIRST CELL - PATIENT ID
					$parts = explode('_', basename($result));
					print"	<div class='div_wrap'>";
					print"		<div class='div_pat'>";
					print "				<span class='namelabel'>".$parts[0].", ".$parts[1]."</span><br/>";
					print "				<span class='idlabel'>".$parts[2]."<br/>";
//										$parts[3] = substr($parts[3], 0, 10);
//										$dob = DateTime::createFromFormat('Ymd', $parts[3]);
//										print $dob->format('d-M-Y');
										print "</span>";
					print"		</div>";
					$alldates = glob(($result)."/*.pdf");
					unset($udates);
					unset($datex);
					$datex = [];
					$datey = [];
					foreach($alldates as $datey){
						$vals = explode('_', basename($datey));
						if($machine == "SlitLamp"){ $datex[] = substr($vals[4], 0, 10); }
						if($machine == "Clarus"){ $datex[] = substr($vals[7], 0, 8); }
						if($machine == "Anterion"){ $datex[] = substr($vals[6], 0, 10); }
					}
					if(count($datex) > 0){
						$udates = array_unique($datex);
						natcasesort($udates);
						print"		<div class='div_list'>";
						foreach($udates as $date){
						print"			<div class='div_date'>";
						print"				<a href='".$file."?id=".urlencode(basename($result))."&date=$date'>".date("d-M-Y", strtotime($date))."</a>";
						print"			</div>";
						}
						print"		</div>";
					}
					print"		</div>";
					print"		<hr>";
			//}
		}
	}


	function fileFilter ($files, $date, $format = 'Ymd') {
		$selectedFiles = array ();

		foreach ($files as $file) {
			if (date ($format, filemtime ($file)) == $date) {
				$selectedFiles[] = $file;
			}
		}
		return $selectedFiles;
	}

	function Thumbnail($url, $filename, $width = 150, $height = true) {
		 // download and create gd image
		$image = ImageCreateFromString(file_get_contents(urldecode($url)));
		// calculate resized ratio
		// Note: if $height is set to TRUE then we automatically calculate the height based on the ratio
		$height = $height === true ? (ImageSY($image) * $width / ImageSX($image)) : $height;
		// create image
		$output = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));
		// save image
		ImageJPEG($output, $filename, 95);
		// return resized image
		return $output; // if you need to use it
	}



