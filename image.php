<?php 

// Include the database configuration file
include 'admin/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['submit'])){ 
    // File upload configuration 
    $targetDir = "testing/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            $randomName = uniqid() . "-" . time();
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            $newfilename = $randomName . '.' . $fileType;
            $targetFilePath = $targetDir . $newfilename; 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "(5, '".$newfilename."'),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        echo $insertValuesSQL;
        // // Error message 
        // $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        // $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        // $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
        
        // if(!empty($insertValuesSQL)){ 
        //     $insertValuesSQL = trim($insertValuesSQL, ','); 
        //     // Insert image file name into database 
        //     $insert = $db->query("INSERT INTO itemimage (itemId , image) VALUES $insertValuesSQL"); 
        //     if($insert){ 
        //         $statusMsg = "Files are uploaded successfully.".$errorMsg; 
        //     }else{ 
        //         $statusMsg = "Sorry, there was an error uploading your file."; 
        //     } 
        // }else{ 
        //     $statusMsg = "Upload failed! ".$errorMsg;
        // } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
  } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="image.php" method="post" enctype="multipart/form-data">
      Select Image Files to Upload:
      <input type="file" name="files[]" multiple >
      <input type="submit" name="submit" value="UPLOAD">
  </form>
</body>
</html>
