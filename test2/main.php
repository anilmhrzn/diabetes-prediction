<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load the preprocessed data from the database
$conn = mysqli_connect("localhost", "anil", "password", "mero_diet_planner");
$query = "SELECT * FROM diabetes";
$result = mysqli_query($conn, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Split the data into training and testing sets
shuffle($data);
$split_index = (int)(count($data) * 0.8);
$training_set = array_slice($data, 0, $split_index);
$testing_set = array_slice($data, $split_index);

// Calculate the prior probabilities for each class
$class_counts = array();
foreach ($training_set as $row) {
    $class = $row['Outcome'];
    if (!isset($class_counts[$class])) {
        $class_counts[$class] = 0;
    }
    $class_counts[$class]++;
}
$priors = array();
$total_count = count($training_set);
foreach ($class_counts as $class => $count) {
    $priors[$class] = $count / $total_count;
}

// Calculate the conditional probabilities for each feature
$feature_counts = array();
$feature_values = array();
foreach ($training_set as $row) {
    $class = $row['Outcome'];
    foreach ($row as $feature => $value) {
        if ($feature == 'Outcome') {
            continue;
        }
        if (!isset($feature_counts[$class][$feature])) {
            $feature_counts[$class][$feature] = array();
            $feature_values[$feature] = array();
        }
        if (!isset($feature_counts[$class][$feature][$value])) {
            $feature_counts[$class][$feature][$value] = 0;
            $feature_values[$feature][] = $value;
        }
        $feature_counts[$class][$feature][$value]++;
    }
}
$conditional_probs = array();
foreach ($feature_counts as $class => $feature_count) {
    foreach ($feature_count as $feature => $value_count) {
        foreach ($value_count as $value => $count) {
            $prob = ($count + 1) / (count($training_set) + count($feature_values[$feature]));
            $conditional_probs[$class][$feature][$value] = $prob;
        }
    }
}

// Classify the testing set using the Naive Bayes algorithm
$correct_count = 0;
foreach ($testing_set as $row) {
    $scores = array();
    foreach ($priors as $class => $prior) {
        $score = log($prior);
        foreach ($row as $feature => $value) {
            if ($feature == 'Outcome') {
                continue;
            }
            if (isset($conditional_probs[$class][$feature][$value])) {
                $score += log($conditional_probs[$class][$feature][$value]);
            }
        }
        $scores[$class] = $score;
    }
    arsort($scores);
    $predicted_class = key($scores);
    if ($predicted_class == $row['Outcome']) {
        $correct_count++;
    }
}
$accuracy = $correct_count / count($testing_set);

echo "Accuracy: " . $accuracy;

?>
