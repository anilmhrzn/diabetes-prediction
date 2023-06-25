<!DOCTYPE html>
<html>
<head>
    <title>Calculate Diabetes Pedigree Function</title>
</head>
<body>
    <h2>Calculate Diabetes Pedigree Function</h2>
    <form method="post" action="">
        <label for="num_pregnancies">Number of Pregnancies:</label>
        <input type="number" name="num_pregnancies" required><br>

        <label for="glucose">Glucose Level:</label>
        <input type="number" name="glucose" required><br>

        <label for="blood_pressure">Blood Pressure:</label>
        <input type="number" name="blood_pressure" required><br>

        <label for="skin_thickness">Skin Thickness:</label>
        <input type="number" name="skin_thickness" required><br>

        <label for="insulin">Insulin Level:</label>
        <input type="number" name="insulin" required><br>

        <label for="bmi">BMI:</label>
        <input type="number" name="bmi" required><br>

        <label for="age">Age:</label>
        <input type="number" name="age" required><br>

        <button type="submit">Calculate</button>
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $num_pregnancies = $_POST['num_pregnancies'];
        $glucose = $_POST['glucose'];
        $blood_pressure = $_POST['blood_pressure'];
        $skin_thickness = $_POST['skin_thickness'];
        $insulin = $_POST['insulin'];
        $bmi = $_POST['bmi'];
        $age = $_POST['age'];

        // Calculate Diabetes Pedigree Function
        $diabetes_pedigree_function = ($num_pregnancies * 0.079 +
                                        $glucose * 0.186 +
                                        $blood_pressure * 0.042 +
                                        $skin_thickness * 0.017 +
                                        $insulin * 0.00013 +
                                        $bmi * 0.037 +
                                        $age * 0.078);

        // Apply sigmoid function to constrain the value between 0 and 1
        $diabetes_pedigree_function = 1 / (1 + exp(-$diabetes_pedigree_function));

        // Output the result
        echo "Diabetes Pedigree Function: " . $diabetes_pedigree_function;
    }
    ?>
</body>
</html>
