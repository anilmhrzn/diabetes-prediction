<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

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

// Get input data from the HTML form
$pregnancies = $_POST['pregnancies'];
$glucose = $_POST['glucose'];
$blood_pressure = $_POST['blood_pressure'];
$skin_thickness = $_POST['skin_thickness'];
$insulin = $_POST['insulin'];
$bmi = $_POST['bmi'];
$diabetes_pedigree_function = $_POST['diabetes_pedigree_function'];
$age = $_POST['age'];

// Make a prediction using the Naive Bayes algorithm
$scores = array();
foreach ($priors as $class => $prior) {
    $score = log($prior);
    $score += log($conditional_probs[$class]['Pregnancies'][$pregnancies]);
    $score += log($conditional_probs[$class]['Glucose'][$glucose]);
    $score += log($conditional_probs[$class]['BloodPressure'][$blood_pressure]);
    $score += log($conditional_probs[$class]['SkinThickness'][$skin_thickness]);
    $score += log($conditional_probs[$class]['Insulin'][$insulin]);
    $score += log($conditional_probs[$class]['BMI'][$bmi]);
    $score += log($conditional_probs[$class]['DiabetesPedigreeFunction'][$diabetes_pedigree_function]);
    $score += log($conditional_probs[$class]['Age'][$age]);
    $scores[$class] = $score;
    }
    
    // Determine the predicted class with the highest score
    arsort($scores);
    $predicted_class = key($scores);
    
    // Print the predicted class to the user
    if ($predicted_class == 0) {
    echo "Based on the input data, the model predicts that the person is unlikely to have diabetes.";
    } else {
    echo "Based on the input data, the model predicts that the person is likely to have diabetes.";
    }
    
    ?>