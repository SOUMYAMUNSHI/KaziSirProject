<?php
session_start();
//Checking Session
if (isset($_SESSION['username'])) {
    $subject = htmlspecialchars($_REQUEST['subject']); //getting the data and htmlspecialchars function is use to get data securely(to protect from Cross-Site Scripting)
    $chapter = htmlspecialchars($_REQUEST['chapter']); //getting the data and htmlspecialchars function is use to get data securely(to protect from Cross-Site Scripting)
    $topic = htmlspecialchars($_REQUEST['topic']); //getting the data and htmlspecialchars function is use to get data securely(to protect from Cross-Site Scripting)
    $question_type = htmlspecialchars($_REQUEST['question_type']); //getting the data and htmlspecialchars function is use to get data securely(to protect from Cross-Site Scripting)

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add <?php echo strtoupper($question_type) ?> Question</title>

        <!--Stylesheet start here-->
        <link rel="stylesheet" href="../../../style/user-home_addQustion.css">
        <!--Stylesheet end here-->

        <!--For Text editor Start-->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <!--For Text editor End-->

    </head>

    <body style="margin:0px; padding:0px">

        <nav class="header">
            <p>Add <?php echo strtoupper($question_type) ?> Question</p>
        </nav>
        <?php
        if ($question_type == "mcq") {
            ?>
            <form method="POST" action="../../../php/addQuestion/addQuestion.php" class="mcq_question-form">
                <div class="mcq_question-form-div">

                    <input hidden name="subject" type="text" value="<?php echo $subject ?>">
                    <!--Hidden input tag is used to carry the value-->
                    <input hidden name="chapter" type="text" value="<?php echo $chapter ?>">
                    <!--Hidden input tag is used to carry the value-->
                    <input hidden name="topic" type="text" value="<?php echo $topic ?>">
                    <!--Hidden input tag is used to carry the value-->
                    <input hidden name="question_type" type="text" value="<?php echo $question_type ?>">
                    <!--Hidden input tag is used to carry the value-->

                    <label for="type_mcq-question">Enter Question Here</label>
                    <input type="text" name="type_mcq-question" id="type_mcq-question" placeholder="Enter question here"
                        required>

                    <label for="type_mcq-answer1">Enter first options Here</label>
                    <input type="text" name="type_mcq-answer1" id="type_mcq-answer1" placeholder="Enter First Option" required>

                    <label for="type_mcq-answer2">Enter second options Here</label>
                    <input type="text" name="type_mcq-answer2" id="type_mcq-answer2" placeholder="Enter Second Option" required>

                    <label for="type_mcq-answer3">Enter third options Here</label>
                    <input type="text" name="type_mcq-answer3" id="type_mcq-answer3" placeholder="Enter Third Option" required>

                    <label for="type_mcq-answer4">Enter forth options Here</label>
                    <input type="text" name="type_mcq-answer4" id="type_mcq-answer4" placeholder="Enter Fourth Option" required>

                    <label for="correct-answer">Enter Answer Here</label>
                    <input type="text" name="correct-answer" id="type_mcq-answer" placeholder="Enter Correct answer Here"
                        required>

                    <input type="file" name="question-image" id="question-image">

                    <button type="submit" name="submit">Add Question</button>

                </div>
            </form>
            <?php
        } else if ($question_type == "saq") {
            ?>

                <form method="POST" action="../../../php/addQuestion/addQuestion.php" class="mcq_question-form">
                    <div class="mcq_question-form-div">

                        <input hidden type="text" name="subject" value="<?php echo $subject ?>">
                        <!--Hidden input tag is used to carry the value-->
                        <input hidden type="text" name="chapter" value="<?php echo $chapter ?>">
                        <!--Hidden input tag is used to carry the value-->
                        <input hidden type="text" name="topic" value="<?php echo $topic ?>">
                        <!--Hidden input tag is used to carry the value-->
                        <input hidden name="question_type" type="text" value="<?php echo $question_type ?>">
                        <!--Hidden input tag is used to carry the value-->

                        <label for="type_mcq-question">Enter Question Here</label>
                        <input type="text" name="type_mcq-question" id="type_mcq-question" placeholder="Enter question here"
                            required>

                        <label for="correct-answer">Enter Answer Here</label>

                        <!--For Text editor Start-->
                        <div id="editor"></div>
                        <input type="hidden" name="correct-answer" id="type_mcq-answer">
                        <!--For Text editor End-->




                        <input type="file" name="question-image" id="question-image">

                        <button type="submit" name="submit">Add Question</button>

                    </div>
                </form>

            <?php
        } else if ($question_type == "laq") {
            ?>
                    <form method="POST" action="../../../php/addQuestion/addQuestion.php" class="mcq_question-form">
                        <div class="mcq_question-form-div">

                            <input hidden type="text" name="subject" value="<?php echo $subject ?>">
                            <!--Hidden input tag is used to carry the value-->
                            <input hidden type="text" name="chapter" value="<?php echo $chapter ?>">
                            <!--Hidden input tag is used to carry the value-->
                            <input hidden type="text" name="topic" value="<?php echo $topic ?>">
                            <!--Hidden input tag is used to carry the value-->
                            <input hidden name="question_type" type="text" value="<?php echo $question_type ?>">
                            <!--Hidden input tag is used to carry the value-->

                            <label for="type_mcq-question">Enter Question Here</label>
                            <input type="text" name="type_mcq-question" id="type_mcq-question" placeholder="Enter question here"
                                required>

                            <label for="correct-answer">Enter Answer Here</label>

                            <!--For Text editor Start-->
                            <div id="editor"></div>
                            <input type="hidden" name="correct-answer" id="type_mcq-answer">
                            <!--For Text editor End-->


                            <input type="file" name="question-image" id="question-image">

                            <button type="submit" name="submit">Add Question</button>

                        </div>
                    </form>
            <?php
        }
        ?>
    </body>

    <!--For Text editor Start-->
    <script>
        var quill = new Quill('#editor', { theme: 'snow' });

        document.querySelector('form').onsubmit = function () {
            document.querySelector('#type_mcq-answer').value = quill.root.innerHTML;
        };
    </script>
    <!--For Text editor End-->

    </html>
    <?php
} else {
    include("../../../pages/error_msg/error_page.php"); //Redirect to index page if not logged in
}
?>