<?php
// <form enctype="multipart/form-data">
// 	<input type="file" name="file[]" multiple accept="image/*">
// </form>








//calling function
uploadFiles($_FILES, "images/yourFolder", $conn);








//insert function
//upload new files
function uploadFiles($file, $path, $conn)
{

    $filesArr = $file["file"];
    $fileNames = array_filter($filesArr['name']);

    if (!empty($fileNames)) {

        foreach ($filesArr['name'] as $key => $val) {
            $fileName = basename($filesArr['name'][$key]);
            $tmp_name = $filesArr['tmp_name'][$key];

            //get file extension
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            //get new complete file path
            $destination_url = $path . '/' . "." . md5(md5(time() . 'qwerty' . rand(0, 9999))) . "." . $fileExtension;

            //compress and move file to new directory
            if (compress_image($tmp_name, $destination_url, 75)) {
                $sql = "INSERT INTO yourTable (path) VALUES ('" . $destination_url . "')";
                if (mysqli_query($conn, $sql)) { //same path in db
                    echo "Successful";
                }
            } else {
                echo 'File Could Not Be Uploaded. Please Try Again.';
            }
        } //end foreach()
    } else {
        echo 'File Could Not Be Uploaded. Please Try Again.';
    }
} //end uploadFiles()








//compress & move files
function compress_image($source_url, $destination_url, $quality)
{
    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source_url);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source_url);

    return imagejpeg($image, $destination_url, $quality);
}//end compress_image