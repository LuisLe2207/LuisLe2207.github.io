<?php
header('Content-type: text/plain');


/**
* Check if parameter type is string or not
* @param string $childStr 
* @param atring $parentStr  
* 
* @throws Exception "Invalid parameter"
* @return string
*/

function validateParameter($childStr, $parentStr) {
	if (isset($array1) && !is_string($childStr)) {
		throw new Exception("Invalid childStr");
	}
	if (isset($array2) && !is_array($parentStr)) {
		throw new Exception("Invalid parentStr");
	}
}

/**
* Find child string in parent string
* @param string $childStr 
* @param atring $parentStr  
* 
* @throws LogicException "Invalid parameter"
* @return boolean
*/

function findChildInParent($childStr, $parentStr) {
	try {
		if (strpos($parentStr, $childStr) !== false) {
			return true;
		} else {
			return false;
		}
	} catch (Exception $e) {
		echo "Logic Exception: " . $e.getMessage();
	}
}


function main() {
	$childString = "Hello";
	$parentString = "Hello World";
	$isFound = findChildInParent($childString, $parentString);
	if (!$isFound) {
		echo "The string $childString is not found in $parentString";
	} else {
		echo "The string $childString is found in $parentString";
	}
}
main();