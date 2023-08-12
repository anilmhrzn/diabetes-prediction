<?php
require_once "./prediction_algo.php";


// for checkin acccuracy
function get_predictions($class_probabilities, $attribute_probabilities, $test_set) {
    $predictions = array();
    foreach ($test_set as $row) {
        $input = array_slice($row, 0, count($row) - 1);
        $prediction = predict($class_probabilities, $attribute_probabilities, $input);
        $predictions[] = $prediction;
    }
    return $predictions;
}

function calculate_accuracy($predictions, $test_set) {
    $correct = 0;
    for ($i = 0; $i < count($predictions); $i++) {
        if ($predictions[$i] == $test_set[$i][count($test_set[$i]) - 1]) {
            $correct++;
        }
    }
    return ($correct / count($test_set)) * 100.0;
}


$test_set =$testing_set; 

$predictions = get_predictions($class_probabilities, $attribute_probabilities, $test_set);
$accuracy = calculate_accuracy($predictions, $test_set);
echo 'Accuracy: ' . $accuracy . '%';

?>