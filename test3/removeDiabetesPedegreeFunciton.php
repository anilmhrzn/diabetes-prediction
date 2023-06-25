<?php
// Read the dataset from the CSV file
$dataset = array_map('str_getcsv', file('pima-indians-diabetesdata.csv'));

// Function to remove a specific column from the dataset
function removeColumn(&$array, $columnIndex) {
    foreach ($array as &$row) {
        if (isset($row[$columnIndex])) {
            array_splice($row, $columnIndex, 1);
        }
    }
}

// Remove the "Diabetes Pedigree Function" column (assuming it's at index 6)
removeColumn($dataset, 6);

// Save the modified dataset back to a new CSV file
$modifiedCsv = '';
foreach ($dataset as $row) {
    $modifiedCsv .= implode(',', $row) . "\n";
}

file_put_contents('modified-pima-indians-diabetesdata.csv', $modifiedCsv);

echo "Column removed successfully and modified dataset saved as 'modified-pima-indians-diabetesdata.csv'.";
?>