<?php
include 'Latihan_09_config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM alumni WHERE id=$id";
    if($conn->query($sql)===TRUE){
        echo "Data Berhasil Dihapus!";
        header("Location: Latihan_09_index.php?menu=alumni");
    }else{
        echo "Error Deleting Record:".$conn->error;
    }
    $conn->close();
}
?>