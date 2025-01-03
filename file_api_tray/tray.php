<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include 'dpconfig.php'; // include database connection file

// collect input parameters and convert into readable format
// convart json dat too php data
$data = json_decode(file_get_contents("php://input"), true); 

$modulNo=$_POST['modulNo']; 
$cotgery=""; 
$checkbox1=$_POST['cotgery'];
if($checkbox1==null){
    $cotgery="null";
}else{

foreach($checkbox1 as $chk1)  
   {  
      $cotgery .= $chk1.",";  
   }  
}

if(empty(array_filter($_FILES['files']['name']))) {
    $errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else{
    	// Configure upload directory and allowed file types
	$upload_path = 'upload'.DIRECTORY_SEPARATOR;
		
	$allowed_types = array('jpg', 'png', 'jpeg', 'gif');
	
	// Define maxsize for files i.e 2MBmulti fileUploudExmpael
    $maxsize = 5 * 1024 * 1024;	
    
    foreach ($_FILES['files']['tmp_name'] as $key => $value) {

    // the temporary loctian 
        $tempPath = $_FILES['files']['tmp_name'][$key];
        	// orginal name
        $fileName = $_FILES['files']['name'][$key];
            // file size 
        $fileSize = $_FILES['files']['size'][$key];

        	 // get image extension 
	 $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	
     // Set upload file path
     $filepath = $upload_path.$fileName;

     if(in_array($fileExt, $allowed_types)) {

        if(!file_exists($upload_path . $fileName))
		{
            if ($fileSize < $maxsize){
                // move_uploaded_file($tempPath, $upload_path . $fileName); 
                // $query = mysqli_query($conn,'INSERT into tbl_image (name) VALUES("'.$fileName.'")');

                $addFile = $databass->prepare("INSERT   INTO `tbl_image`(name,cotgery,modulNo) VALUES
                (:name, :cotgery,:modulNo)");
               $addFile->bindParam('name', $fileName);
               $addFile->bindParam('cotgery', $cotgery);
               $addFile->bindParam('modulNo', $modulNo);
               if ($addFile->execute()) {
                move_uploaded_file($tempPath, $upload_path . $fileName); 
       
               } else {
                 $errorMSG =json_encode(array("message" => "Sorry, your file not add", "status" => false));	
				// echo $errorMSG;
            
               }

			
            }
            else{		
				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				// echo $errorMSG;
			}

        }
        else
        {		
           $errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder <br>" , "status" => false));	
        //    echo $errorMSG;
       }



     }
     else
	{		
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		// echo $errorMSG;		
	}
     
     
           
    }
    
}
if(!isset($errorMSG))
{
    echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));	

}else{
    echo $errorMSG;

}


?>