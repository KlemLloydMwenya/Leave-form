<?php
/*
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($fullUrl, "error=illegalOperation!!:-FileAccessDenied") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont' >The system detects an illegal operation in the url!</p>";
    echo "<p class='error bigFont'>Access denied!</p>";
    exit();
} elseif (strpos($fullUrl, "error=emptyInput") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont'>You left some input fields empty!</p>";
    exit();
} elseif (strpos($fullUrl, "error=invalidName") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont'>You entered an invalid Name!</p>";
    exit();
} elseif (strpos($fullUrl, "error=invalidPosition") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont'>You entered an invalid Job Title!</p>";
    exit();
} elseif (strpos($fullUrl, "error=invalidManNumber") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont'>You entered an invalid Man Number!</p>";
    exit();
} elseif (strpos($fullUrl, "error=invalidDepartment") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont'>The department you entered is invalid!</p>";
    exit();
} elseif (strpos($fullUrl, "error=invalidMedicalFileExtension") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont'>The document you submitted is not allowed</p>";
    exit();
} elseif (strpos($fullUrl, "error=fileSizeTooLarge") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont'>The file you attempted to attach is too large.</p>";
    echo "<p class='error bigFont'>Compress the file and try again!</p>";
    exit();
} elseif (strpos($fullUrl, "error=fileUploadError") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>See error just below the form!</p></div>";
    echo "<p class='error smallerFont'>There was an error whilst uploading the file.</p>";
    echo "<p class='error smallerFont'>It might have been poor internet connection</p>";
    echo "<p class='error bigFont'>Try again!</p>";
    exit();
} elseif (strpos($fullUrl, "error=none=DataSubmissionSuccess") == true) {
    echo "<div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p>Confirm form submission below!</p></div>";
    echo "<p class='success bigFont'>Leave form successfully submitted.</p>";
}
*/

if (!isset($_GET['error'])) {
    exit();
} else {
    $errorCheck = $_GET['error'];

    if ($errorCheck == 'illegalOperation!!:-FileAccessDenied') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center' >The system detects an illegal operation in the url!</p>
        <p class='error bigFont center'>Access denied!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'emptyInput') {
        echo "
        <div id='errorMessage'><div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center'>You left some input fields empty!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'invalidName') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center'>You entered an invalid Name!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'invalidPosition') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center'>You entered an invalid Job Title!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'invalidManNumber') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center'>You entered an invalid Man Number!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'invalidDepartment') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center'>The department you entered is invalid!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'invalidMedicalFileExtension') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center'>The document you submitted is not allowed</p>
        <p class='warning smallerFont center'>Make sure also that all fields are NOT empty!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'fileSizeTooLarge') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center'>The file you attempted to attach is too large.</p>
        <p class='error bigFont center'>Compress the file and try again!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'fileUploadError') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>See error just below the form!</p></div>
        <p class='error smallerFont center'>There was an error whilst uploading the file.</p>
        <p class='error smallerFont center'>It might have been poor internet connection...</p>
        <p class='error bigFont center'>Try again!</p>
        </div>";
        exit();
    } elseif ($errorCheck == 'none=DataSubmissionSuccess') {
        echo "
        <div id='errorMessage'>
        <div class='notifyMessage smallerFont'><img src='img/warningTriangle.png'/><p class='center'>Confirm form submission below!</p></div>
        <p class='success bigFont center'>Leave form successfully submitted.</p>
        </div>";
        exit();
    }
}
