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