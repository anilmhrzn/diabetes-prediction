<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Path to the CSV file
$csvFile = 'pima-indians-diabetesdata.csv';

// Read the CSV file into an array
$csvData = array_map('str_getcsv', file($csvFile));

// Iterate over the rows and remove rows where the 4th column value is 0
foreach ($csvData as $key => $row) {
    // if ($key === 0) {
    //     // Skip the header row
    //     continue;
    // }
    
    if ($row[4] == 0) {
        // Remove the row from the CSV data
        unset($csvData[$key]);
    }
}

// Write the modified CSV data back to the file
$fileHandle = fopen($csvFile, 'w');
foreach ($csvData as $row) {
    fputcsv($fileHandle, $row);
}
fclose($fileHandle);

echo 'Rows with 0 in the 4th column have been deleted from the CSV file.';
?>
