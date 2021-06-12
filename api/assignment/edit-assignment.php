

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$title = $data->title;
$classId = $data->classId;
$description = $data->description;
$minRate = $data->minRate;
$maxRate = $data->maxRate;
$dueTime = $data->dueTime;
$dueDate = $data->dueDate;

if ($title != null && $classId != null && $minRate != null && $maxRate != null && $dueDate != null && $dueTime != null) {

    $sql = "UPDATE assignment 
    SET title='$title', classId='$classId', description='$description', minRate='$minRate', maxRate='$maxRate', dueTime='$dueTime', dueDate='$dueDate' 
    WHERE id=$id
    ";

    $query = mysqli_query($conn, $sql);
}

if ($query) {
    $msg = "Success!";
} else {
    $msg = "Failed!";
}


$response = array(
    'status' => "OK",
    'msg' => $msg
);

echo json_encode($response);


?>
