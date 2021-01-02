<?php

if (isset($_POST['submit'])) {

    $name = $_POST["name"];
    $position = $_POST["position"];
    $manNumber = $_POST["employee_number"];
    $department = $_POST["department"];
    $s_date = $_POST["start_date"];
    $e_date = $_POST["end_date"];
    $leaveType = $_POST["selected_leave_type"];
    $days_requested = $_POST["days"];
    $days_commuted = $_POST["commutation"];

    $medicalFile = $_FILES["medical"]; // Medical File Data

    $text = $_POST["text"];

    require_once 'db_conn.php';    // Create a db connection     
    require_once 'functions.inc.php';


    if (emptyInputFields($name, $position, $manNumber, $department, $s_date, $e_date, $leaveType, $days_requested, $text) !== false) {

        header("location: ../index.php?error=emptyInput&name=$name&position=$position&employee_number=$manNumber&department=$department&selected_leave_type=$leaveType&commutation=$days_commuted");

        // header("location: ../index.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../index.php?error=invalidName&position=$position&employee_number=$manNumber&department=$department&selected_leave_type=$leaveType&commutation=$days_commuted");
        exit();
    }

    if (invalidPosition($position) !== false) {
        header("location: ../index.php?error=invalidPosition&name=$name&employee_number=$manNumber&department=$department&selected_leave_type=$leaveType&commutation=$days_commuted");
        exit();
    }

    if (invalidEmployeeId($manNumber) !== false) {
        header("location: ../index.php?error=invalidManNumber&name=$name&position=$position&department=$department&selected_leave_type=$leaveType&commutation=$days_commuted");
        exit();
    }

    if (invalidDepartment($department) !== false) {
        header("location: ../index.php?error=invalidDepartment&name=$name&position=$position&employee_number=$manNumber&selected_leave_type=$leaveType&commutation=$days_commuted");
        exit();
    }

    if (empty($days_commuted)) {
        $days_commuted = 0;
    }

    if (empty($medicalFile)) {
        $medicalFile = "none";
    } else {
        $fileName = $_FILES['medical']['name'];
        $fileTmpName = $_FILES['medical']['tmp_name'];
        $fileSize = $_FILES['medical']['size'];
        $fileError = $_FILES['medical']['error'];
        $fileType = $_FILES['medical']['type'];

        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));

        $allowedExtensions = array('pdf', 'jpg', 'jpeg', 'png', 'gif', 'tiff', 'tif', 'bmp', 'eps', 'raw', 'cr2', 'nef', 'orf', 'sr2');

        if (!in_array($fileActualExtension, $allowedExtensions)) {
            header("location: ../index.php?error=invalidMedicalFileExtension&name=$name&position=$position&employee_number=$manNumber&department=$department&selected_leave_type=$leaveType&commutation=$days_commuted");
            exit();
        } else {
            if ($fileSize < 1500000) { // This block restricts size for file
                if ($fileError === 0) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
                    $finalDestination1 = "../medical_files/img_medical/" . $fileNameNew;
                    $finalDestination2 = "../medical_files/pdf/" . $fileNameNew;
                    if ($fileActualExtension != 'pdf') {
                        uploadFile($fileTmpName, $finalDestination1);
                        $medicalFile = uploadFile($fileTmpName, $finalDestination1);
                    } else {
                        uploadFile($fileTmpName, $finalDestination2);
                        $medicalFile = uploadFile($fileTmpName, $finalDestination2);
                    }
                } else {
                    header("location: ../index.php?error=fileUploadError&name=$name&position=$position&employee_number=$manNumber&department=$department&selected_leave_type=$leaveType&commutation=$days_commuted");
                    exit();
                }
            } else {
                header("location: ../index.php?error=fileSizeTooLarge&name=$name&position=$position&employee_number=$manNumber&department=$department&selected_leave_type=$leaveType&commutation=$days_commuted");
                exit();
            }
        }
    }

    submitLeaveForm($conn, $name, $position, $manNumber, $department, $s_date, $e_date, $leaveType, $days_requested, $days_commuted, $medicalFile, $text);
} else {
    header("location: ../index.php?error=illegalOperation!!:-FileAccessDenied");
    exit();
}
