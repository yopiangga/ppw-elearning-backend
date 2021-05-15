

<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$title = $data->title;
$classId = $data->classId;
$description = $data->description;
$minRate = $data->minRate;
$maxRate = $data->maxRate;
$dueTime = $data->dueTime;
$dueDate = $data->dueDate;

if ($title != null && $classId != null && $minRate != null && $maxRate != null && $dueDate != null && $dueTime != null) {

    $sql = "INSERT INTO assignment (title, classId, description, minRate, maxRate, dueTime, dueDate) VALUE ('$title', '$classId', '$description', '$minRate', '$maxRate', '$dueTime', '$dueDate');";

    $query = mysqli_query($conn, $sql);
}

if ($query) {
    $msg = "Create Assignment Success!";
} else {
    $msg = "Create Assignment Failed!";
}


$response = array(
    'status' => "OK",
    'msg' => $msg
);

echo json_encode($response);


?>
