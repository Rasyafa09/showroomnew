<?php
    include 'db.php';

    $delete = mysqli_query($conn, "DELETE FROM tb_kawasaki WHERE id_gambar ='" .$_GET['id']."'");
    if($delete){
        header('location:data.php');
    }else{
        echo 'Gagal Hapus';
    }
?>