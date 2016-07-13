<?php

$things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);

foreach ($things as $thing) {
	if (is_array($thing)) {
		implode(', ', $thing);
		$echo = "$thing is a " . gettype($thing) . PHP_EOL;
		echo $echo;
	} else {
		echo "$thing is a " . gettype($thing) . PHP_EOL;
	}
	if (is_scalar($thing)) {
		echo "$thing is scalar." . PHP_EOL;
	}
}


$books = array(
    'The Hobbit' => array(
        'published' => 1937,
        'author' => 'J. R. R. Tolkien',
        'pages' => 310
    ),
    'Game of Thrones' => array(
        'published' => 1996,
        'author' => 'George R. R. Martin',
        'pages' => 835
    ),
    'The Catcher in the Rye' => array(
        'published' => 1951,
        'author' => 'J. D. Salinger',
        'pages' => 220
    ),
    'A Tale of Two Cities' => array(
        'published' => 1859,
        'author' => 'Charles Dickens',
        'pages' => 544
    )
);


foreach ($books as $name => $details) {
	echo $name . PHP_EOL;
	foreach ($details as $key => $value) {
		echo $key . ': ' . $value . PHP_EOL;
	 } 
} 