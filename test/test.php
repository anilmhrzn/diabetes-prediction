<?php
// Load the data from the CSV file
$data = array_map('str_getcsv', file('pima-indians-diabetes-database.csv'));

// Split the data into training and testing sets
$split = 0.8;
$split_index = round(count($data) * $split);
shuffle($data);
$training_data = array_slice($data, 0, $split_index);
$test_data = array_slice($data, $split_index);

// Calculate the prior probability of each class
$class_counts = array_count_values(array_column($training_data, 8));
$priors = array();
foreach ($class_counts as $class => $count) {
    $priors[$class] = $count / count($training_data);
}

// Calculate the conditional probability of each feature given each class
$conditionals = array();
for ($i = 0; $i < 8; $i++) {
    $conditionals[$i] = array();
    $feature_values = array_unique(array_column($training_data, $i));
    foreach ($class_counts as $class => $count) {
        $class_rows = array_filter($training_data, function($row) use ($class) {
            return $row[8] == $class;
        });
        $feature_counts = array_count_values(array_column($class_rows, $i));
        foreach ($feature_values as $value) {
            if (isset($feature_counts[$value])) {
                $conditionals[$i][$class][$value] = $feature_counts[$value] / $count;
            } else {
                $conditionals[$i][$class][$value] = 0;
            }
        }
    }
}

// Make predictions on the test data using the Naive Bayes algorithm
$predictions = array();
foreach ($test_data as $row) {
    // Calculate the posterior probability of each class given the features of the data point using Bayes' theorem
    $posteriors = array();
    foreach ($class_counts as $class => $count) {
        $posterior = $priors[$class];
        for ($i = 0; $i < 8; $i++) {
            $value = $row[$i];
            if (isset($conditionals[$i][$class][$value])) {
                $posterior *= $conditionals[$i][$class][$value];
            } else {
                $posterior = 0;
                break;
            }
        }
        $posteriors[$class] = $posterior;
    }

    // Choose the class with the highest posterior probability as the predicted class
    $predicted = array_keys($posteriors, max($posteriors))[0];
    $predictions[] = $predicted;
}

// Evaluate the performance of the algorithm using metrics such as accuracy, precision, recall, and F1 score
$true_positives = 0;
$false_positives = 0;
$true_negatives = 0;
$false_negatives = 0;
foreach ($test_data as $i => $row) {
    $actual = (int) $row[8];
    $predicted = $predictions[$i];
    if ($actual == 1 && $predicted == 1) {
        $true_positives++;
    } elseif ($actual == 0 && $predicted == 1) {
        $false_positives++;
    } elseif ($actual == 0 && $predicted == 0) {
        $true_negatives++;
    } elseif ($actual == 1 && $predicted == 0) {
        $false_negatives++;
    }
}
$accuracy = ($true_positives + $true_negatives) / count($test);
$precision = $true_positives / ($true_positives + $false_positives);
$recall = $true_positives / ($true_positives + $false_negatives);
$f1_score = 2 * $precision * $recall / ($precision + $recall);

// Print the performance metrics
echo "Accuracy: " . round($accuracy, 2) . "\n";
echo "Precision: " . round($precision, 2) . "\n";
echo "Recall: " . round($recall, 2) . "\n";
echo "F1 score: " . round($f1_score, 2) . "\n";
?>