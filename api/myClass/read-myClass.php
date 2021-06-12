

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {

    $sql = "SELECT * FROM enrollClass WHERE idStudent=$idUser;";
    $query = mysqli_query($conn, $sql);

    $length = mysqli_num_rows($query);

    for($i=0; $i < $length; $i++){
        $item = mysqli_fetch_array($query);
        $myClassId[$i] = $item['idClass'];
    }

    $j = 0;
    for($i=0; $i < $length; $i++){
        $sqlClass = "SELECT c.id, c.code, c.name, l.email 
        FROM class c, lecturer l 
        WHERE c.id=$myClassId[$i] 
        AND l.id = c.id_lecturer;";
        $queryClass = mysqli_query($conn, $sqlClass);
        
        while($itemClass = mysqli_fetch_array($queryClass)){
            $dataClass[$j] = array(
                'id' => $itemClass['id'],
                'code' => $itemClass['code'],
                'name' => $itemClass['name'],
                'nameLecturer' => $itemClass['email']
            );
            $j++;
        } 
    }

}

if ($query) {
    $msg = "Class Available!";
} else {
    $msg = "Class Not Avalilable!";
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $dataClass
);

echo json_encode($response);


?>
