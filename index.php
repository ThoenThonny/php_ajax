<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body class=" w-100 vh-100 p-5">
    <div class=" container h-auto">
       <div class=" w-100 d-flex justify-content-between align-items-center">
         <h1>Employee Managerments</h1>
         <button id="add-emp" class=" btn btn-primary">Add employee</button>
       </div>
        <table class=" table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PROFILE</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>SALARY</th>
                    <th>EMAIL</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr class=" align-middle">
                    <td >101</td>
                    <td>
                        <img class=" rounded-circle object-fit-cover" style="width: 55px; height: 55px;" src="https://i.pinimg.com/736x/ee/f2/66/eef2667d2b5a197f8a5df9e2f828f4fb.jpg" alt="">
                    </td>
                    <td >Sok Heng</td>
                    <td >Male</td>
                    <td>1000$</td>
                    <td>heng123@gmail.com</td>
                    <td>
                        <button id="edit" class=" btn btn-warning">edit</button>
                        <button id="delete" class=" btn btn-danger">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class=" opactity"></div>
    <!-- modal -->
    <form class=" p-3 bg-white shadow rounded-4" style="width: 450px; height: auto;" id="myfrm" action="">
        <div class=" w-100 d-flex justify-content-between align-align-items-center">
            <h3 class=" fs-4" id="title">Form Model</h3>
        <i id="close" style="cursor: pointer;" class="bi bi-x fs-3 "></i>
        </div>
        <div class="w-100">
            <label class=" form-label fs-5 fw-medium" for="">Name</label>
            <input type="text" id="name" name="name" placeholder="enter name" class=" form-control" >
        </div>

        <div class="w-100 mt-2">
            <label class=" form-label fs-5 fw-medium" for="">Gender</label>
            <div>
                <input id="gender" name="gender" value="M" class="form-check-input pe-3" type="radio">
                <label class=" pe-5" for="">Male</label>

                <input id="gender" name="gender" value="F" class="form-check-input pe-3" type="radio">
                <label for="">Female</label>
            </div>
        </div>

        <div class="w-100 mt-2">
            <label class=" form-label fs-5 fw-medium" for="">Email</label>
            <input type="email" id="email" name="email" placeholder="enter email" class=" form-control" >
        </div>

         <div class="w-100 mt-2">
            <label class=" form-label fs-5 fw-medium" for="">Salary</label>
            <input type="email" id="salary" name="salary" placeholder="enter salary($)" class=" form-control" >
        </div>

         <div class="w-100 mt-2">
            <label class=" form-label fs-5 fw-medium" for="">Profile</label>
            <input type="file" id="prf" name="prf" class=" form-control" >
            <img class=" mt-3 object-fit-cover rounded-2" style="width: 130px; height: 130px;" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
        </div>
        <button type="submit" id="save" class=" btn btn-primary w-100 mt-2">Save</button>
        <button type="reset" class=" btn btn-danger w-100 mt-2">Cancel</button>
    </form>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#add-emp").click(function(){
        $(".opactity").fadeIn(300)
        $("#myfrm").fadeIn(300)
        $("#title").text("Add Employee")
    })
    $("#close").click(function(){
       $(".opactity").fadeOut(300)
        $("#myfrm").fadeOut(300)
        $("#title").text(" ")
    })
</script>
