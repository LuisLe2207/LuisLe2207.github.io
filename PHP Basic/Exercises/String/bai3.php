<?php
header('Content-type: text/plain');

/**
* Check if parameter type is string or not
* @param string $string
* 
* @throws Exception "Invalid parameter"
* @return string
*/

function validateParameter($string) {
	if (isset($string) && !is_string($string)) {
		throw new Exception("Invalid string");
	}
}

/**
* Check if input string is a singlebyte or multibyte string
* @param string $string
* 
* @throws LogicException "Invalid parameter"
* @return boolean
*/

function singleOrMultipleByteStr($string) {
	try {
		if (mb_strlen($string) !== strlen($string)) {
			return true;
		} else {
			return false;
		}
	} catch (Exception $e) {
		echo "Logic Exception: " . $e.getMessage();
	}
}

function main() {
	// Check japanese string
	$string1 = "こんにちは";
	echo "Input String 1: " . $string1 . "\n";
	$isSingleOrMultipleByte1 = singleOrMultipleByteStr($string1);
	if ($isSingleOrMultipleByte1) {
		echo "$string1 is a multiple bytes";
	} else {
		echo "$string1 is a single bytes";
	}
	// Check english string
	$string2 = "Hello";
	echo "\n\nInput String 2: " . $string2 . "\n";
	$isSingleOrMultipleByte2 = singleOrMultipleByteStr($string2);
	if ($isSingleOrMultipleByte2) {
		echo "$string2 is a multiple bytes";
	} else {
		echo "$string2 is a single bytes";
	}
}

main();