<?php
/** 
 * Logging class:
 * - contains lfile, lwrite and lclose public methods
 * - lfile sets path and name of log file
 * - lwrite writes message to the log file (and implicitly opens log file)
 * - lclose closes log file
 * - first call of lwrite method will open log file implicitly
 * - message is written with the following format: [d/M/Y:H:i:s] (script name) message
 */
    class MyFramework_Log {
        // declare log file and file pointer as private properties
        private static $logFile;
        private static $file;
        /** 
            * Function set file path for $logFile
            * @param {string} $filePath
        */
        public static function setFilePath()
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = @Date('Y-m-d-H-i-s');
            $filePath = "././errors/logfile-$date.txt";
            self::$logFile = $filePath;
        }
        /**
            * Function write log
            * @param {string} $message
        */
        public static function write($message)
        {
            self::setFilePath();
            self::openFile();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $dateTimeWrite = @Date('Y-m-d H:i:s');
            $type = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
            self::$file->fwrite("$dateTimeWrite ($type) $message".PHP_EOL);
            self::closeFile();
        }
        /**
            * Funtion open log file for write log
        */
        public static function openFile()
        {
            if (isset(self::$logFile)) {
                self::$file = new SplFileObject(self::$logFile, 'w');
            }
        }
        /**
            * Funtion close log file
        */
        private static function closeFile()
        {
            self::$file = null;
        }
    }