<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// step 1
function load_dataset($filename)
{
    $dataset = array();
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $dataset[] = $row;
        }
        fclose($handle);
    }
    return $dataset;
}

$dataset = load_dataset('./pima-indians-diabetesdata.csv');



// step 2
function str_to_float($dataset)
{
    foreach ($dataset as &$row) {
        foreach ($row as &$value) {
            $value = (float) $value;
        }
    }
}

function split_dataset($dataset, $split_ratio)
{
    $split = (int) (count($dataset) * $split_ratio);
    // shuffle($dataset);
    $training_set = array_slice($dataset, 0, $split);
    $testing_set = array_slice($dataset, $split);
    return array($training_set, $testing_set);
}

str_to_float($dataset);
list($training_set, $testing_set) = split_dataset($dataset, 0.7);


print_r($testing_set);

?>