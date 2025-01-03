<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include 'dpconfig.php'; // include database connection file

// collect input parameters and convert into readable format
// convart json dat too php data
$data = json_decode(file_get_contents("php://input"), true); 


	// Configure upload directory and allowed file types
	$upload_path = 'upload'.DIRECTORY_SEPARATOR;
		
	$allowed_types = array('jpg', 'png', 'jpeg', 'gif');
	
	// Define maxsize for files i.e 2MBmulti fileUploudExmpael
	$maxsize = 5 * 1024 * 1024;	

	// Checks if user sent an empty form
	if(!empty(array_filter($_FILES['files']['name']))) {

		// Loop through each file in files[] array
		foreach ($_FILES['files']['tmp_name'] as $key => $value) {
			
			$tempPath = $_FILES['files']['tmp_name'][$key];
			$fileName = $_FILES['files']['name'][$key];
			$fileSize = $_FILES['files']['size'][$key];
	 // get image extension 
	 $file_ext = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	
			// Set upload file path
			$filepath = $upload_path.$fileName;

			// Check file type is allowed or not
			if(in_array(strtolower($file_ext), $allowed_types)) {

				// Verify file size - 2MB max
				if ($fileSize > $maxsize)		
					echo "Error: File size is larger than the allowed limit.";

				// If file with name already exist then append time in
				// front of name of the file to avoid overwriting of file
				if(file_exists($filepath)) {
					$filepath = $upload_path.time().$fileName;
					
					if( move_uploaded_file($tempPath, $filepath)) {
						echo "{$fileName} successfully uploaded <br />";
					}
					else {		
						$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
						echo $errorMSG;			
				
					}
				}
				else {
				
					if( move_uploaded_file($tempPath, $filepath)) {
						$errorMSG = json_encode(array("message" => "successfully uploaded ", "status" => true));	

						echo "{$fileName} successfully uploaded <br />";
					}
					else {					
						$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
						echo $errorMSG;
					}
				}
			}
			else {
				
				// If file extension not valid
				$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
				echo $errorMSG;
			}
		}
	}
	else {
				// If no files selected
		$errorMSG = json_encode(array("message" => "No files selected", "status" => false));	
		echo $errorMSG;
		

	}

	if(!isset($errorMSG))
{
	$query = mysqli_query($conn,'INSERT into tbl_image (name) VALUES("'.$fileName.'")');
			
	echo json_encode(array("message" => "Image Uploaded Successfully1", "status" => true));	
}