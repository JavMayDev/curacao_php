<?php
$zip = new ZipArchive();
$zip->open(__DIR__.'/sheet.xlsx');

$zip->extractTo(__DIR__.'/unzipped');

$file = __DIR__.'/unzipped/xl/sharedStrings.xml';
file_put_contents($file, str_replace('test_field', 'php edit fuck yeah', file_get_contents($file)) );

// Get real path for our folder
$unzipped = __DIR__.'/unzipped';

// Initialize archive object
$xlsx = new ZipArchive();
$xlsx->open('rezipped.xlsx', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($unzipped),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
    // Skip directories (they would be added automatically)
    if (!$file->isDir()) {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($unzipped) + 1);

        // Add current file to archive
        $xlsx->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$xlsx->close();
/* var_dump($zip); */

rrmdir(__DIR__.'/unzipped');

$rezipped = __DIR__.'/rezipped.xlsx';

/* Download tha shit */
if(file_exists($rezipped)) {
    ob_end_clean();
    /* yeah, it needs lots of header sets */
    header('Content-Description: File Transfer');
    header('Content-Type: File Transfer');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($rezipped) . "\"");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    readfile($rezipped);	
}

unlink($rezipped);

/* remove folder and its content */
function rrmdir($dir) { 
    if (is_dir($dir)) { 
	$objects = scandir($dir);
	foreach ($objects as $object) { 
	    if ($object != "." && $object != "..") { 
		if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
		    rrmdir($dir. DIRECTORY_SEPARATOR .$object);
		else
		    unlink($dir. DIRECTORY_SEPARATOR .$object); 
	    } 
	}
	rmdir($dir); 
    } 
}
?>
