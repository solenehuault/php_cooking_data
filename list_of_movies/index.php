<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Cooking Data 2/2</title>
	</head>
	<body>
		<h1>List of Movies</h1>
		<?php
			$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
			$brut = json_decode($string, true);
			$top = $brut["feed"]["entry"];

			$before_2000 = 0;
			$eldest = 2000;
			$yougest = 2000;
			$category = array();
			$director = array();
			echo "<ol>";

			for ($i = 0 ; $i < count($top) ; $i++) {
				$movie = $top[$i];
				$title = $movie['im:name'];

				//Top ten
				if ($i < 10) {
					echo "<li>".$title[label]."</li>";
				}

				//Gravity rank
				if ($title[label] == "Gravity") {
					$rank_gravity = $i;
				}

				//Director of Lego movie
				if ($title[label] == "The LEGO Movie") {
					$rank_lego = $i;
					$director_lego = $top[$rank_lego][title][label];
					$dir = explode("-", $director_lego);
				}

				//Release before 2000
				$release = $movie['im:releaseDate'];
				$year = explode("-", $release[label]);
				if ($year[0] < 2000) {
					$before_2000++;
				}

				//Most young & old
				if ($eldest > $year[0]) {
					$eldest = $year[0];
					$rank_eldest = $i;
				}
				if ($youngest < $year[0]) {
					$youngest = $year[0];
					$rank_youngest = $i;
				}
				$title_youngest = $top[$rank_youngest]['im:name'][label];
				$title_eldest = $top[$rank_eldest]['im:name'][label];

				//Category most represented
				$movie_category = $movie[category][attributes];
				$category_name = $movie_category[term];
				$category[$category_name] += 1;
				arsort($category);

				//Director most represented
				$movie_director = $movie[title][label];
				$director_movie = explode("-", $movie_director);
				$ddd = $director_movie[count($director_movie)-1];
				$director[$ddd] += 1;

			}

			echo "</ol>";
			echo "<p>Gravity is ranked ".$rank_gravity.".</p>";
			echo "<p>The directors of '".$dir[0]."' are ".$dir[count($dir)-1].".</p>";
			echo "<p>".$before_2000." movies were released before 2000.";
			echo "<p>The most recent film is '".$title_youngest."' released in ".$youngest.".</p>";
			echo "<p>The oldest film is '".$title_eldest."' released in ".$eldest.".</p>";
			echo "<p>The category most represented film is ".key($category).".</p>";
			
			print_r($director);
			print_r($top[5]);
		?>
	</body>
</html>
