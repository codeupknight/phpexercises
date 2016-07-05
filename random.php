<?php

$min = 1;
$max = 100;
if ($argc >= 3) {
	if (is_numeric($argv[1]) && is_numeric($argv[2])) {
	$min = $argv[1];
	$max = $argv[2];
		if ($argv[1] > $argv[2]) {
			$min = $argv[2];
			$max = $argv[1];
		}
	}
} else {
		fwrite(STDERR, 'Your input was not two numeric values.' . PHP_EOL);	
	} 

$random = rand($min, $max);
$counter = 0;

fwrite(STDOUT, 'I have just generated a number between ' . $min . ' and ' . $max . '. What is the number?' . PHP_EOL);
$input = trim(fgets(STDIN));

if ($input == $random) {
	fwrite(STDOUT, 'Wow! You just wasted some INSANE luck on a meaningless game! You found the lucky number on your first try!' . PHP_EOL);
};

while ($input != $random) {
	if ($input < $random) {
		$counter++;
		fwrite(STDOUT, 'Try again! Guess #' . $counter . " was too low!" . PHP_EOL);
		$input = fgets(STDIN);
	} else if ($input > $random) {
		$counter++;
		fwrite(STDOUT, 'Try again! Guess #' . $counter . " was too high!" . PHP_EOL);
		$input = fgets(STDIN);
	};	
};

fwrite(STDOUT, 'Great job! You found the number in ' . $counter . ' guesses! (The random number was ' . $random . ')' . PHP_EOL);
