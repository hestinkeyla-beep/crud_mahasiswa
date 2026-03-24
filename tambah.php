<?php
include 'koneksi.php';

if(isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $matakuliah = $_POST['matakuliah'];
    
    $query = "INSERT INTO mahasiswa (nim, nama, kelas, matakuliah) 
              VALUES ('$nim', '$nama', '$kelas', '$matakuliah')";
    
    if(mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <style>
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 100px; }
        input { padding: 5px; width: 250px; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form method="POST">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <input type="text" name="kelas" required>
        </div>
        <div class="form-group">
            <label>Matakuliah</label>
            <input type="text" name="matakuliah" required>
        </div>
        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>