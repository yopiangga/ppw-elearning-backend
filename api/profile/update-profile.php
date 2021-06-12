

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;
$status = $data->status;
$query = 0;

$email = $data->user->email;
$telp = $data->user->telp;
$password = $data->user->password1;
$fullName = $data->user->fullName;
$nickName = $data->user->nickName;
$university = $data->user->university;
$fields = $data->user->fields;
$placeBirth = $data->user->placeBirth;
$dateBirth = $data->user->dateBirth;
$gender = $data->user->gender;
$zipCode = $data->user->zipCode;
$address = $data->user->address;

if ($idUser != null && $status != null) {
    
    if($status == 2){
        $sql = "UPDATE lecturer SET
        password='$password', telp='$telp', fullName='$fullName', nickName='$nickName', university='$university', 
        fields='$fields', placeBirth='$placeBirth', dateBirth='$dateBirth', gender='$gender', zipCode='$zipCode', address='$address'
        WHERE id = '$idUser'";
    } else if($status == 3){
        $sql = "UPDATE mahasiswa SET
        password='$password', telp='$telp', fullName='$fullName', nickName='$nickName', university='$university', 
        fields='$fields', placeBirth='$placeBirth', dateBirth='$dateBirth', gender='$gender', zipCode='$zipCode', address='$address'
        WHERE id = '$idUser'";
    }

    $query = mysqli_query($conn, $sql);
}

if($query){
    $msg = "Update Success!";
} else {
    $msg = "Update Failed!";
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
);  

echo json_encode($response);


?>
