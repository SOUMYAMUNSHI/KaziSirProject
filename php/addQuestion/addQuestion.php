<?php
include("../../static/connection/pdo_connection.php"); //include connection

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $chapter = $_POST['chapter'];
    $topic = $_POST['topic'];
    $question_type = $_POST['question_type'];

    if ($question_type == "mcq") {
        $question = $_POST['type_mcq-question'];
        $option_One = $_POST['type_mcq-answer1'];
        $option_Two = $_POST['type_mcq-answer2'];
        $option_Three = $_POST['type_mcq-answer3'];
        $option_Four = $_POST['type_mcq-answer4'];
        $answer = $_POST['correct-answer'];

        try {
            $stmt = $pdo_conn->prepare("INSERT INTO `qa_mcq` (`QuestionCode`, `TopicCode`, `Question`, `ImageLink`, `Op1`, `Op2`, `Op3`, `Op4`, `Answer`) VALUES (:qCode, :tCode, :Qus, :iLink, :op1, :op2, :op3, :op4, :ans)"); //Prepare the statement


            $stmt->bindValue(':qCode', 'Q004', PDO::PARAM_STR);
            $stmt->bindValue(':tCode', 'T1', PDO::PARAM_STR);
            $stmt->bindValue(':Qus', $question, PDO::PARAM_STR);
            $stmt->bindValue(':iLink', 'NULL', PDO::PARAM_STR);
            $stmt->bindValue(':op1', $option_One, PDO::PARAM_STR);
            $stmt->bindValue(':op2', $option_Two, PDO::PARAM_STR);
            $stmt->bindValue(':op3', $option_Three, PDO::PARAM_STR);
            $stmt->bindValue(':op4', $option_Four, PDO::PARAM_STR);
            $stmt->bindValue(':ans', $answer, PDO::PARAM_STR);
            //Bind all value

            if ($stmt->execute()) //if true than this will execute
            {
                ?>

                <body style="margin:0px; padding:0px">
                    <div
                        style="display:flex; justify-content:center;width:100%;height:100vh;background-color:rgba(0,0,0,0.5); font-family: 'Gill Sans', sans-serif; ">
                        <div
                            style="display:flex; flex-direction:column;gap:20px;width:300px;height:150px;border-radius:2px;background-color:white;margin-top:10px">
                            <p style="text-align:center;margin-top:30px">Question Added Successfully</p>
                            <button onclick="login_page()"
                                style="align-self:center;width:80px;height:30px;background-color:#2c9e4b;border:none;color:white;border-radius:2px;font-family: 'Gill Sans', sans-serif;cursor:pointer">Ok</button>
                        </div>
                    </div>

                    <script>
                        function login_page() {
                            window.location.href = "http://localhost/KaziSirProject/pages/components/addquestion/mcq_question.php?subject=<?php echo urlencode($subject) ?>&chapter=<?php echo urlencode($chapter) ?>&topic=<?php echo urlencode($topic) ?>&question_type=<?php echo $question_type ?>"; //return to previous page
                        }
                    </script>
                </body>

                <?php
            } else //else will execute while some error occurs
            {
                ?>

                <body style="margin:0px; padding:0px">
                    <div
                        style="display:flex; justify-content:center;width:100%;height:100vh;background-color:rgba(0,0,0,0.5); font-family: 'Gill Sans', sans-serif; ">
                        <div
                            style="display:flex; flex-direction:column;gap:20px;width:300px;height:150px;border-radius:2px;background-color:white;margin-top:10px">
                            <p style="text-align:center;margin-top:30px">Some Internal Error Occurred</p>
                            <button onclick="login_page()"
                                style="align-self:center;width:80px;height:30px;background-color:#dc2f2f;border:none;color:white;border-radius:2px;font-family: 'Gill Sans', sans-serif;cursor:pointer">Ok</button>
                        </div>
                    </div>

                    <script>
                        function login_page() {
                            window.location.href = "http://localhost/KaziSirProject/pages/components/addquestion/mcq_question.php?subject=<?php echo urlencode($subject) ?>&chapter=<?php echo urlencode($chapter) ?>&topic=<?php echo urlencode($topic) ?>&question_type=<?php echo $question_type ?>"; //return to previous page
                        }
                    </script>
                </body>
                <?php
            }
        } catch (PDOException $e) //Handeling PDOException
        {
            ?>

            <body style="margin:0px; padding:0px">
                <div
                    style="display:flex; justify-content:center;width:100%;height:100vh;background-color:rgba(0,0,0,0.5); font-family: 'Gill Sans', sans-serif; ">
                    <div
                        style="display:flex; flex-direction:column;gap:20px;width:300px;height:150px;border-radius:2px;background-color:white;margin-top:10px">
                        <p style="text-align:center;margin-top:30px">Some Internal Error Occurred! Please Try Again</p>
                        <button onclick="login_page()"
                            style="align-self:center;width:80px;height:30px;background-color:#dc2f2f;border:none;color:white;border-radius:2px;font-family: 'Gill Sans', sans-serif;cursor:pointer">Ok</button>
                    </div>
                </div>

                <script>
                    function login_page() {
                        window.location.href = "http://localhost/KaziSirProject/pages/components/addquestion/mcq_question.php?subject=<?php echo urlencode($subject) ?>&chapter=<?php echo urlencode($chapter) ?>&topic=<?php echo urlencode($topic) ?>&question_type=<?php echo $question_type ?>"; //return to previous page
                    }
                </script>
            </body>
            <?php
        }
    }
}
?>