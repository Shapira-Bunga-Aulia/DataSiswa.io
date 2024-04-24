<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="data.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .input-group {
            margin-bottom: 10px;
        }
        .input-group label {
            display: inline-block;
            width: 100px; /* Sesuaikan lebar sesuai kebutuhan */
            text-align: right;
            margin-right: 10px;
        }
        .input-group input {
            width: 200px; /* Sesuaikan lebar sesuai kebutuhan */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tampilan">
            <h1 class="judul">Masukan Data Siswa</h1>
            <form action="" method="post">
                <div class="input-group">
                    <label for="nama">NAMA :</label>
                    <input type="text" id="nama" name="nama" class="text">
                </div>
                <div class="input-group">
                    <label for="nis">NIS :</label>
                    <input type="number" id="nis" name="nis" class="text">
                </div>
                <div class="input-group">
                    <label for="rombel">ROMBEL :</label>
                    <input type="text" id="rombel" name="rombel" class="text">
                </div>
                <div class="input-group">
                    <label for="rayon">RAYON :</label>
                    <input type="text" id="rayon" name="rayon" class="text">
                </div>
                <button type="submit" name="kirim" value="kirim" class="tombol1"><i class="fa-solid fa-plus"></i> TAMBAH</button>
                <button type="submit" name="kirim" value="cetak" class="tombol2"><a href="index2.php"><i class="fa-solid fa-print"></i> CETAK</a></button>
                <button type="submit" name="hapus" value="hapus" class="tombol3"><a href="index3.php"><i class="fa-regular fa-trash-can"></i> HAPUS DATA</a></button>
            </form>
        </div>
        <br>

        <div class="kolom">
            <!-- Kode PHP untuk menampilkan data siswa -->
            <?php
                session_start();
                if (!isset ($_SESSION['dataSiswa'])) {
                    $_SESSION['dataSiswa'] = array();
                }

                if (isset ($_POST['nama']) && isset ($_POST['nis']) && isset ($_POST['rombel']) && isset ($_POST['rayon'])) {
                    $data = array(
                        'nama' => $_POST['nama'],
                        'nis' => $_POST['nis'],
                        'rombel' => $_POST['rombel'],
                        'rayon' => $_POST['rayon'],
                    );

                    array_push($_SESSION['dataSiswa'], $data);
                }

                // proses penghapusan data
                if(isset($_GET['page'])) {
                    $index = $_GET['page'];
                    unset($_SESSION['dataSiswa'][$index]);
                    // redirect kembali kehalaman ini setelah penghapusan
                    header('Location: http://localhost/SESSION/latihan/index.php');
                    exit;
                }

                // var_dump($_SESSION['dataSiswa']);
                
                echo "<table>";
                echo "<tr>";
                echo "<th>Nama</th>";
                echo "<th>Nis</th>";
                echo "<th>Rombel</th>";
                echo "<th>Rayon</th>";
                echo "<th>Hapus</th>";
                echo "</tr>";

                foreach ($_SESSION['dataSiswa'] as $index => $value) {
                    echo "<tr>";
                    echo "<td>" . $value['nama'] . "</td>";
                    echo "<td>" . $value['nis'] . "</td>";
                    echo "<td>" . $value['rombel'] . "</td>";
                    echo "<td>" . $value['rayon'] . "</td>";
                    echo '<td><a href="?page=' .$index.'">Hapus</a></td>';
                    echo "</tr>";
                }

                echo "</table>";
            ?>
        </div>
    </div>
</body>
</html>

