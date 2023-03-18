<?php //pertama kita membuat untuk melakukan koneksinya
$host = "localhost";
$user = "root";
$pass = ""; //karena kita menggunakan xampp biasanya pass kosong
$db   = "tiket_konser";

$koneksi = mysqli_connect($host, $user, $pass, $db); //untuk koneksi kita menggunakan fungsi dari mysql. lalu kita masukan parameter untuk melakukan koneksi ke database
if (!$koneksi) { //cek koneksi
    die("Gagal Koneksi");
}
$nama           = "";
$tanggal_lahir  = "";
$jenis_tiket    = "";
$harga_tiket    = "";
$jumlah_tiket   = "";
$total_harga    = "";
$sukses         = "";
$error          = "";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Konser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 1000px
        }

        .card {
            margin-top: 10px
        }
    </style>
</head>

<body>

    <!--untuk mengeluarkan data-->
    <div class="card">
        <h3> BLACKPINK TICKET</h3>
        <div class="card-header text-white bg-black">
       
        </div>
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">jenis Tiket</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Jumlah Tiket</th>
                        <th scope="col">Total Harga</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2   = "select * from tiket order by id desc";
                    $q2     = mysqli_query($koneksi, $sql2);
                    $urut   = 1;
                    while ($data = mysqli_fetch_array($q2)) {
                        $id             = $data['id'];
                        $nama           = $data['nama'];
                        $tanggal_lahir  = $data['tanggal_lahir'];
                        $jenis_tiket    = $data['jenis_tiket'];
                        $harga_tiket    = $data['harga_tiket'];
                        $jumlah_tiket   = $data['jumlah_tiket'];
                        $total_harga    = $data['total_harga'];

                    ?>
                        <tr>
                            
                            <td scope="row"><?php echo $nama ?></td>
                            <td scope="row"><?php echo $tanggal_lahir ?></td>
                            <td scope="row"><?php echo $jenis_tiket ?></td>
                            <td scope="row"><?php echo $harga_tiket ?></td>
                            <td scope="row"><?php echo $jumlah_tiket ?></td>
                            <td scope="row"><?php echo $total_harga ?></td>

                        </tr>
                    <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            window.print();
        </script>
    </div>
    </div>