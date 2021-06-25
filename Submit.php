<?php
    
    // Recipient 
    $to =  $_POST["email"];
     
    // Sender 
    $fromName = 'Real Response Media'; 
     
    // Email subject 
    $subject = 'Real Response Media Application';  
     
    // Attachment file 
    $uploadedFile = $_FILES["fileToUpload"];
    $fileName = $_FILES["fileToUpload"]['name'];
    $fileLocation = $_FILES["fileToUpload"]['tmp_name'];
    $fileSize = $_FILES["fileToUpload"]['size'];
    $file = $fileLocation;
    
    //Input information
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $telephone = $_POST["telephone"];
    $address1 = $_POST["address1"];
    $postcode = $_POST["postcode"];
    $country = $_POST["country"];
    $description = $_POST["description"];
     
    // Email body content 
    $htmlContent = "
    
        <h3>Please check your application details that you have submitted!</h3>
        <br>
        <span style='display:inline; padding: 5px;font-weight: bold;'>First Name: </span><span style='display:inline; padding: 5px;'>" . $firstname . "</span><br>
        <span style='display:inline; padding: 5px;font-weight: bold;'>Last Name: </span><span style='display:inline; padding: 5px;'>" . $lastname . "</span><br>
        <span style='display:inline; padding: 5px;font-weight: bold;'>Email: </span><span style='display:inline; padding: 5px;'>" . $to . "</span><br>
        <span style='display:inline; padding: 5px;font-weight: bold;'>Telephone: </span><span style='display:inline; padding: 5px;'>" . $telephone . "</span><br>
        <span style='display:inline; padding: 5px;font-weight: bold;'>Address Line 1: </span><span style='display:inline; padding: 5px;'>" . $address1 . "</span><br>
        <span style='display:inline; padding: 5px;font-weight: bold;'>Postcode: </span><span style='display:inline; padding: 5px;'>" . $postcode . "</span><br>
        <span style='display:inline; padding: 5px;font-weight: bold;'>Country: </span><span style='display:inline; padding: 5px;'>" . $country . "</span><br>
        <span style='display:inline; padding: 5px;font-weight: bold;'>Description: </span><span style='display:inline; padding: 5px;'>" . $description . "</span><br>
         
    ";
     
    // Header for sender info 
    $headers = "From: $fromName"; 
     
    // Boundary  
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
     
    // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
     
    // Multipart boundary  
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
     
    // Preparing attachment 
    if(!empty($file) > 0){ 
        if(is_file($file)){ 
            $message .= "--{$mime_boundary}\n"; 
            $fp =    @fopen($file,"rb"); 
            $data =  @fread($fp,filesize($file)); 
     
            @fclose($fp); 
            $data = chunk_split(base64_encode($data)); 
            $message .= "Content-Type: application/octet-stream; name=\"".basename($fileName)."\"\n" .  
            "Content-Description: ".basename($fileName)."\n" . 
            "Content-Disposition: attachment;\n" . " filename=\"".basename($fileName)."\"; size=".filesize($fileSize).";\n" .  
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
        } 
    } 
    $message .= "--{$mime_boundary}--"; 
     
    // Send email 
    $mail = @mail($to, $subject, $message, $headers);  
    
    // echo $fileLocation;
    // echo $fileName;
    
    //locate back to Form page
    header("Location: Form.php?applicationSubmitted");
    
?>