<?php
require_once "./prediction_algo.php";
function calculate_confusion_matrix($actual, $predicted) {
    $truePositives = $trueNegatives = $falsePositives = $falseNegatives = 0;
    
    foreach ($actual as $i => $actualValue) {
        $predictedValue = $predicted[$i];
        
        if ($actualValue == 1 && $predictedValue == 1) {
            $truePositives++;
        } elseif ($actualValue == 0 && $predictedValue == 0) {
            $trueNegatives++;
        } elseif ($actualValue == 0 && $predictedValue == 1) {
            $falsePositives++;
        } elseif ($actualValue == 1 && $predictedValue == 0) {
            $falseNegatives++;
        }
    }
    
    return [
        'truePositives' => $truePositives,
        'trueNegatives' => $trueNegatives,
        'falsePositives' => $falsePositives,
        'falseNegatives' => $falseNegatives,
    ];
}
if (empty($errors)) {
    $prediction = predict($class_probabilities, $attribute_probabilities, $input);

    // Calculate the confusion matrix
    $actualLabels = array_column($testing_set, count($fields) - 1);
    $predictedLabels = array();
    foreach ($testing_set as $row) {
        $predictedLabels[] = predict($class_probabilities, $attribute_probabilities, array_slice($row, 0, count($fields) - 1));
    }
    $confusionMatrix = calculate_confusion_matrix($actualLabels, $predictedLabels);
print_r($confusionMatrix);
    // Access the values from the confusion matrix
    $truePositives = $confusionMatrix['truePositives'];
    $trueNegatives = $confusionMatrix['trueNegatives'];
    $falsePositives = $confusionMatrix['falsePositives'];
    $falseNegatives = $confusionMatrix['falseNegatives'];

    echo "True Positives: $truePositives<br>";
    echo "True Negatives: $trueNegatives<br>";
    echo "False Positives: $falsePositives<br>";
    echo "False Negatives: $falseNegatives<br>";

    // ...
}?>