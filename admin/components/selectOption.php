<form action="" class="w-100 container d-flex justify-content-center flex-column">
    <div class="d-flex justify-content-center my-2">
        <label for="q-type" class="align-self-center">Select Questin Type:</label>
        <select name="q-type" id="q-type" class="w-25 ms-2 p-1">
            <option value="MCQ">MCQ</option>
            <option value="SAQ">SAQ</option>
            <option value="LAQ">LAQ</option>
        </select>
    </div>

    <div class="d-flex justify-content-center my-2">
        <label for="q-type" class="align-self-center ">Enter Question Number: </label>
        <input type="text" class="ms-2" required>
    </div>
    <button type="submit" class="btn btn-success align-self-center my-2">search</button>
</form>

<form action="" class="w-100 container d-flex justify-content-center flex-column">
    <div class="d-flex flex-column justify-content-center my-2">
        <label for="s-question" class="my-2 fs-5">Update Question:</label>
        <input type="text" id="s-question" required>

        <div class="d-flex flex-column">
            <p class="fs-5 my-2">MCQ Options: </p>

            <div class="d-flex justify-content-between flex-column gap-1">
                <label for="op-1">A: </label>
            <input type="text" id="op-1" required>

            <label for="op-1">B: </label>
            <input type="text" id="op-2" required>

            <label for="op-1">C: </label>
            <input type="text" id="op-3" required>


            <label for="op-1">D: </label>
            <input type="text" id="op-4" required>
            </div>

            <div class="d-flex align-items-center flex-column mt-2 gap-5">
                <img src="../../static/src/img/question.png" alt="question-image" width="350px" border="2px">
                <input type="file" accept = "image/jpg, image/jpeg, image/png">
            </div>

            <input type="submit" name="updt-ans" class="btn btn-success align-self-center my-5">
        </div>
    </div>
</form>