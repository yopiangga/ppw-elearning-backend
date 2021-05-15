

<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {

    $sql = "SELECT * FROM class where id_lecturer=$idUser";
    $query = mysqli_query($conn, $sql);
}

if ($query) {
    $msg = "Read Success!";
    
    $length = mysqli_num_rows($query);

    for($i=0; $i < $length; $i++){
        $item = mysqli_fetch_array($query);
        $myClassId[$i] = $item['id'];
    }

    $j = 0;
    for($i=0; $i < $length; $i++){
        $sqlAssignment = "SELECT * FROM assignment where classId=$myClassId[$i]";
        $queryAssignment = mysqli_query($conn, $sqlAssignment);

        while($assignment = mysqli_fetch_array($queryAssignment)) {
            $data = array(
                'id' => $assignment['id'],
                'title' => $assignment['title'],
                'classId' => $assignment['classId'],
                'description' => $assignment['description'],
                'minRate' => $assignment['minRate'],
                'maxRate' => $assignment['maxRate'],
                'dueTime' => $assignment['dueTime'],
                'dueDate' => $assignment['dueDate']
            );
    
            $allData[$j] = $data;
            $j++;
        }

    }

} else {
    $msg = "Read Failed!";
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $allData  
);  

echo json_encode($response);


?>
