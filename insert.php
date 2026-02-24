<?php
    include "./db.php";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $salary = $_POST['salary'];
    $email = $_POST['email'];

    $profile = " ";
    if(!empty($_FILES['prf']['name'])){
        $profile = time()."_".$_FILES['prf']['name'];
        move_uploaded_file($_FILES['prf']['tmp_name'], "uploads/".$profile);
    }

    $sql = "INSERT INTO employee_tbl (emp_name, emp_gender, emp_email, emp_salary, emp_profile) VALUES ('$name', '$gender', '$email', '$salary', '$profile')";

    if($conn->query($sql)){
        $id = $conn->insert_id;
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