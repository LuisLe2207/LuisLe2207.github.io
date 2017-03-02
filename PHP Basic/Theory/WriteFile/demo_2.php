

<?php

$path = "Download/";
$prefix = "Contacts";
$extension = ".csv";
// Create temp file in folder Download with prefix name "Contacts"
$tmpfname = tempnam($path, $prefix);
// chagng tmp file extension to csv file in order to save it.
rename($tmpfname, $path.$prefix.$extension);

// 
$contacts = array
(
"Peter,Griffin,Oslo,Norway",
"Glenn,Quagmire,Oslo,Norway",
);
// Open file ad set mode to write
$handle = fopen($path.$prefix.$extension, "w");
// Loop contacts array and write it into the file as csv format.
// Using fpucsv function 
foreach ($contacts as $line)
{
  	fputcsv($handle,explode(',',$line));
}

// Download
// Decalre header for page in order to make it start download file when open the page
header('Content-Description: File Transfer'); 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="test.csv"'); 
readfile($path.$prefix.$extension);
exit;
?>