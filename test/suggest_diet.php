<?php if($_POST){

    echo 'hello';
    
   

// Database configuration
$servername = "localhost";
$username = "anil";
$password = "password";
$dbname = "mero_diet_planner";

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to get training data from database
function getTrainingData($conn) {
    $trainingData = array();
    $sql = "SELECT * FROM diabetes_training_data";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $trainingData[] = array(
                'age' => $row['age'],
                'gender' => $row['gender'],
                'weight' => $row['weight'],
                'height' => $row['height'],
                'duration' => $row['duration'],
                'medication' => $row['medication'],
                'healthConditions' => $row['health_conditions'],
                'currentDiet' => $row['current_diet'],
                'type' => $row['type']
            );
        }
    }
    return $trainingData;
}

// Function to train the Naive Bayes classifier
function trainNaiveBayes($trainingData) {
    $classProbabilities = array();
    $featureProbabilities = array();
    $classes = array('Type 1', 'Type 2', 'Gestational');
    $totalExamples = count($trainingData);
    // Calculate class probabilities
    foreach ($classes as $class) {
        $classCount = 0;
        foreach ($trainingData as $example) {
            if ($example['type'] == $class) {
                $classCount++;
            }
        }
        $classProbabilities[$class] = $classCount / $totalExamples;
    }
    // Calculate feature probabilities
    $features = array('age', 'gender', 'weight', 'height', 'duration', 'medication', 'healthConditions', 'currentDiet');
    foreach ($classes as $class) {
        $classExamples = array_filter($trainingData, function ($example) use ($class) {
            return $example['type'] == $class;
        });
        foreach ($features as $feature) {
            $featureValues = array_unique(array_column($classExamples, $feature));
            foreach ($featureValues as $value) {
                $count = 0;
                foreach ($classExamples as $example) {
                    if ($example[$feature] == $value) {
                        $count++;
                    }
                }
                $featureProbabilities[$class][$feature][$value] = ($count + 1) / (count(array_keys($classExamples)) + count($featureValues));
            }
        }
    }
    return array($classProbabilities, $featureProbabilities);
}

// Function to predict diet based on input example
function predictDiet($example, $classProbabilities, $featureProbabilities) {
    $classes = array('Type 1', 'Type 2', 'Gestational');
    $scores = array();
    foreach ($classes as $class) {
        $score = log($classProbabilities[$class]);
        foreach ($example as $feature => $value) {
            $score += log($featureProbabilities[$class][$feature][$value]);
        }
        $scores[$class] = $score;
    }
    arsort($scores);
    arsort($scores);
    $topClass = key($scores);
    if ($topClass == 'Type 1') {
        return 'High in protein and low in carbohydrates.';
    } elseif ($topClass == 'Type 2') {
        return 'Low in calories and carbohydrates, and high in fiber.';
    } elseif ($topClass == 'Gestational') {
        return 'Low in sugar and high in fiber.';
    } else {
        return 'Unknown type of diabetes.';
    }
}

$userInput = array();

    // Add each form field to the array
    $userInput['age'] = $_POST['age'];
    $userInput['gender'] = $_POST['gender'];
    $userInput['weight'] = $_POST['weight'];
    $userInput['height'] = $_POST['height'];
    $userInput['duration'] = $_POST['duration'];
    $userInput['medication'] = $_POST['medication'];
    $userInput['healthConditions'] = $_POST['healthConditions'];
    $userInput['currentDiet'] = $_POST['currentDiet'];
$classProbabilities = trainNaiveBayes(getTrainingData($conn))[0];
$featureProbabilities = trainNaiveBayes(getTrainingData($conn))[1];
echo 'Example 1: ' . predictDiet($userInput, $classProbabilities, $featureProbabilities) . '<br>';

// Close database connection
mysqli_close($conn);
print_r($userInput) ;
}
?>