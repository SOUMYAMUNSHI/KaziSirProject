<?php
$subject = $_REQUEST["subject"];
$chapter = $_REQUEST["chapter"];
$topic = $_REQUEST["topic"];
?>
<div class="final-add_question">
    <div class="add-question_heading">
        <p>Adding question to Subject: <b><?php echo $subject; ?></b></p>
        <input id="selected-subject" hidden type="text" value="<?php echo $subject; ?>">
        <!--Trick to get the value smoothly-->

        <p>Adding question to Chapter: <b><?php echo $chapter; ?></b></p>
        <input id="selected-chapter" hidden type="text"
            value="<?php echo $chapter; ?>"><!--Trick to get the value smoothly-->

        <p>Adding question to Topic: <b><?php echo $topic; ?></b></p>
        <input id="selected-topic" hidden type="text"
            value="<?php echo $topic; ?>"><!--Trick to get the value smoothly-->

        <select class="question-type" name="question-type" id="question-type">
            <option value="mcq">MCQ</option>
            <option value="saq">SAQ</option>
            <option value="laq">LAQ</option>
        </select>
        <button id="select-type" class="select-question">Select</button>
    </div>
</div>


<!--Aadding jquery-->
<script src="../script/JQuery/jquery-3.7.1.js"></script>

<script>
    $("#select-type").click(function () {
        let subject = $("#selected-subject").val();
        let chapter = $("#selected-chapter").val();
        let topic = $("#selected-topic").val();
        let question_type = $("#question-type").val();
        // console.log(subject + " " + chapter + " " + topic + " " + question_type);

        window.open(`http://localhost/KaziSirProject/pages/components/addquestion/mcq_question.php?subject=${subject}&chapter=${chapter}&topic=${topic}&question_type=${question_type}`, "_blank");
    })
</script>