<?php
if (isset($_SESSION["usernme"])) {
}
?>
<div id="options-form" class="hidden"> <!--This div is hidden, this is a trick to hold value-->
    <input id="question-subject" type="text" name="question_subject">
    <input id="question-chapter" type="text" name="question_chapter">
    <input id="question-topic" type="text" name="question_topic">
</div>

<?php
include_once("../../../static/connection/pdo_connection.php"); //include PDO connection

$subject_stmt = $pdo_conn->prepare("SELECT `SubCode`, `SubName` FROM `subject`"); //preparing ptatement
$subject_stmt->execute(); //executing statement

?>

<div class="input-question">


    <div id="input-question" class="subject-input subject_input animate__animated">
        <p class="input-subject_heading">Select Subject</p>
        <select class="select-subject_option" name="input-chapter" id="input-subject">
            <option value="">Select Subject</option>






            <?php
            while ($subjects = $subject_stmt->fetch()) {
                //to view all subject as option
                ?>
                <option value="<?php echo urlencode($subjects["SubCode"]); //subject code as value, urlencode() is used to remove blank space
                    ?>">
                    <?php echo $subjects["SubName"]; //view subject name 
                        ?>
                </option>
                <?php
            }
            ?>
        </select>
        <button id="subject-button" class="subject-button">Select</button>
    </div>












    <div id="chapter-input" class="subject-input subject_chpter hidden animate__animated">
        <p class="input-subject_heading">Select chapter</p>
        <select class="select-subject_option" name="input-chapter" id="input-chapter">
            <option value="chapter">Chapter</option>

            <!--The options will load here-->

        </select>
        <button id="chapter-button" class="subject-button">Select</button>
    </div>









    <div id="topic-input" class="subject-input subject_topic hidden animate__animated">
        <p class="input-subject_heading">Select Topic</p>
        <select class="select-subject_option" name="input-chapter" id="input-topic">
            <option value="chapter">Topic</option>

            <!--The topics will load-->

        </select>
        <button id="topic-button" class="subject-button">Select</button>
    </div>


</div>







<script src="../script/JQuery/jquery-3.7.1.js"></script> <!--Addding Jquery-->






<!--Adding related javascript for animation and other-->
<script src="../script/question_input.js"></script> <!--To add question types-->





<!--script to dynamically load the drop down-->
<script>
    //To change the @option dropdown using @subject dropdown
    $("#input-subject").change(function () /* This function will rul when the subject dropdown will change or any optoin is selected */ {
        const subjectCode = $("#input-subject").val(); //fetching the value of the sbject dropdown
        $("#input-chapter").load(`../pages/components/sub_components/chapter.php?subCode=${subjectCode}`); //sending the chapter code to the chapter.php
    });


    //to change @topic dropdoen using the @option dropdown

    $("#input-chapter").change(function () {
        const chapterCode = $("#input-chapter").val();
        $("#input-topic").load(`../pages/components/sub_components/topic.php?chCode=${chapterCode}`);
    })
</script>