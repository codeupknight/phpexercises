<?php

function finalScore($classGradeInput) {
	fwrite(STDOUT, 'Enter final score in class:' . PHP_EOL);
	$classGradeInput = ((int)fgets(STDIN));
	return $classGradeInput;
	}

function printAndFinish($grades) {
	foreach ($grades as $entry) {
		echo "Class: " . $entry['class'] . PHP_EOL;
		echo "Score: " . $entry['score'] . PHP_EOL;
		$average += $entry['score'];
	}
	return $average;
}

function calculateAverage($average) {
	$totalAverage = ($average / count($grades[$score]));
	return $totalAverage;
}

$grades = array();
$enterInfo = true;
$average = 0;

fwrite(STDOUT, 'Enter your name:' . PHP_EOL);
$studentNameInput = fgets(STDIN);
$name = $studentNameInput;

while ($enterInfo === true) {
	$enterAnother = true;
	$classGradeInput = '';

	fwrite(STDOUT, 'Enter class name:' . PHP_EOL);
	$classNameInput = fgets(STDIN);

	$classGradeInput = finalScore($classGradeInput);

	if (is_int($classGradeInput) && $classGradeInput >= 0 && $classGradeInput <= 999) {
		$grades[] = ['class' => $classNameInput, 'score' => $classGradeInput];
	} else {
		$classGradeInput = finalScore($classGradeInput);
	}

	while ($enterAnother === true) {
		fwrite(STDOUT, 'Enter another grade? (yes/no)' . PHP_EOL);
		$yesNo = trim(fgets(STDIN));

		if ($yesNo == 'yes') {
			$enterAnother = false;
			$average = printAndFinish($grades);
		} else if ($yesNo == 'no') {
			$enterInfo = false;
			$enterAnother = false;
			$average = printAndFinish($grades);
		} else {
			$enterAnother = true;
		}
	}
}

$totalAverage = calculateAverage($average);

echo "All scores saved! $name, your total average is: $totalAverage" . PHP_EOL;
