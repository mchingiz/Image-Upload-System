<?php
	$file=fopen("database.txt","r") or die("Fayl acilmadi");
	$database=fread($file, filesize('database.txt'));
	fclose($file);

	$files=[];

	$files=explode("--@#@--",$database);
	foreach($files as $key => $value){
		$files[$key]=explode("|",$value);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" src="style.css">
		<style>
			input{
				display:block;
				margin:10px;
			}
			table{
				border:1px solid black;
			}
			td{
				border:1px solid black;
				width:300px;
			}
		</style>
	</head>
	<body>
	<div class="main">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="text" name="name">
			<input type="text" name="place">
			<input type="file" name="file">
			<input type="submit" value="Gonder" name="upload">
		</form>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Place</th>
					<th>Photo name</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($files as $value){
						echo "<tr>";
						if (isset($value[1])) {
							echo "<td> $value[0]</td><td> $value[1]</td><td><img src=uploads/".$value[2]." height=150 width=200/></td>";
							echo "</tr>";
						}
					}
				?>
			</tbody>
		</table>
	</div>
	</body>
</html>