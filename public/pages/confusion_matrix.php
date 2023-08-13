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

$testing_set=$testing_set;
// if there are no validation errors, make a prediction
if (empty($errors)) {

    $actualLabels = array_column($testing_set, count($fields) +1);
    // print_r($actualLabels);
    $predictedLabels = array();
    
    // Generate predictions for each instance in the testing set
    foreach ($testing_set as $row) {
        $input = array_slice($row, 0, count($fields) +1);
        $predictedLabels[] = predict($class_probabilities, $attribute_probabilities, $input);
    }
    
    // Calculate the confusion matrix
    $confusionMatrix = calculate_confusion_matrix($actualLabels, $predictedLabels);

    // Access the values from the confusion matrix
    $truePositives = $confusionMatrix['truePositives'];
    $trueNegatives = $confusionMatrix['trueNegatives'];
    $falsePositives = $confusionMatrix['falsePositives'];
    $falseNegatives = $confusionMatrix['falseNegatives'];

    // Print the confusion matrix components
    echo "True Positives: $truePositives<br>";
    echo "True Negatives: $trueNegatives<br>";
    echo "False Positives: $falsePositives<br>";
    echo "False Negatives: $falseNegatives<br>";
    echo "accuracy=: ".($truePositives+$trueNegatives)/count($testing_set)*100;
    echo "<br>Misclassification Rate/Error rate:".($falsePositives+$falseNegatives)/count($testing_set)*100;

    // ... (rest of your code)
}

// ... (rest of your code)

?>










<!-- 
function give_number_pregnencies(){
  $dataset = load_dataset('./pima-indians-diabetesdata.csv');
  $dataArray=array();
  $dataArray[0]=[0,0];
  $dataArray[1]=[1,0];
  $dataArray[2]=[2,0];
  $dataArray[3]=[3,0];
  $dataArray[4]=[4,0];
  $dataArray[5]=[5,0];
  $dataArray[6]=[6,0];
  $dataArray[7]=[7,0];
  $dataArray[8]=[8,0];
  $dataArray[9]=[9,0];
  $dataArray[10]=[10,0];
  foreach ($dataset as $row) {
    echo $row[0]."<br>";
    if($row[8]==1){
      $tmp=$row[0];
      $dataArray[$tmp][1]=$dataArray[$tmp][1]+1;
      // echo 'hello';
    }
    
  }
  return $dataArray;

  
}


$dataArray=json_encode(give_number_pregnencies());
// $dataJSON = json_encode($dataArray);
// ... (your existing code) -->
   <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        // var data = google.visualization.arrayToDataTable([
        //   ['glucose', 'age', 'Expenses', 'Profit', 'Profit'],
        //   ['20', 1000, 400, 200, 200],
        //   ['40', 1170, 460, 250, 200],
        //   ['80', 660, 1120, 300, 200],
        //   ['100', 1030, 540, 350]
        // ]);
        var data = google.visualization.arrayToDataTable(
          
//           [
// ['pregnancies','no of diabetic people'],
// ['0',2],
// ['1',2],
// ['2',2],
// ['3',2],
// ['4',1],
// ['5',1],
// ['7',1],
// ['8',1],
//         ]
        );
        var data = new google.visualization.DataTable();
data.addColumn('string', 'pregnancies');
data.addColumn('number', 'no of diabetic people');
data.addRows(<?=$dataArray?>);
console.log(<?=$dataArray?>);
console.log('jeje');
        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div> -->
