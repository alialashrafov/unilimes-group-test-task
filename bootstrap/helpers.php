<?php
use Illuminate\Http\Response;

if (! function_exists('csvToArray')) {
    function csvToArray($filename = '', $delimiter = ',') {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}

if (! function_exists('checkUploadedFileProperties')) {
    function checkUploadedFileProperties($extension, $fileSize){
        $valid_extension = array("csv", "xlsx", "txt");
        $maxFileSize = 20971520;
        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize >= $maxFileSize) {
                throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE);
            }
        } else {
            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE);
        }
    }
}
