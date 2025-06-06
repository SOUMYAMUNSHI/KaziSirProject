<div class="rounded-2 bg-warning w-50 d-flex border-bottom border-2 border-primary" id="add-subject" style="cursor:pointer">
      <p class="m-0 p-2 fs-5 text-muted">Add Subject</p>
    </div>

    <div class="rounded-2 bg-warning w-50 d-flex border-bottom border-2 border-primary" id="update" style="cursor:pointer">
      <p class="m-0 p-2 fs-5 text-muted">Update</p>
    </div>

    <div class="rounded-2 bg-warning w-50 d-flex border-bottom border-2 border-primary" style="cursor:pointer">
      <p class="m-0 p-2 fs-5 text-muted">Update Question</p>
    </div>

    <div class="rounded-2 bg-warning w-50 d-flex border-bottom border-2 border-primary" style="cursor:pointer">
      <p class="m-0 p-2 fs-5 text-muted">Activate or Deactivate Contents</p>
    </div>
    
  <script>
    $("#add-subject").click(()=>{
       $("#container").load("../components/addSubject.php");
       console.log("Hello world");
    });

    $("#update").click(()=>{
      $("#container").load("../components/update.php");
      console.log("Hello world");
    });

  </script>