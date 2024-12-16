<div id="options-form" class="hidden"> <!--This div is hidden, this is a trick to hold value-->
    <input id="question-subject" type="text" name="question_subject">
    <input id="question-chapter" type="text" name="question_chapter">
    <input id="question-topic" type="text" name="question_topic">
</div>

<div class="input-question">


    <div id="input-question" class="subject-input subject_input animate__animated">
        <p class="input-subject_heading">Select Subject</p>
        <select class="select-subject_option" name="input-chapter" id="input-subject">
            <option value="subject">Subject</option>
            <option value="chapter">Chapter</option>
        </select>
        <button id="subject-button" class="subject-button">Select</button>
    </div>

    <div id="chapter-input" class="subject-input subject_chpter hidden animate__animated">
        <p class="input-subject_heading">Select chapter</p>
        <select class="select-subject_option" name="input-chapter" id="input-chapter">
            <option value="chapter">Chapter</option>
            <option value="chapter">Chapter</option>
        </select>
        <button id="chapter-button" class="subject-button">Select</button>
    </div>

    <div id="topic-input" class="subject-input subject_topic hidden animate__animated">
        <p class="input-subject_heading">Select Topic</p>
        <select class="select-subject_option" name="input-chapter" id="input-topic">
            <option value="chapter">Topic</option>
            <option value="chapter">Chapter</option>
        </select>
        <button id="topic-button" class="subject-button">Select</button>
    </div>


</div>

<!--Adding related javascript for animation and other-->
<script src="../script/question_input.js"></script>