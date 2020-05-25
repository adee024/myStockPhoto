<?php
include 'functions.php';
// The output message

// Check if user has uploaded new image
if (isset($_FILES['image'], $_POST['title'], $_POST['description'])) {
	// The folder where the images will be stored
	$target_dir = 'images/';
	// The path of the new uploaded image
	$image_path = $target_dir . basename($_FILES['image']['name']);
	// Check to make sure the image is valid
	if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
		if (file_exists($image_path)) {
			echo '<script language="javascript">';
            echo 'alert("Image alredy exist, choose another or rename that image.")';
            echo '</script>';
			
			header( "refresh:1;url=home.php" );
	
			
			
	
		} else if ($_FILES['image']['size'] > 50000000) {
			echo '<script language="javascript">';
            echo 'alert("Image file size too large, please choose an image less than 5mb.")';
            echo '</script>';

		} else {
			// Everything checks out now we can move the uploaded image
			move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
			// Connect to MySQL
			$pdo = pdo_connect_mysql();
			// Insert image info into the database (title, description, image path, and date added)
			$stmt = $pdo->prepare('INSERT INTO images VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP)');
	        $stmt->execute([$_POST['title'], $_POST['description'], $image_path]);

     
			echo '<script language="javascript">';
            echo 'alert("Image uploaded!")';
            echo '</script>';
			
			header( "refresh:1;url=home.php" );
		}
	} else {
		
		    echo '<script language="javascript">';
            echo 'alert("Please upload image.")';
            echo '</script>';
			header( "refresh:1;url=home.php" );
	}
}
?>
