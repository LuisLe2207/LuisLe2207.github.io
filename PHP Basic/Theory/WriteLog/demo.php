<?php
require_once("myLog.php");
// Logging class initialization
$log = new Logging();
 
// set path and name of log file (optional)
$log->lfile('Logs/mylog.txt');
 
// write message to the log file
$log->lwrite('Test message1');
$log->lwrite('Test message2');
$log->lwrite('Test message3');
$log->lwrite('Test message3');
$log->lwrite('Test message3');
$log->lwrite('Test message3');
$log->lwrite('Test message3');
 
// close log file
$log->lclose();