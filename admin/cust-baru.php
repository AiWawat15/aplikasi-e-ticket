<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php 
    $host = "localhost";
    $user = "root";
    $pass = ""; 
    $db   = "tiket_konser";

    $koneksi = mysqli_connect($host, $user, $pass, $db); 
    if (!$koneksi) { 
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

    if (isset($_POST['simpan'])) { //untuk create
        $nama           = $_POST['nama'];
        $tanggal_lahir  = $_POST['tanggal_lahir'];
        $jenis_tiket    = $_POST['jenis_tiket'];
        $harga_tiket    = $_POST['harga_tiket'];
        $jumlah_tiket   = $_POST['jumlah_tiket'];
        $total_harga    = $_POST['total_harga'];

       
                $sql1 = "insert into tiket(nama,tanggal_lahir,jenis_tiket,harga_tiket,jumlah_tiket,total_harga) values('$nama','$tanggal_lahir','$jenis_tiket','$harga_tiket','$jumlah_tiket','$total_harga')";
                $q1 = mysqli_query($koneksi, $sql1);
                if ($q1) {
                    $sukses = "Berhasil memasukkan data baru";
                    header("Location:cust.php");
                } else {

                    $error = "Gagal memasukkan data";
                }
            }
        
    

    ?>
    <!-- Newsletter Start -->
    <section id="order">
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">Order <span class="text-primary text-uppercase">Here</span></h4>
                            <div class="position-relative mx-auto">
                                <form action="" method="POST">
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control w-100 py-3 ps-4 pe-5" id="nama" name="nama" value="<?php echo $nama ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jenis_tiket" class="col-sm-2 col-form-label">Jenis Tiket</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="jenis_tiket" id="jenis_tiket">
                                                <option value="">- Pilih Jenis Tiket -</option>
                                                <option value="VIP" <?php if ($jenis_tiket == "VIP") echo "selected" ?>>VIP</option>
                                                <option value="Platinum" <?php if ($jenis_tiket == "Platinum") echo "selected" ?>>Platinum</option>
                                                <option value="CAT 1" <?php if ($jenis_tiket == "CAT 1") echo "selected" ?>>CAT 1</option>
                                                <option value="CAT 2" <?php if ($jenis_tiket == "CAT 2") echo "selected" ?>>CAT 2</option>
                                                <option value="CAT 3" <?php if ($jenis_tiket == "CAT 3") echo "selected" ?>>CAT 3</option>
                                                <option value="CAT 4" <?php if ($jenis_tiket == "CAT 4") echo "selected" ?>>CAT 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="harga_tiket" class="col-sm-2 col-form-label">Harga Tiket</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="harga_tiket" name="harga_tiket" value="<?php echo $harga_tiket ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jumlah_tiket" class="col-sm-2 col-form-label">Jumlah Tiket</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="<?php echo $jumlah_tiket ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control w-100 py-3 ps-4 pe-5" id="total_harga" name="total_harga" value="<?php echo $total_harga ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                                        <a href="cust.php" class="btn btn-primary" >Kembali</a> 
                                    </div>
                                    <br>
                                   
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</body>
</html>