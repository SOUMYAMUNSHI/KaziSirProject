<form action="" class="w-50 container d-flex justify-content-center flex-column">
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