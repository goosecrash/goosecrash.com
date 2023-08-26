<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was selected
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Set the upload directory
        $uploadDirectory = '/var/www/images/';
        
        // Get the file details
        $fileTmpPath = $_FILES["image"]["tmp_name"];
        $fileName = $_FILES["image"]["name"];
        $fileCaption = $_POST["caption"];
        
        // Move the uploaded file to the desired directory
        $targetFilePath = $uploadDirectory . $fileName;
        move_uploaded_file($fileTmpPath, $targetFilePath);
        
        // Save the caption to a text file
        $captionPath = $uploadDirectory . $fileName . '.txt';
        file_put_contents($captionPath, $fileCaption);
    }
    
    // Redirect back to the image board page
    header("Location: index.html");
    exit();
}
?>
