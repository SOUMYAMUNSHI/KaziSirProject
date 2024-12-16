<?php
session_start();
if (isset($_SESSION["username"])) {
    include_once("../../static/connection/pdo_connection.php"); //include pdo connection

    $subject_stmt = $pdo_conn->prepare("SELECT `SubCode`, `SubName` FROM `subject`"); //preparing ptatement
    $subject_stmt->execute(); //executing statement

    // $questionType_stmt = $pdo_conn->prepare("")



?>

    <div class="search">
        <div class="search-component">
            <select id="subject-name" class="select" name="subject-name" id="subject-name">
                <option value="subject1">Select Subject</option>
                <?php

                while ($subjects = $subject_stmt->fetch()) {
                    //to view all subject as option
                ?>
                    <option value="<?php echo $subjects["SubCode"]; //subject code as value 
                                    ?>">
                        <?php echo $subjects["SubName"]; //view subject name 
                        ?>
                    </option>
            <?php
                }
            }
            ?>
            </select>





            <select class="select" name="chapter-name" id="chapter-name">
                <option value="subject1">Chapter Name</option>

                <!--The options will load here-->

            </select>























            <select class="select" name="topic-name" id="topic-name">
                <option value="subject1">Topic Name</option>

                <!--The topics will load-->

            </select>














            <select class="select" name="question-type" id="question-type">
                <option value="subject1">Question Type</option>
                <option value="subject1">Subject1</option>
                <option value="subject1">Subject1</option>
                <option value="subject1">Subject1</option>
                <option value="subject1">Subject1</option>
                <option value="subject1">Subject1</option>
            </select>
            <button class="search-button">Search</button>
        </div>

    </div>





    <!--script to dynamically load the drop down-->

    <script src="../script/JQuery/jquery-3.7.1.js"></script> <!--Addding Jquery-->
    <script>
        //To change the @option dropdown using @subject dropdown
        $("#subject-name").change(function() /* This function will rul when the subject dropdown will change or any optoin is selected */ {
            const subjectCode = $("#subject-name").val(); //fetching the value of the sbject dropdown
            $("#chapter-name").load(`../pages/components/sub_components/chapter.php?subCode=${subjectCode}`); //sending the chapter code to the chapter.php
        });


        //to change @topic dropdoen using the @option dropdown

        $("#chapter-name").change(function(){
            const chapterCode = $("#chapter-name").val();
            $("#topic-name").load(`../pages/components/sub_components/topic.php?chCode=${chapterCode}`);
        })
    </script>