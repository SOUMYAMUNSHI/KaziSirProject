//This function will create all the questions as pdf

function print() {
  const heading = `<div style="text-align:center;margin-top:0px;">
<h1 class="heading">Kazi Sir Question Bank</h1>
<h4 class="heading" > Subject:<?php echo $subject ?></h4 >
<hr>
</div>`; //This is the heading

  let questions = document.getElementById("question").innerHTML; //this contain all the questions
  let page = heading + questions; //Concatinating heading and questions

  window.open(
    `../../php/print_pdf/pdf.php?html=${encodeURIComponent(page)}`,
    "_blank"
  );
}
