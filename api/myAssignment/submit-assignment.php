

<?php 

include("./../../config/connection.php");
include("./../../config/cors.php");
include("./../../config/baseurl.php");

$idUser = $_POST["idUser"];
$idAss = $_POST["idAss"];
$title = $_POST["title"];
$className = $_POST["className"];
$description = $_POST["description"];
$minRate = $_POST["minRate"];
$maxRate = $_POST["maxRate"];
$dueTime = $_POST["dueTime"];
$dueDate = $_POST["dueDate"];
$createAt = time();
$updateAt = 0;

$folder = "./../../file/collectAssignment/";
$imgN = $_FILES["image"]["name"];
$imgName = $createAt . '_' . $imgN;
$imgTmp = $_FILES["image"]["tmp_name"];
$imgType = $_FILES["image"]["type"];
$imgSize = $_FILES["image"]["size"];

if($imgName != null && $idAss != null && $idUser != null){
    $sqlCollect = "INSERT INTO collectassignment (idAssignment, createAt, updateAt, idStudent) VALUE ('$idAss', '$createAt', '$updateAt', '$idUser');";
    $queryCollect = mysqli_query($conn, $sqlCollect);

    if($queryCollect){
        $sqlSelectCollect = "SELECT id 
                            FROM collectassignment 
                            WHERE idAssignment=$idAss 
                            AND idStudent=$idUser";
        $querySelectCollect = mysqli_query($conn, $sqlSelectCollect);
        $idCollectAss = mysqli_fetch_array($querySelectCollect);
        $idCollectAssId = $idCollectAss['id'];

        $sqlFile = "INSERT INTO fileassignment (name, size, type, path, idCollectAssignment) VALUE ('$imgName', '$imgSize', '$imgType', '$folder', '$idCollectAssId');";
        $queryFile = mysqli_query($conn, $sqlFile);

        if($sqlFile){
            move_uploaded_file($imgTmp, $folder.$imgName);
            $msg = "Upload Success!";
        } else {
            $msg = "Upload Failed!";
        }
    }
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
);

echo json_encode($response);

?>