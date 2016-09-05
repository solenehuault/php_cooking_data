<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Cooking data</title>
	</head>
	<body>
		<?php
			$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
			$dico = explode("\n", $string);
			
			echo "<p>This dictionnary contains ".count($dico)." words.</p>";

			$fifteen_char = 0;
			for ($i = 0 ; $i < count($dico) ; $i++) {
				if (strlen($dico[$i]) == 15) {
					$fifteen_char++;
				}
			}
			echo "<p>There are ".$fifteen_char." words that have exactly fifteen characters.</p>";
		?>
	</body>
</html>
