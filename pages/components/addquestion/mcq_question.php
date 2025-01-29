<?php
$subject = $_REQUEST['subject'];
$chapter = $_REQUEST['chapter'];
$topic = $_REQUEST['topic'];
$question_type = $_REQUEST['question_type'];

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
                    <textarea name="correct-answer" id="type_mcq-answer" required placeholder="Enter Correct answer Here"
                        rows="6"></textarea>

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
                        <textarea name="correct-answer" id="type_mcq-answer" required placeholder="Enter Correct answer Here"
                            rows="10"></textarea>

                        <input type="file" name="question-image" id="question-image">

                        <button type="submit" name="submit">Add Question</button>

                    </div>
                </form>
        <?php
    }
    ?>
</body>

</html>