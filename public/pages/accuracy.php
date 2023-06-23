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

$test_set = array(
    array(6, 148, 72, 35, 0, 33.6, 0.627, 50, 1),
    array(1, 85, 66, 29, 0, 26.6, 0.351, 31, 0),
    array(8, 183, 64, 0, 0, 23.3, 0.672, 32, 1),
    array(1, 116, 78, 29, 180, 36.1, 0.496, 25, 0),
    array(0, 141, 84, 26, 0, 32.4, 0.433, 22, 0),
    array(2, 175, 88, 0, 0, 22.9, 0.326, 22, 0),
    array(2, 92, 52, 0, 0, 30.1, 0.141, 22, 0),
    array(3, 130, 78, 23, 79, 28.4, 0.323, 34, 1),
    array(8, 120, 86, 0, 0, 28.4, 0.259, 22, 1),
    array(2, 174, 88, 37, 120, 44.5, 0.646, 24, 1),
    array(2, 106, 56, 27, 165, 29.0, 0.426, 22, 0),
    array(2, 105, 75, 0, 0, 23.3, 0.560, 53, 0),
    array(4, 95, 60, 32, 0, 35.4, 0.284, 28, 0),
    array(0, 126, 86, 27, 120, 27.4, 0.515, 21, 0),
    array(8, 65, 72, 23, 0, 32.0, 0.600, 42, 0),
    array(2, 99, 60, 17, 160, 36.6, 0.453, 21, 0),
    array(1, 102, 74, 0, 0, 39.5, 0.293, 42, 1),
    array(11, 120, 80, 37, 150, 42.3, 0.785, 48, 1),
    array(3, 102, 44, 20, 94, 30.8, 0.400, 26, 0),
    array(1, 109, 58, 18, 116, 28.5, 0.219, 22, 0),
    array(9, 140, 94, 0, 0, 32.7, 0.734, 45, 1),
    array(13, 153, 88, 37, 140, 40.6, 1.174, 39, 0),
    array(12, 100, 84, 33, 105, 30.0, 0.488, 46, 0),
    array(1, 147, 94, 41, 0, 49.3, 0.358, 27, 1),
    array(1, 81, 74, 41, 57, 46.3, 1.096, 32, 0),
    array(3, 187, 70, 22, 200, 36.4, 0.408, 36, 1),
    array(6, 162, 62, 0, 0, 24.3, 0.178, 50, 1),
    array(4, 136, 70, 0, 0, 31.2, 1.182, 22, 1),
    array(1, 121, 78, 39, 74, 39.0, 0.261, 28, 0),
    array(3, 108, 62, 24, 0, 26.0, 0.223, 25, 0),
    array(0, 181, 88, 44, 510, 43.3, 0.222, 26, 1),
    array(8, 154, 78, 32, 0, 32.4, 0.443, 45, 1),
    array(1, 128, 88, 39, 110, 36.5, 1.057, 37, 1),
    array(7, 137, 90, 41, 0, 32.0, 0.391, 39, 0),
    array(0, 123, 72, 0, 0, 36.3, 0.258, 52, 1),
    array(1, 106, 76, 0, 0, 37.5, 0.197, 26, 0),
    array(6, 190, 92, 0, 0, 35.5, 0.278, 66, 1),
    array(2, 88, 58, 26, 16, 28.4, 0.766, 22, 0),
    array(9, 170, 74, 31, 0, 44.0, 0.403, 43, 1),
    array(9, 89, 62, 0, 0, 22.5, 0.142, 33, 0),
    array(10, 101, 76, 48, 180, 32.9, 0.171, 63, 0),
    array(2, 122, 70, 27, 0, 36.8, 0.340, 27, 0),
    array(5, 121, 72, 23, 112, 26.2, 0.245, 30, 0),
    array(1, 126, 60, 0, 0, 30.1, 0.349, 47, 1),
    array(1, 93, 70, 31, 0, 30.4, 0.315, 23, 0),
);

$predictions = get_predictions($class_probabilities, $attribute_probabilities, $test_set);
$accuracy = calculate_accuracy($predictions, $test_set);
echo 'Accuracy: ' . $accuracy . '%';

?>