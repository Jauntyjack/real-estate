<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
</head>
<body>
	<?php 
	//echo $results;

foreach ($results as $object) {
	echo $object->username . "<br>";
}

		// foreach ($results as $object) {
		// 	echo "id = ". $object->id. "<br>";
		//  	echo "username = ". $object->username. "<br>";
		//  	echo "password = ". $object->password. "<br>";
		// }
	?>
</body>
</html>