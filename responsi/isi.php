<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "responsi";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    //simpan
    if(isset($_POST['btsimpan']))
    {
        //edit
        if($_GET['hal']=="edit")
        {
            //edit
            $edit = mysqli_query($koneksi, "UPDATE matkul set kode = '$_POST[kode]', nama = '$_POST[matkul]', jml = '$_POST[jmlsks]', smt = '$_POST[tsmt]', syarat = '$_POST[syarat]' WHERE kode = '$_GET[id]'");
            if($edit)
            {
                echo "<script> alert('edit data Sukses'); document.location='isi.php';</script>";
            }
            else
            {
                echo "<script> alert('edit data Gagal'); document.location='isi.php';</script>";
            }
        }else
        {
            $simpan = mysqli_query($koneksi, "INSERT INTO matkul (kode, nama, jml, smt, syarat) VALUES ('$_POST[kode]', '$_POST[matkul]', '$_POST[jmlsks]', '$_POST[tsmt]', '$_POST[syarat]')");
            if($simpan)
            {
                echo "<script> alert('Simpan data Sukses'); document.location='isi.php';</script>";
            }
            else
            {
                echo "<script> alert('Simpan data Gagal'); document.location='isi.php';</script>";
            }
        }
        
    }


    //edit
    if(isset($_GET['hal']))
    {
        if($_GET['hal'] == 'edit')
        {
            $tampil = mysqli_query($koneksi, "SELECT * FROM matkul WHERE kode = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                $kodes = $data['kode'];
                $matkuls = $data['nama'];
                $jmlskss = $data['jml'];
                $smts = $data['smt'];
                $syarats = $data['syarat'];
            }
        }
        else if ($_GET['hal'] == "hapus")
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM matkul WHERE kode = '$_GET[id]' ");
            if($hapus){
                echo "<script> alert('Hapus data Sukses'); document.location='isi.php';</script>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS PBW</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="animated.css">
    <style>
        body{
            background-image: url("fixisi2.jpg");
            background-size : cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="animated">
        <a href="isi.php"><h1>Daftar Mata Kuliah</h1></a>
        </div>
        <!-- form -->
        <div class="card mt-3">
      <div class="card-header bg-dark text-white">
        Form Menambah Mata Kuliah
      </div>
      <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>Kode Matkul</label>
                <input type="text" name="kode" value="<?=@$kodes?>" class="form-control" placeholder="Masukkan Kode Mata Kuliah" required>
            </div>
            <div class="form-group">
                <label>Nama Matkul</label>
                <input type="text" name="matkul" value="<?=@$matkuls?>" class="form-control" placeholder="Masukkan Nama Mata Kuliah" required>
            </div>
            <div class="form-group">
                <label>Jumlah SKS</label>
                <input type="text" name="jmlsks" value="<?=@$jmlskss?>" class="form-control" placeholder="Masukkan Jumlah SKS" required>
            </div>
            <div class="form-group">
                <label>Semester</label>
                <select name="tsmt"" class="form-control">
                    <option value="<?=@$smts?>"><?=@$smts?></option>
                    <option value="genap">Genap</option>
                    <option value="ganjil">Ganjil</option>
                </select>
            </div>
            <div class="form-group">
                <label>Syarat</label>
                <input type="text" name="syarat" value="<?=@$syarats?>" class="form-control" placeholder="Syarat Mengambil Mata Kuliah" required>
            </div>

            <button type="submit" class="btn btn-success" name="btsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger" name="btreset">Reset</button>
        </form>
      </div>
    </div>
    <!-- tabel-->
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Daftar Mata Kuliah
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th> SKS</th>
                    <th>Semester</th>
                    <th>Syarat</th>
                    <th>Aksi</th>
                </tr>

                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * from matkul order by kode desc");
                    while($data = mysqli_fetch_array($tampil)) :

                ?>
                <tr>
                        <td><?=$no++;?></td>
                        <td><?=$data['kode']?></td>
                        <td><?=$data['nama']?></td>
                        <td><?=$data['jml']?></td>
                        <td><?=$data['smt']?></td>
                        <td><?=$data['syarat']?></td>
                        <td>
                            <a href="isi.php?hal=edit&id=<?=$data['kode']?>" class="btn btn-warning"> Edit </a>
                            <a href="isi.php?hal=hapus&id=<?=$data['kode']?>" onclick="return confirm('Apakah ingin menghapus data ?')" class="btn btn-danger"> Hapus </a>
                        </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    
</div>
</body>
</html>