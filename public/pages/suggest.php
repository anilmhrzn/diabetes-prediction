<?php 
    session_start();
if (!(isset($_SESSION['email']))) {
    header('Location: ' . "http://localhost/Main_Project/public/pages/main.php");
    die();}
    include "./../includes/navbar.php";

    ?>
<!-- helllo/ -->
<div class="health-detail-content">

    <p class="font-bold">In this section:</p>
    <ul class="list-disc pl-8">
        <li><a href="#whatFood">What foods can I eat if I have diabetes?</a></li>
        <li><a href="#limit">What foods and drinks should I limit if I have diabetes?</a></li>
        <li><a href="#when">When should I eat if I have diabetes?</a></li>
        <li><a href="#howMuch">How much can I eat if I have diabetes?</a></li>
        <li><a href="#therapy">What is medical nutrition therapy?</a></li>
        <li><a href="#supplements">Will supplements and vitamins help my diabetes?</a></li>
        <li><a href="#active">Why should I be physically active if I have diabetes?</a></li>
        <li><a href="#safe">How can I be physically active safely if I have diabetes?</a></li>
        <li><a href="#whatActivity">What physical activities should I do if I have diabetes?</a></li>
    </ul>
    <p class="mt-4">Nutrition and physical activity are important parts of a healthy lifestyle when you have diabetes.
        Along with other benefits, following a healthy meal plan and being active can help you keep your blood glucose
        level, also called blood sugar, in your target range. To manage your blood glucose, you need to balance what you
        eat and drink with physical activity and diabetes medicine, if you take any. What you choose to eat, how much
        you eat, and when you eat are all important in keeping your blood glucose level in the range that your health
        care team recommends.</p>
    <p class="mt-4">Becoming more active and making changes in what you eat and drink can seem challenging at first. You
        may find it easier to start with small changes and get help from your family, friends, and health care team.</p>
    <p class="mt-4">Eating well and being physically active most days of the week can help you</p>
    <ul class="list-disc pl-8 mt-2">
        <li>keep your blood glucose level, blood pressure, and cholesterol in your target ranges</li>
        <li>lose weight or stay at a healthy weight</li>
        <li>prevent or delay diabetes problems</li>
        <li>feel good and have more energy</li>
    </ul>
    <h2 id="whatFood" class="mt-8">What foods can I eat if I have diabetes?</h2>
    <p class="mt-4">You may worry that having diabetes means going without foods you enjoy. The good news is that you can
        still eat your favorite foods, but you might need to eat smaller portions or enjoy them less often. Your health
        care team will help create a diabetes meal plan for you that meets your needs and likes.</p>
    <p class="mt-4">The key to eating with diabetes is to eat a variety of healthy foods from all food groups, in the
        amounts your meal plan outlines.</p>
    <p class="mt-4">The food groups are</p>
    <ul class="list-disc pl-8 mt-2">
        <li>
            <strong>Vegetables</strong>
            <ul class="list-disc pl-8 mt-2">
                <li>Nonstarchy: includes broccoli, carrots, greens, peppers, and tomatoes</li>
                <li>Starchy: includes potatoes, corn, and green peas</li>
            </ul>
        </li>
        <li>
            <strong>Fruits</strong>
            <ul class="list-disc pl-8 mt-2">
                <li>Includes oranges, melon, berries, apples, bananas, and grapes</li>
            </ul>
        </li>
        <li>
            <strong>Grains</strong>
            <ul class="list-disc pl-8 mt-2">
                <li>At least half of your grains should be whole grains, such as whole wheat, barley, and oats</li>
            </ul>
        </li>
        <li>
            <strong>Protein</strong>
            <ul class="list-disc pl-8 mt-2">
                <li>Lean meat, chicken or turkey without the skin, fish, eggs, nuts, and tofu</li>
            </ul>
        </li>
        <li>
            <strong>Dairy</strong>
            <ul class="list-disc pl-8 mt-2">
                <li>Nonfat or low fat</li>
            </ul>
        </li>
    </ul>
    <!-- Rest of the content -->
  
</div>

<?php 
include "./../includes/footer.php"

?>
<!-- <p class="text-gray-600 text-xs italic">It is the lower number in a blood pressure reading. For example, in a blood pressure reading of 120/80 mmHg, the diastolic pressure is 80 mmHg</p>  -->