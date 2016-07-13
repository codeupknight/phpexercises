<?php

function parseContacts($filename)
{
    $contacts = array();
    $list = array(); 
	$contents = trim(file_get_contents($filename));
	$contentsArray = explode("\n", $contents);

	foreach ($contentsArray as $content) {
		$contactLine = explode('|', $content);
		$contact = [
			'name' => $contactLine[0],
			'number' => $contactLine[1]
		];
		// $contentsArray[$content]['number'] = substr($contact['number'], 0, 3) . "-" . substr($contact['number'], 3, 3) . "-" . substr($contact['number'], 6);
		$contacts[] = $contact;
	}

    return $contacts;
}

var_dump(parseContacts('assets/fread.txt'));
