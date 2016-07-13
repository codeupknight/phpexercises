<?php
$filename = $argv[1];

$document = trim(file_get_contents($filename));
$header = 'Name | Phone number' . PHP_EOL . '---------------' . PHP_EOL;

function listToArray($document) {
	$contactsArray = [];
	$explodedList = explode("\n", $document);
	foreach ($explodedList as $contact) {
		$singleContact = [];
		$explodedContact = explode(' | ', $contact);
		$contactsArray[] = [
		'name' => $explodedContact[0],
		'number' => $explodedContact[1]
		];
	}
	return $contactsArray;
}

function listToLowerArray($document) {
	$contactsArray = [];
	$explodedList = explode("\n", $document);
	foreach ($explodedList as $contact) {
		$singleContact = [];
		$explodedContact = explode(' | ', $contact);
		$explodedContact = array_map('strtolower', $explodedContact);
		$contactsArray[] = [
		'name' => $explodedContact[0],
		'number' => $explodedContact[1]
		];
	}
	return $contactsArray;
}

function arrayToList($revisedArray) {
	$revisedArray2 = [];
	foreach ($revisedArray as $contact) {
		$implodedContact = implode(' | ', $contact);
		$revisedArray2[] = $implodedContact;
	}
	$finalString = implode("\n", $revisedArray2);
	return $finalString;
}

function searchByName($query, $array) {
	foreach ($array as $entry) {
		$search = strpos($entry["name"], $query);
		if ($search !== false) {
			echo PHP_EOL . "Name: " . $entry["name"] . PHP_EOL . "Number: " . $entry["number"] . PHP_EOL;
		}
	}
}

function deleteByName($query, $array) {
	$revisedArray = [];
	foreach ($array as $entry) {
		$key = array_search($query, $entry);
		if ($key !== false) {
			echo PHP_EOL . "The contact " . $query . " has been permenantly deleted from the file." . PHP_EOL;
		} else {
			$revisedArray[] = $entry;
		}
	}
	echo PHP_EOL . "Returning to Main Menu." . PHP_EOL;
	return $revisedArray;
}

do {
	//Main Menu
	echo PHP_EOL . "Main Menu" . PHP_EOL . "-----------" . PHP_EOL;
	echo '1. View contacts.' . PHP_EOL;
	echo '2. Add a new contact.' . PHP_EOL;
	echo '3. Search a contact by name.' . PHP_EOL;
	echo '4. Delete an existing contact.' . PHP_EOL;
	echo '5. Exit.' . PHP_EOL;
	echo 'Enter an option (1, 2, 3, 4 or 5):';
	//Menu Selection
	$response = trim(fgets(STDIN));
	$document = trim(file_get_contents($filename));
	switch ($response) {
		case 1: //view
			echo PHP_EOL . $document . PHP_EOL;
			break;	
		case 2: //add new
			//get user input
			echo "Enter Contact's Name:" . PHP_EOL;
			$contactName = trim(fgets(STDIN));
			echo "Enter Contact's Phone Number:" . PHP_EOL;
			$contactNumber = trim(fgets(STDIN));
			//concatonate user input and add to file
			$newContact = $contactName . " | " . $contactNumber . PHP_EOL;
			$handle = fopen($filename, 'a');
			fwrite($handle, $newContact);
			fclose($handle);
			//end
			echo PHP_EOL . "Contact successfully added!" . PHP_EOL;
			break;
		case 3: //search
			//make array lowercase & get user input
			$contactsArray = listToLowerArray($document);
			echo "Enter Name to Search for:" . PHP_EOL;
			$query = trim(fgets(STDIN));
			//search & print results
			echo PHP_EOL . searchByName(strtolower($query), $contactsArray) . PHP_EOL . PHP_EOL;
			break;
		case 4: //delete
			//make array & get user input
			$contactsArray = listToArray($document);
			echo "Please be aware that this will permenantly remove the entry from the file." .PHP_EOL . "Enter name (case specific) to delete the whole entry forever:" . PHP_EOL;
			$deleteRequest = trim(fgets(STDIN));
			//search & delete if found
			$revisedArray = deleteByName($deleteRequest, $contactsArray);
			//concatonate array into list and rewrite file;
			$finalString = arrayToList($revisedArray);
			$handle = fopen($filename, 'w');
			fwrite($handle, $finalString);
			fclose($handle);
			break;
				
		case 5: //exit
			echo "Goodbye!" . PHP_EOL;
			break;
		default:
			echo "Please press a number corresponding to your selection, then press enter.";
		}
	} while ($response != '5');

// * The contacts information must be shown using the following format

// ```
// Name | Phone number
// ---------------
// Jack Blank | 1231231234
// Jane Doe | 2342342345
// Sam Space | 3453453456
// // ```
// * To delete a contact the user must enter her name. You can reuse part of the
// code from option `3` (Search a contact by name) for this one.

// ## Bonus

// * Format the phone numbers using dashes like in the exercise on section 6.6.1
// (Reading files)
// * Allow formatting phone numbers with different lengths. 10 and 7 digits.

// ```
// 210-567-8923
// 789-8902
// ```
// * Warn the user when she tries to enter a contact with an existing name.
// ```
// There's already a contact named Jane Doe. Do you want to overwrite it? (Yes/No)
// ```
// If the answer is `No` allow the user to enter the information again.
// * Format the output of the contacts, so that all of the columns have the same
// width.

// ```
// Name       | Phone number |
// ---------------------------
// Jack Blank | 210-567-8923 |
// Jane Doe   | 789-8902     |
// Sam Space  | 210-581-8123 |
// ```
// **Hint** The width of the `Name` column is determined by the longest name in your
// contact list. Also take a look at the function
// [str_pad](http://php.net/manual/en/function.str-pad.php).