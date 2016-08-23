<?php
	if(isset($_POST['upload'])){
		$imageDetails = $_POST["name"]."|".$_POST["place"]."|".date('dmYGis').$_FILES["file"]["name"]."|"."--@#@--";
		$file = fopen("database.txt","a+") or die("Fayl acilmir");
		fwrite($file,$imageDetails);
		fclose($file);
		
		$fileSource=$_FILES["file"]["tmp_name"];
		$fileName=$_FILES["file"]["name"];
		$fileType=pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
	//	$fileSize=filesize($_FILES["file"]["size"]);
		
		$targetFile="uploads/".date('dmYGis').basename($_FILES["file"]["name"]);
		
		/*if($fileSize > 50){
			echo "Faylin olcusu limitden boyukdur";
		}else */
		if($fileType!="jpg" && $fileType!="png" &&  $fileType!="gif" && $fileType!="JPG" && $fileType!="PNG" &&  $fileType!="GIF"){
			echo "Faylin formati uygun deyil";
		}else{
			move_uploaded_file($fileSource,$targetFile);
			header('Location:index.php');
		}
		
	}//end of isset
?>