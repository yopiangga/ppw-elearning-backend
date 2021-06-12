<?php
include('./../../config/connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM lecturer 
        WHERE id=$id";
$query = mysqli_query($conn, $sql);

if($query){
    header('Location: ./read-lecturer.php');
}

?>