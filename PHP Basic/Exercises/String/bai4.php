<?php
header('Content-type: text/plain');

$trim = 'trim';
// Remove 'm' character in "trim"
echo "$trim after remove m charater: " . rtrim($trim, "m"). "\n";
/**
 * Get 'm' character from input string
 * @param string $trim
 * @param string "tri"
 * @return string "m"
*/
$reverseTrim1 = ltrim($trim, "tri");

/**
 * Get "i" character from input string
 * @param string "tri" use rtrim to remove 'm' character from "trim"
 * @param string "tr"
 * @return string "i"
*/
$reverseTrim2 = ltrim(rtrim($trim, "m"), "tr");

/**
 * Get "r" character from input string
 * @param string "tr" use rtrim to remove 'im' character from "trim"
 * @param string "t"
 * @return string "i"
*/
$reverseTrim3 = ltrim(rtrim($trim, "im"), "t");

/**
 * Get "t" character from input string
 * @param string "trim" 
 * @param string "rim"
 * @return string "t"
*/
$reverseTrim4 = rtrim($trim, "rim");

$reverseTrim = $reverseTrim1 . $reverseTrim2 . $reverseTrim3 . $reverseTrim4;

echo "Reverse of $trim: " . $reverseTrim;

// Or we can use php string function: strrev($string) to return reverse string of input string.
// strrev($trim);