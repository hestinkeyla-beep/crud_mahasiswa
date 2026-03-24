<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $matakuliah = $_POST['matakuliah'];
    
    $query = "UPDATE mahasiswa SET 
              nim='$nim', 
              nama='$nama', 
              kelas='$kelas', 
              matakuliah='$matakuliah' 
              WHERE id=$id";
    
    if(mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <style>
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 100px; }
        input { padding: 5px; width: 250px; }
        button { background-color: #ff9800; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" value="<?php echo $data['nim']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" required>
        </div>
        <div class="form-group">
            <label>Matakuliah</label>
            <input type="text" name="matakuliah" value="<?php echo $data['matakuliah']; ?>" required>
        </div>
        <button type="submit" name="update">Update</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>