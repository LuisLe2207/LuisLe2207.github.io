<?php
header('Content-type: text/plain');
/**
 * @param array $array1 
 * @param array $array2 
 * @param array $array3 
 * 
 * @throws LogicException "Invalid parameter..." If parameter is not an array
 * @return string
 */ 

function main($array1, $array2, $array3) {
	try {
		// Print Array 1
		echo "Array 1: \n";
		foreach ($array1 as $value) {
			echo $value . " ";
		} 
		unset($value);// break the reference with the last element
		// Print Array 2
		echo "\nArray 2: \n";
		foreach ($array2 as $value) {
			echo $value . " ";
		} 
		unset($value);// break the reference with the last element
		// Print Array 3
		echo "\nArray 3: \n";
		foreach ($array3 as $value) {
			echo $value . " ";
		} 
		unset($value);// break the reference with the last element
		// Find number in array
		echo "\n\nFind 1 in array\n";
		findNumberInArray(1, $array1);
		echo "\n";
		// Merge 2 arrays
		echo "\nMerge Array 2 & Array 3\n";
		$mergedArr = mergeArray($array2, $array3);
		// Print sum of all value in mergedArray that mod 2 = 0
		echo "\n\nPrint sum of all value in mergedArray that mod 2 = 0\n";
		printArrayValueMod2($mergedArr);
		echo "\n";
		// Print ascending array value which contain in mergedArray 
		echo "\nPrint ascending Array 1 value which contain in mergedArray\n";
		printAscContainArrayValue($array1, $mergedArr);
		echo "\n";
		// Print descending array value which key is not contain in mergedArray value 
		echo "\nPrint descending Array 1 value which key is not contain in mergedArray value\n";
		printDescArrayKeyNotContain($array1, $mergedArr);
	} catch (Exception $e) {
		echo "LogicException: " . $e.getMessage();
	}
}

/**
* Check if parameter type is an array or not
* @param array $array1 
* @param array $array2 
* @param array $array3 
* 
* @throws Exception "Invalid parameter"
* @return string
*/

function validateParameter($array1, $array2, $array3) {
	if (isset($array1) && !is_array($array1)) {
		throw new Exception("Invalid array1");
	}
	if (isset($array2) && !is_array($array2)) {
		throw new Exception("Invalid array2");
	}
	if (isset($array3) && !is_array($array3)) {
		throw new Exception("Invalid array3");
	}
}

/**
* Find a number contain in an array
* @param int number
* @param array $array1 
* 
* @return string "Found" or "Not found"
*/
function findNumberInArray($number, $array) {
	if (in_array($number, $array)) {
		echo "Found.";
	}
	else {
		echo "Not found.";
	}
}

/**
* Merge 2 arrays, delete duplicate item and print in string format.
* @param array $array1
* @param array $array2 
* 
* @return array mergedArray.
*/
function mergeArray($array1, $array2) {
	$mergedArray = array_unique(array_merge($array1,$array2), SORT_REGULAR);
	foreach ($mergedArray as $value) {
		echo $value . " ";
	}
	return $mergedArray;
}

/**
* Print value in mergedArray that mod 2 = 0
* @param array $array
* 
* @return string item % 2 = 0.
*/
function printArrayValueMod2($array) {
	$newArr = array_filter($array, "sumNumberDigit");
	foreach ($newArr as $value) {
		echo $value . " ";
	}
}

/**
* return number which sum of it's digt mod 2 = 0
* @param int $number
* 
* @return int $number % 2 = 0.
*/
function sumNumberDigit($number) {
	$sum = 0;
	$tempNumber = $number;
	while ($tempNumber > 0) {
		$temp = $tempNumber % 10;
		$sum += $temp;
		$tempNumber /= 10;
	}
	if ($sum % 2 == 0) {
		return $number;
	}
}

/**
* print ascending array value which contain in mergedArray 
* @param array $array1
* @param array $mergedArray
* 
* @return string ascending value which contain in mergedArray.
*/
function printAscContainArrayValue($array1, $mergedArray) {
	$sortedArray = array_intersect($array1, $mergedArray);
	asort($sortedArray);
	foreach($sortedArray as $value) {
		echo $value . " ";
	}
}

/**
* print descending array value which key is not contain in mergedArray value 
* @param array $array1
* @param array $mergedArray
* 
* @return string descending value which key is not contain in mergedArray value.
*/
function printDescArrayKeyNotContain($array1, $mergedArray) {
	$keyArray = array_keys($array1);
	foreach($keyArray as $value) {
		if (in_array($value, $mergedArray)) {
			unset($array1[$value]);
		}
	}
	arsort($array1);
	foreach($array1 as $value) {
		echo $value . " ";
	}
}


$array1 = array(1, 2, 3, 7, 9, 13, 15);
$array2 = array(3, 1, 2, 6, 4, 5);
$array3 = array(3, 1, 2, 7, 9, 5);
main($array1, $array2, $array3);

