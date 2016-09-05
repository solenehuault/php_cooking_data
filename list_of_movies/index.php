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
				if ($title[label] == "The LEGO Movie") {
					$rank_lego = $i;
					$director_lego = $top[$rank_lego][title][label];
					$dir = explode("-", $director_lego);
				}
			}
			echo "</ol>";
			echo "<p>Gravity is ranked ".$rank_gravity.".</p>";
			print_r($top[$rank_lego]);
			print_r($dir);
			echo "<p>The directors of ".$dir[0]." are ".$dir[count($dir)-1].".</p>";
		?>
	</body>
</html>
