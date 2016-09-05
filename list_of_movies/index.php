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

			$rank_gravity = 0;
			echo "<ol>";
			for ($i = 0 ; $i < count($top) ; $i++) {
				$movie = $top[$i];
				$title = $movie['im:name'];
				if ($i < 10) {
					echo "<li>".$title[label]."</li>";
				}
				if ($title[label] == "Gravity") {
					$rank_gravity = $i;
				}
			}
			echo "</ol>";
			echo "<p>Gravity is ranked ".$rank_gravity.".</p>";
			print_r($top[0]);
			echo "<br />";
			print_r($top[1]);
		?>
	</body>
</html>
