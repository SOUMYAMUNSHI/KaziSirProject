<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Bank</title>
    <link rel="stylesheet" href="../../style/question_bankQuestion.css">
</head>

<body>
    <!--Header-->
    <div class="heading-container">
        <h1 class="heading">Kazi Sir Question Bank</h1>
        <h4 class="heading">Subject: Subject</h4>
        <hr>

        <div class="question_type">
            <select class="question_option">
                <option value="NULL">Select</option>
                <option value="MCQ">MCQ</option>
                <option value="SAQ">SAQ</option>
                <option value="LAQ">LAQ</option>
            </select>
            <button class="submit_button" type="submit">Submit</button>

            <button class="print_button" id="print_pdf">Print</button>
        </div>
    </div>
    <!--Header-->

    <div class="questions" id="question">


        <!--MCQ Question-->
        <div class="mcq_question">
            <div class="question">
                <p>1) MCQ Question1?</p>
                <div>
                    <span class="option">1. Option 1</span>
                    <span class="option">2. Option 2</span>
                    <span class="option">3. Option 3</span>
                    <span class="option">4. Option 4</span>
                </div>
            </div>
        </div>
        <!--MCQ Question-->



        <!--SAQ and LAQ Question-->
        <div class="saq">
            <p>1) Question one?</p>
        </div>
        <!--SAQ and LAQ Question-->


    </div>


    <script src="../../script/JQuery/jquery-3.7.1.js"></script>
    <script>

        let fullPage = document.documentElement.outerHTML;

        $("#print_pdf").click(function () {
            window.open(`../../php/print_pdf/pdf.php?html=${encodeURIComponent(fullPage)}`, "_blank");
        });
    </script>

</body>

</html>