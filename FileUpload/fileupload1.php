<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
</head>
<body>
<div style="background-color:#c9c9c9;padding:15px;">
      <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='fileupl.html';">Main Page</button>
</div>

<div align="center">
<form action="" method="post" enctype="multipart/form-data">
   <br>
    <b>Select image : </b> 
    <input type="file" name="file" id="file" style="border: solid;">
    <input type="submit" value="Submit" name="submit">
</form>
</div>
<?php

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
	$targetDir = "uploads/";
    $file = $_FILES["file"];

    $target_file = $targetDir . basename($file["name"]);

    $allowed = ['gif', 'png', 'jpg'];
    // You should also check filesize here.
    if ($file['size'] > 5000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }
    $ext =  pathinfo($file['name'], PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        echo 'Wrong file format';
    }

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    echo "File uploaded /uploads/".$_FILES["file"]["name"];
}
?>
</body>
</html>
