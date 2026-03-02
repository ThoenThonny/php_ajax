<?php
    include './db.php';
    $id = $_POST['emp_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $salary = $_POST['salary'];
    $email = $_POST['email'];
    $old_profile = $_POST['old_profile'];

    $profile = $old_profile;

    if(!empty($_FILES['prf']['name'])){
        if(file_exists('/uploads'.$old_profile)){
            unlink('/uploads'.$old_profile);
        }
        $profile = time()."_".$_FILES['prf']['name'];
        move_uploaded_file($_FILES['prf']['tmp_name'], "uploads/".$profile);
    }

    $sql = "UPDATE employee_tbl SET 
    emp_name='$name',
    emp_gender='$gender',
    emp_email='$email',
    emp_salary=$salary,
    emp_profile='$profile' 
    WHERE emp_id=$id ";

    if($conn->query($sql)){
        echo json_encode([
            'emp_id' => $id,
            'emp_name' => $name,
            'emp_gender' => $gender,
            'emp_email' => $email,
            'emp_salary' => $salary,
            'emp_profile' => $profile
        ]);
    }else{
        echo json_encode(['error' => $conn->error]);
    }

?>