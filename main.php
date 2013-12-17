<form method="post" enctype="multipart/form-data">
	<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
		<tr>
			<td width="246">
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
			<input name="userfile" type="file" id="userfile">
			</td>
		</tr>
		<tr>
			<td>
			<input type="text" name="komen">
			<br>
			</td>
		</tr>
		<tr>
			<td>
			<input type="text" name="alamat">
			<br>
			</td>
		</tr>
		<tr>
			<td width="80">
			<input name="upload" type="submit" class="box" id="upload" value=" Upload ">
			</td>
		</tr>
	</table>
</form>

<?php
//connect database
require_once('dbconnect.php');

if (isset($_POST['upload']) && $_FILES['userfile']['size'] > 0) {
	$fileName = $_FILES['userfile']['name'];
	$tmpName = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	$address = $_POST['alamat'];
	$address2 = str_replace(" ", "+", $address);
	$komen = $_POST['komen'];
	$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address2&sensor=false&region=Indonesia");
	$json = json_decode($json);
	$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
	$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	$fp = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);

	if (!get_magic_quotes_gpc()) {
		$fileName = addslashes($fileName);
	}

	echo "$lat";
	echo $_POST['alamat'];
	$sql = "INSERT INTO daerah_banjir (NAMA_WILAYAH, COMMENT, LATITUDE, LONGITUDE, picname, picsize, pictype, pic) values ('$address','$komen','$lat','$long','$fileName','$fileSize','$fileType','$content')";
	mysql_query($sql);
}
?>