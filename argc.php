<?php

echo "I have detected " . ($argc-1) . " user arguments." . PHP_EOL;

for ($i=1; $i<$argc; $i++) {
	echo "Argument " . $i . ": " . $argv[$i] . PHP_EOL;
}