<?php

//Create a class to read the file.
class FileAgent {
    //Build static function to read the file
    public static function read($fileName)    {        
        try {
            //Open the file and store it to a $fileHandle varianble.
            $fileHandle = fopen($fileName,'r');
            if(!$fileHandle) {
                throw new Exception("Cannot file file: $fileName");
            } 
            //Read the file content and store the content to $fileContents variable.
            $fileContents = fread($fileHandle,filesize($fileName));
            //Close the file.
            fclose($fileHandle);
        } catch(Exception $ex) {
            error_log($ex->getMessage);
        }
        //Return the long string variable of the file content.
        return $fileContents;
    }
}

?>