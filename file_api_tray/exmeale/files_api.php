<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include 'dpconfig.php'; // include database connection file

// collect input parameters and convert into readable format
// convart json dat too php data
$data = json_decode(file_get_contents("php://input"), true); 
	// orginal name
$fileName  =  $_FILES['sendimage']['name'];
// the temporary loctian 
$tempPath  =  $_FILES['sendimage']['tmp_name'];
// file size 
$fileSize  =  $_FILES['sendimage']['size'];	

// confiarm value not null

if(empty($fileName))
{
    // error masseg 
	$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
    // set upload folder path // 
	$upload_path = 'upload/';
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	
	// valid image extensions  allow 
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 

					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path
		if(!file_exists($upload_path . $fileName))
		{
			// check file size '5MB'
			if($fileSize < 5000000){
                // move file from system temporary path to our upload folder path 
				move_uploaded_file($tempPath, $upload_path . $fileName); 
			}
			else{		
				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
		}
		else
		{		
			$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
			echo $errorMSG;
		}
	}
	else
	{		
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		echo $errorMSG;		
	}
}
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$query = mysqli_query($conn,'INSERT into tbl_image (name) VALUES("'.$fileName.'")');
			
	echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));	
}