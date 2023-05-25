const menuToggle = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
const currentUrl = window.location.href;

  // Get the navigation links


  // for desktop
  const dashboardLink = document.getElementById('dashboard-link');
  const blogsLink = document.getElementById('blogs-link');
  const aboutUsLink = document.getElementById('about-us-link');
  const reviewsLink = document.getElementById('reviews-link');
  const calorieCalculatorLink = document.getElementById('calorie-calculator-link');
  const myDietLink = document.getElementById('my-diet-link');


  // for desktop
  if (currentUrl.includes('main')) {
    dashboardLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('blogs')) {
    blogsLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('about_us')) {
    aboutUsLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('reviews')) {
    reviewsLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('calorie_calculator')) {
    calorieCalculatorLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('my_diet')) {
    myDietLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  }


  //  for mobile
  const mobiledashboardLink = document.getElementById('mobile-dashboard-link');
  const mobileblogsLink = document.getElementById('mobile-blogs-link');
  const mobileaboutUsLink = document.getElementById('mobile-about-us-link');
  const mobilereviewsLink = document.getElementById('mobile-reviews-link');
  const mobilecalorieCalculatorLink = document.getElementById('mobile-calorie-calculator-link');
  const mobilemyDietLink = document.getElementById('mobile-my-diet-link');


// for mobile
  if (currentUrl.includes('main')) {
    mobiledashboardLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('blogs')) {
    mobileblogsLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('about_us')) {
    mobileaboutUsLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('reviews')) {
    mobilereviewsLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('calorie_calculator')) {
    mobilecalorieCalculatorLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  } else if (currentUrl.includes('my_diet')) {
    mobilemyDietLink.classList.add('bg-gray-900', 'text-white', 'font-medium');
  }


  // this is for show profile cards showing login logout
menuToggle.addEventListener('click', () => {
  mobileMenu.classList.toggle('hidden');
});
function show_profile_card(id){
  // console.log(id);
    elem=document.getElementById(id)
    elem.classList.remove("hidden")
}
function hide_profile_card(id){
    elem=document.getElementById(id)
    elem.classList.add("hidden")
}

let func1Enabled = true;
  function toggleFunctions(id) {
    // console.log("hello");
    if (func1Enabled) {
      show_profile_card(id);
      func1Enabled = false;
    } else {
      hide_profile_card(id);
      func1Enabled = true;
    }
  }