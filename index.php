<?php
include "./db.php";
?>

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
            <tbody id="tbl">
                <?php
                $result = $conn->query("SELECT * FROM employee_tbl");
                while ($row = $result->fetch_assoc()): ?>
                    <tr class=" align-middle"
                        id="row-<?= $row['emp_id'] ?>"
                        data-id="<?= $row['emp_id'] ?>"
                        data-name="<?= $row['emp_name'] ?>"
                        data-gender="<?= $row['emp_gender'] ?>"
                        data-salary="<?= $row['emp_salary'] ?>"
                        data-email="<?= $row['emp_email'] ?>"
                        data-profile="<?= $row['emp_profile'] ?>">
                        <td><?= $row['emp_id'] ?></td>
                        <td>
                            <img class=" rounded-circle object-fit-cover" style="width: 55px; height: 55px;" src="uploads/<?= $row['emp_profile'] ?>" alt="">
                        </td>
                        <td><?= $row['emp_name'] ?></td>
                        <td><?= $row['emp_gender'] ?></td>
                        <td><?= $row['emp_salary'] ?>$</td>
                        <td><?= $row['emp_email'] ?></td>
                        <td>
                            <button id="edit" class=" btn btn-warning">edit</button>
                            <button id="delete" class=" btn btn-danger">delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class=" opactity"></div>
    <!-- modal -->
    <form enctype="multipart/form-data" class=" p-3 bg-white shadow rounded-4" style="width: 450px; height: auto;" id="myfrm" action="#">
        <div class=" w-100 d-flex justify-content-between align-align-items-center">
            <h3 class=" fs-4" id="title">Form Model</h3>
            <i id="close" style="cursor: pointer;" class="bi bi-x fs-3 "></i>
        </div>
        <input type="hidden" id="emp_id" name="emp_id">
        <input type="hidden" id="old_profile" name="old_profile">
        <div class="w-100">
            <label class=" form-label fs-5 fw-medium" for="">Name</label>
            <input type="text" id="name" name="name" placeholder="enter name" class=" form-control">
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
            <input type="email" id="email" name="email" placeholder="enter email" class=" form-control">
        </div>

        <div class="w-100 mt-2">
            <label class=" form-label fs-5 fw-medium" for="">Salary</label>
            <input type="number" id="salary" name="salary" placeholder="enter salary($)" class=" form-control">
        </div>

        <div class="w-100 mt-2">
            <label class=" form-label fs-5 fw-medium" for="">Profile</label>
            <input type="file" id="prf" name="prf" class=" form-control">
            <img id="preview" class=" mt-3 object-fit-cover rounded-2" style="width: 130px; height: 130px;" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
        </div>
        <button type="submit" id="save" class=" btn btn-primary w-100 mt-2">Save</button>
        <button type="reset" class=" btn btn-danger w-100 mt-2">Cancel</button>
    </form>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#add-emp").click(function() {
        $(".opactity").fadeIn(300)
        $("#myfrm").fadeIn(300)
        $("#title").text("Add Employee")
        $("#save").text("Add Employee");
    })
    $("#close").click(function() {
        $(".opactity").fadeOut(300)
        $("#myfrm").fadeOut(300)
        $("#title").text(" ")
        $("#myfrm")[0].reset()
        $("#preview").attr("src", "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png")
        $("#save").text(" ");
    })
    $("#prf").change(function(e) {
        const file = e.target.files[0]
        const readfile = new FileReader()
        readfile.onload = function() {
            $("#preview").attr("src", readfile.result)
        }
        readfile.readAsDataURL(file)
    })

    // insert data with ajax
    $("#myfrm").submit(function(e) {
        e.preventDefault()
        const formdata = new FormData(this)
        const id = $("#emp_id").val();
        const url = (id === "") ? 'insert.php' : 'update.php';
        $.ajax({
            url: url,
            method: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(res) {
                const item = JSON.parse(res)
                if (id === "") {
                    $("#tbl").append(`
                        <tr class=" align-middle"
                            id="row-${item.emp_id}"
                            data-id="${item.emp_id}"
                            data-name="${item.emp_name}"
                            data-gender="${item.emp_gender}"
                            data-salary="${item.emp_salary}"
                            data-email="${item.emp_email}"
                            data-profile="${item.emp_profile}">
                            <td >${item.emp_id}</td>
                            <td>
                                <img class=" rounded-circle object-fit-cover" style="width: 55px; height: 55px;" src="uploads/${item.emp_profile}" alt="">
                            </td>
                            <td >${item.emp_name}</td>
                            <td >${item.emp_gender}</td>
                            <td>${item.emp_salary}$</td>
                            <td>${item.emp_email}</td>
                            <td>
                                <button id="edit" class=" btn btn-warning">edit</button>
                                <button id="delete" class=" btn btn-danger">delete</button>
                            </td>
                        </tr>
                `)
                } else {
                    let tr = $("#row-" + item.emp_id);
                    tr.attr("data-name", item.emp_name)
                    tr.attr("data-profile", item.emp_profile)
                    tr.attr("data-gender", item.emp_gender)
                    tr.attr("data-salary", item.emp_salary)
                    tr.attr("data-email", item.emp_email);

                    tr.find("td:eq(1) img").attr("src", "uploads/" + item.emp_profile);
                    tr.find("td:eq(2)").text(item.emp_name)
                    tr.find("td:eq(3)").text(item.emp_gender)
                    tr.find("td:eq(4)").text(item.emp_salary+"$")
                    tr.find("td:eq(5)").text(item.emp_email)

                }

                $(".opactity").fadeOut(300)
                $("#myfrm").fadeOut(300)
                $("#title").text(" ")
                $("#myfrm")[0].reset()

            }

        })
    })
    $(document).on("click", "#edit", function() {
        let tr = $(this).closest("tr");
        let id = tr.attr("data-id");
        let name = tr.attr("data-name");
        let gender = tr.attr("data-gender");
        let salary = tr.attr("data-salary");
        let email = tr.attr("data-email");
        let profile = tr.attr("data-profile");

        $("#emp_id").val(id);
        $("#name").val(name);
        $("input[name='gender'][value='" + gender + "']").prop("checked", true);
        $("#salary").val(salary);
        $("#email").val(email);
        $("#old_profile").val(profile);
        $("#preview").attr("src", "uploads/" + profile);

        $(".opactity").fadeIn(300)
        $("#myfrm").fadeIn(300)
        $("#title").text("Edit Employee")
        $("#save").text("Update");

    })
</script>