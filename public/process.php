<?php
    $conn = pg_connect("dbname=Test_Company user=postgres password=133722819");

    $result = array('error'=>false);
    $action = '';

    if (isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action == 'read'){
        $sql = pg_query($conn,"SELECT * FROM public.employees");
        $employees = array();
        while ($row = pg_fetch_assoc($sql)){
            array_push($employees, $row);
        }
        $result['employees'] = $employees;
    }

    if($action == 'create'){
        $name = $_POST['name'];
        $dob= $_POST['dob'];
        $position= $_POST['position'];

        $sql = pg_query($conn,"INSERT INTO public.employees (name, dob, position) VALUES ('$name', '$dob', '$position')");
        $employees = array();
        while ($row = pg_fetch_assoc($sql)){
            array_push($employees, $row);
        }
        $result['employees'] = $employees;

        if($sql){
            $result['message'] = "Сотрудник успешно добавлен";
        }else{
            $result['error'] = true;
            $result['message'] ='Ошибка добавления сотрудника';
        }
    }

    if($action == 'update'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $dob= $_POST['dob'];
        $position= $_POST['position'];

        $sql = pg_query($conn,"UPDATE public.employees SET name = '$name', dob = '$dob', position = '$position' WHERE id = '$id'");
        $employees = array();
        while ($row = pg_fetch_assoc($sql)){
            array_push($employees, $row);
        }
        $result['employees'] = $employees;

        if($sql){
            $result['message'] = "Сотрудник успешно обновлен";
        }else{
            $result['error'] = true;
            $result['message'] ='Ошибка обновления сотрудника';
        }
    }

    if($action == 'delete'){
        $id = $_POST['id'];

        $sql = pg_query($conn,"DELETE FROM public.employees WHERE id = '$id'");
        $employees= array();
        while ($row = pg_fetch_assoc($sql)){
            array_push($employees, $row);
        }
        $result['employees'] = $employees;

        if($sql){
            $result['message'] = "Сотрудник успешно удален";
        }else{
            $result['error'] = true;
            $result['message'] ='Ошибка удаления сотрудника';
        }
    }
    
    pg_close($conn);
    echo json_encode($result);


?>