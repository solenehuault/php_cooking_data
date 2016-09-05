<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" />7
		<title>Cooking data</title>
	</head>
	<body>
		<?php
			$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
			$dico = explode("\n", $string);
			echo "<p>This dictionnary contains ".count($dico)." words.</p>";
		?>
	</body>
</html>
