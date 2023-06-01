<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Diabetes Diet Planner</title>
</head>

<body class="bg-gray-100">
  <div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-5">Diabetes Diet Planner</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Diet Card 1 -->
      <div class="bg-white rounded-lg shadow-md">
        <div class="p-6">
          <h2 class="text-xl font-semibold mb-2">Low-Carb Diet</h2>
          <p class="text-gray-700">This diet focuses on reducing carbohydrate intake to help manage blood sugar levels.</p>
        </div>
        <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
          <h3 class="text-lg font-semibold mb-2 cursor-pointer">Recommended Foods:</h3>
          <ul class="list-disc ml-6 hidden">
            <li>Non-starchy vegetables</li>
            <li>Lean protein sources</li>
            <li>Healthy fats</li>
          </ul>
        </div>
      </div>

      <!-- Diet Card 2 -->
      <div class="bg-white rounded-lg shadow-md">
        <div class="p-6">
          <h2 class="text-xl font-semibold mb-2">Mediterranean Diet</h2>
          <p class="text-gray-700">This diet emphasizes whole foods, healthy fats, and a moderate amount of carbohydrates.</p>
        </div>
        <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
          <h3 class="text-lg font-semibold mb-2 cursor-pointer">Recommended Foods:</h3>
          <ul class="list-disc ml-6 hidden">
            <li>Fruits and vegetables</li>
            <li>Whole grains</li>
            <li>Lean protein sources</li>
          </ul>
        </div>
      </div>

      <!-- Diet Card 3 -->
      <div class="bg-white rounded-lg shadow-md">
        <div class="p-6">
          <h2 class="text-xl font-semibold mb-2">DASH Diet</h2>
          <p class="text-gray-700">The DASH diet focuses on reducing sodium intake and increasing overall diet quality.</p>
        </div>
        <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
          <h3 class="text-lg font-semibold mb-2 cursor-pointer">Recommended Foods:</h3>
          <ul class="list-disc ml-6 hidden">
            <li>Fruits and vegetables</li>
            <li>Low-fat dairy products</li>
            <li>Lean protein sources</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <script>
        // Toggle visibility of the recommended foods list
        const foodHeadings = document.querySelectorAll(".cursor-pointer");

foodHeadings.forEach((heading) => {
  heading.addEventListener("click", () => {
    const foodList = heading.nextElementSibling;
    foodList.classList.toggle("hidden");
  });
});
</script>
</body>

</html>
