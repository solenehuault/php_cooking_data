<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Cooking Data 2/2</title>
	</head>
	<body>
		<?php
			$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
			$brut = json_decode($string, true);
			$top = $brut["feed"]["entry"];

			//print_r ($top);
			echo "<ol>";
			for ($i = 0 ; $i < count($top) ; $i++) {
				$movie = $top[$i];
				$title = $movie[title];
				echo "<li>";
				print_r($title[label]);
				echo "</li>";
			}
			echo "</ol>";
		?>
	</body>
</html>
