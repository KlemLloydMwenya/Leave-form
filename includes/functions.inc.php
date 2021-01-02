<?php

function emptyInputFields($name, $position, $manNumber, $department, $s_date, $e_date, $leaveType, $days_requested, $text)
{
    $result = false;
    if (empty($name) || empty($position) || empty($manNumber) || empty($department) || empty($s_date) || empty($e_date) || empty($leaveType) || empty($days_requested) || empty($text)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidName($name)
{
    $result = false;
    if (!preg_match(("/^[a-zA-Z0-9 ]*$/"), $name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidPosition($position)
{
    $result = false;
    if (!preg_match(("/^[a-zA-Z0-9 ]*$/"), $position)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidEmployeeId($manNumber)
{
    $result = false;
    if (!preg_match(("/^[A-Z0-9]*$/"), $manNumber)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidDepartment($department)
{
    $result = false;
    if (!preg_match(("/^[a-zA-Z]*$/"), $department)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uploadFile($fileTmpName, $path)
{
    move_uploaded_file($fileTmpName, $path);

    return $path;
} //end uploadFiles() 

function submitLeaveForm($conn, $name, $position, $manNumber, $department, $s_date, $e_date, $leaveType, $days_requested, $days_commuted, $medicalFile, $text)
{

    $sql = "INSERT INTO leave_applications (name, position, employee_number, department, start_date, end_date, leave_type, days_requested, days_commuted, medical_certificate_path, leave_reason) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssiss", $name, $position, $manNumber, $department, $s_date, $e_date, $leaveType, $days_requested, $days_commuted, $medicalFile, $text);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none=DataSubmissionSuccess");
    exit();
}
