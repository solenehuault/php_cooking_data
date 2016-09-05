<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Cooking data 1/2</title>
	</head>
	<body>
		<h1>Dictionary</h1>
		<?php
			$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
			$dico = explode("\n", $string);
			
			echo "<p>This dictionnary contains ".count($dico)." words.</p>";

			$fifteen_char = 0;
			$w_letter = 0;
			$q_letter = 0;
			for ($i = 0 ; $i < count($dico) ; $i++) {
				if (strlen($dico[$i]) == 15) {
					$fifteen_char++;
				}
				$word = str_split($dico[$i]);
				if (in_array('w', $word)) {
					$w_letter++;
				}
				if ($word[count($word) -1] == 'q') {
					$q_letter++;
				}
			}
			echo "<p>There are ".$fifteen_char." words that have exactly fifteen characters.</p>";
			echo "<p>There are ".$w_letter." words containing the letter 'w'.</p>";
			echo "<p>There are ".$q_letter." words ending with the letter 'q'.</p>";

		?>
	</body>
</html>
