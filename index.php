<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        .btn-tambah, .btn-edit, .btn-hapus { 
            padding: 5px 10px; 
            text-decoration: none; 
            display: inline-block;
            margin: 2px;
        }
        .btn-tambah { background-color: #4CAF50; color: white; margin-bottom: 10px; }
        .btn-edit { background-color: #ff9800; color: white; }
        .btn-hapus { background-color: #f44336; color: white; }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <a href="tambah.php" class="btn-tambah">Tambah Data</a>
    
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Matakuliah</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = "SELECT * FROM mahasiswa ORDER BY id DESC";
        $result = mysqli_query($koneksi, $query);
        
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['nim']."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['kelas']."</td>";
            echo "<td>".$row['matakuliah']."</td>";
            echo "<td>
                    <a href='edit.php?id=".$row['id']."' class='btn-edit'>Edit</a>
                    <a href='hapus.php?id=".$row['id']."' class='btn-hapus' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>