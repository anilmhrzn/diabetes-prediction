<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// step 1
function load_dataset($filename) {
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
function str_to_float($dataset) {
    foreach ($dataset as &$row) {
        foreach ($row as &$value) {
            $value = (float) $value;
        }
    }
}

function split_dataset($dataset, $split_ratio) {
    $split = (int) (count($dataset) * $split_ratio);
    shuffle($dataset);
    $training_set = array_slice($dataset, 0, $split);
    $testing_set = array_slice($dataset, $split);
    return array($training_set, $testing_set);
}

str_to_float($dataset);
list($training_set, $testing_set) = split_dataset($dataset, 0.7);



// step 3
function separate_by_class($dataset) {
    $separated = array();
    foreach ($dataset as $row) {
        $class = $row[count($row) - 1];
        if (!isset($separated[$class])) {
            $separated[$class] = array();
        }
        $separated[$class][] = $row;
    }
    return $separated;
}

function calculate_class_probabilities($dataset) {
    $separated = separate_by_class($dataset);
    $total_rows = count($dataset);
    $class_probabilities = array();
    foreach ($separated as $class => $rows) {
        $class_probabilities[$class] = count($rows) / $total_rows;
    }
    return $class_probabilities;
}

function calculate_mean($numbers) {
    return array_sum($numbers) / count($numbers);
}

function calculate_stdev($numbers) {
    $mean = calculate_mean($numbers);
    $variance = 0.0;
    foreach ($numbers as $number) {
        $variance += pow($number - $mean, 2);
    }
    $variance /= count($numbers) - 1;
    return sqrt($variance);
}

function calculate_attribute_probabilities($dataset) {
    $separated = separate_by_class($dataset);
    $attribute_probabilities = array();
    foreach ($separated as $class => $rows) {
        $attribute_probabilities[$class] = array();
        for ($i = 0; $i < count($rows[0]) - 1; $i++) {
            $values = array_column($rows, $i);
            $mean = calculate_mean($values);
            $stdev = calculate_stdev($values);
            $attribute_probabilities[$class][] = array('mean' => $mean, 'stdev' => $stdev);
        }
    }
    return $attribute_probabilities;
}

$class_probabilities = calculate_class_probabilities($training_set);
$attribute_probabilities = calculate_attribute_probabilities($training_set);



// step 4
function calculate_probability($x, $mean, $stdev) {
    $exponent = exp(-pow($x - $mean, 2) / (2 * pow($stdev, 2)));
    return (1 / (sqrt(2 * M_PI) * $stdev)) * $exponent;
}

function calculate_class_probabilities_given_attributes($class_probabilities, $attribute_probabilities, $input) {
    $probabilities = array();
    foreach ($class_probabilities as $class => $class_probability) {
        $probability = $class_probability;
        for ($i = 0; $i < count($input); $i++) {
            $mean = $attribute_probabilities[$class][$i]['mean'];
            $stdev = $attribute_probabilities[$class][$i]['stdev'];
            $x = $input[$i];
            $probability *= calculate_probability($x, $mean, $stdev);
        }
        $probabilities[$class] = $probability;
    }
    return $probabilities;
}

function predict($class_probabilities, $attribute_probabilities, $input) {
    $probabilities = calculate_class_probabilities_given_attributes($class_probabilities, $attribute_probabilities, $input);
    arsort($probabilities);
    return key($probabilities);
}
// define the input fields and their types
$fields = array(
    array('label' => 'Pregnancies', 'type' => 'number'),
    array('label' => 'Glucose', 'type' => 'number'),
    array('label' => 'BloodPressure', 'type' => 'number'),
    array('label' => 'SkinThickness', 'type' => 'number'),
    array('label' => 'Insulin', 'type' => 'number'),
    array('label' => 'BMI', 'type' => 'number'),
    array('label' => 'Age', 'type' => 'number')
);

// initialize input array with null values
$input = array_fill(0, count($fields), null);

// if the form was submitted, process the input and make a prediction
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // validate input and populate input array
    $errors = array();
    foreach ($fields as $i => $field) {
        if ($field['label'] === 'DiabetesPedigreeFunction') {
            continue; // skip this field
        }
        $value = $_POST[$i];
        if (!is_numeric($value)) {
            $errors[] = "{$field['label']} must be a number";
        } else {
            $input[$i] = floatval($value);
        }
    }

    // if there are no validation errors, make a prediction
    if (empty($errors)) {
        $prediction = predict($class_probabilities, $attribute_probabilities, $input);
        echo "Prediction: " . $prediction;
    } else {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}





?>