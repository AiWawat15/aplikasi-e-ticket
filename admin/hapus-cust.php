<?php

    $id = $_GET['id'];
    
    include 'koneksi.php';
    $sql = "DELETE FROM tiket WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("Location:cust.php");
    }else{
        echo"<script>alert('Maaf data tidak Terhapus'); window.locatin.assign(petugas.php);</script>";
        die(mysqli_error($koneksi));
    }

?>