
<?php
include('./../../config/connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM mahasiswa 
        WHERE id=$id";
$query = mysqli_query($conn, $sql);

if($query){
    header('Location: ./read-student.php');
}

?>