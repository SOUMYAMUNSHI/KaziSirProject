//this javascript is for managing in user-home.php page

$("#question-bank").click(function () {
  $("#animation-div").addClass("hidden"); //to hide the book animation (opotional)
  $(".view").load("./components/question-card.php");
}); //view question-card

$("#search").click(function () {
  $(".view").load("./components/search-book.php");
}); //view search-book

$("#star-question").click(function () {
  $(".view").load("./components/star-question.html");
});

$("#admin-pannel").click(function () {
  $(".view").load("./components/admin-login.php");
});

$("#add_questions").click(function () {
  $(".view").load("./components/sub_components/question_input_option.php");
});

var animation = lottie.loadAnimation({
  container: document.getElementById("animation"), // Target container
  renderer: "svg", // Render type ('svg', 'canvas', or 'html')
  loop: true, // Animation loop (true/false)
  autoplay: true, // Autoplay the animation
  path: "../script/animation/book.json", // Path to your animation JSON file
});
