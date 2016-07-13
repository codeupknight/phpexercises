<?php

// At the top of the file, create a new function called inspect() that takes in one argument. Your inspect() function should look at the passed argument and return a string with the variable's type and its value, similar to "The integer is 12.".
// TODO: Create your inspect() function here

function inspect($argument) {
	if (is_array($argument)) {
		if ($argument === []) {
			$variableDetails = "That there is an empty array.";
			return $variableDetails;
		}
		$variableDetails = "The " . gettype($argument) . " is [" . implode($argument, ', ') . "].";
		return $variableDetails;
	} else if (gettype($argument) === "NULL") {
		$variableDetails = "That's just a null.";
		return $variableDetails;
	} else if (is_bool($argument)) {
		if ($argument) {
			return "The boolean is true!";
		} else {
			return "The boolean is false.";
		}
	} else if (is_string($argument) && $argument === '') {
		return "The string is empty.";
	}
	$variableDetails = "The " . gettype($argument) . " is: " . $argument;
	return $variableDetails;
}

// Do not mofify these variables!
$string1 = "I'm a little teapot";
$string2 = '';
$array1 = [];
$array2 = [1, 2, 3];
$bool1 = true;
$bool2 = false;
$num1 = 0;
$num2 = 0.0;
$num3 = 12;
$num4 = 14.4;
$null = NULL;

// TODO: After each echo statement, use inspect() to output the variable's type and its value

echo 'Inspecting $num1:' . PHP_EOL;
echo inspect($num1) . PHP_EOL . PHP_EOL;

echo 'Inspecting $num2:' . PHP_EOL;
echo inspect($num2) . PHP_EOL . PHP_EOL;

echo 'Inspecting $num3:' . PHP_EOL;
echo inspect($num3) . PHP_EOL . PHP_EOL;

echo 'Inspecting $num4:' . PHP_EOL;
echo inspect($num4) . PHP_EOL . PHP_EOL;

echo 'Inspecting $null:' . PHP_EOL;
echo inspect($null) . PHP_EOL . PHP_EOL;

echo 'Inspecting $bool1:' . PHP_EOL;
echo inspect($bool1) . PHP_EOL . PHP_EOL;

echo 'Inspecting $bool2:' . PHP_EOL;
echo inspect($bool2) . PHP_EOL . PHP_EOL;

echo 'Inspecting $string1:' . PHP_EOL;
echo inspect($string1) . PHP_EOL . PHP_EOL;

echo 'Inspecting $string2:' . PHP_EOL;
echo inspect($string2) . PHP_EOL . PHP_EOL;

echo 'Inspecting $array1:' . PHP_EOL;
echo inspect($array1) . PHP_EOL . PHP_EOL;

echo 'Inspecting $array2:' . PHP_EOL;
echo inspect($array2) . PHP_EOL . PHP_EOL;