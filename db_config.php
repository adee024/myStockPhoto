	<?php
	
	function pdo_connect_mysql() {
	 
	    $DATABASE_HOST = 'localhost';
	    $DATABASE_USER = 'root';
	    $DATABASE_PASS = '';
	    $DATABASE_NAME = 'frimage';
	    try {
	    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
	    } catch (PDOException $exception) {
	    
	    	die ('Failed to connect to database!');
	    }
	}
	$db = mysqli_connect('localhost', 'root', '', 'frimage');
	?>