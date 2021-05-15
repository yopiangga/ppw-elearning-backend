

<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;
$status = $data->status;

if ($idUser != null && $status != null) {

    if($status == 2){
        $sql = "SELECT * FROM lecturer where id=$idUser";
        $query = mysqli_query($conn, $sql);
    } else if($status == 3){
        $sql = "SELECT * FROM student where id=$idUser";
        $query = mysqli_query($conn, $sql);
    }
}

$cek = mysqli_num_rows($query);

if($cek > 0){
    $msg = "Read Profile Success!";
    $user = mysqli_fetch_assoc($query);
    $item[] = array(
        'id' => $user['id'],
        'email' => $user['email'],
        'telp' => $user['telp'],
        'fullName' => $user['fullName'],
        'nickName' => $user['nickName'],
        'university' => $user['university'],
        'gender' => $user['gender'],
        'zipCode' => $user['zipCode'],
        'address' => $user['address']
    );
} else {
    $msg = "Read Profile Failed!";
    $item = "";
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $item
);

echo json_encode($response);


?>
