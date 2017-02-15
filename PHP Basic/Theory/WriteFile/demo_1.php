<?php
// Create temp file in Download folder with name Demo
$tmpfname = tempnam("Download/", "Demo");
// Open it and se mode to write;
$handle = fopen($tmpfname, "w");
// Write text to file
$string = "writing to tempfile";
fwrite($handle, $string);
fclose($handle); // Close file

// chagng tmp file extension in to text file in order to save it.
rename($tmpfname, "Download/Demo.txt");

?>