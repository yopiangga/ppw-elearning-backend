

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {
        $sqlAssignment = "SELECT a.id, a.title, a.classId, a.description, a.minRate, a.maxRate, a.dueTime, a.dueDate, c.name
        FROM assignment a, class c, lecturer l
        WHERE a.classId=c.id
        AND c.id_lecturer = l.id";

        $queryAssignment = mysqli_query($conn, $sqlAssignment);
        $j=0;
        while($assignment = mysqli_fetch_array($queryAssignment)) {
            $data = array(
                'id' => $assignment['id'],
                'title' => $assignment['title'],
                'classId' => $assignment['classId'],
                'description' => $assignment['description'],
                'minRate' => $assignment['minRate'],
                'maxRate' => $assignment['maxRate'],
                'dueTime' => $assignment['dueTime'],
                'dueDate' => $assignment['dueDate'],
                'className' => $assignment['name']
            );
    
            $allData[$j] = $data;
            $j++;
        }
        $msg = "Success";

} else {
    $msg = "Failed";
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $allData  
);  

echo json_encode($response);


?>
