<?php

function lookingForPerson($query, $array) {
	$search = array_search($query, $array);
	if ($search !== false) {
		return 'There is a ' . $query . ' here.';
	} else {
		return $query . ' is not here.';
	}
}

function groupEntry(&$groupNames) {
	$nameEntry = 'name';
	while ($nameEntry !== '') {
		$nameEntry = trim(fgets(STDIN));
		if ($nameEntry !== "") {
			$groupNames[] = $nameEntry;
		}
	}
}

$names = ['Tyler', 'craig', 'TJ', 'anthony', 'chris', 'eddie', 'ana', 'george', 'john', 'brandon', 'anthony'];
$groupNames = [];

do {
	echo "What are you doing here?" . PHP_EOL;
	echo '1. Looking for a specific person.' . PHP_EOL;
	echo '2. Looking for a group of people.' . PHP_EOL;
	echo '3. I\'m done here.' . PHP_EOL;
	
	$response = trim(fgets(STDIN));

	switch ($response) {
		case 1:
			echo "Who are you looking for?" . PHP_EOL;
			$query = trim(fgets(STDIN));
			echo lookingForPerson(strtolower($query), array_map('strtolower', $names)) . PHP_EOL . PHP_EOL;
			break;
		
		case 2:
			echo "Enter the names you're looking for." . PHP_EOL . "Press enter on an empty line when you are finished." . PHP_EOL;
			groupEntry($groupNames);
			foreach ($groupNames as $groupQuery) {
				echo lookingForPerson(strtolower($query), array_map('strtolower', $names)) . PHP_EOL . PHP_EOL;
			}
			break;
		case 3:
			exit("Good luck finding your friends!" . PHP_EOL);
			break;
		}
	} while ($response != '3');