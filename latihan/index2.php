<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="data.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: skyblue;
        }

        .tampilan {
            text-align: center;
            padding: 20px;
        }

        .kolom {
            margin: 20px auto;
            width: 80%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* to hide overflowed content */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: cornflowerblue;
            color: white;
        }

        tr:nth-child(even) {
            background-color: silver;
        }

        tr:hover {
            background-color: #ddd;
        }

        button a {
            text-decoration: none;
            color: #fff;
        }

        button {
            background-color: red;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: flex;
            font-size: 16px;
            margin: 0 auto;
            cursor: pointer;
            border-radius: 4px;
        }

        .tombolBack {
            display: flex;
        }


    </style>
</head>
<body>
    <div class="tampilan">
</div>

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
                
                echo "<table border='1px'>";
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

        <form action="" method="" class="tombolBack">
        <button type="submit" name="kembali" value="kembali"><a href="index.php">BACK</a></button>
        <button type="submit" name="hapus" value="hapus"><a href="index3.php"><i class="fa-regular fa-trash-can"></i> HAPUS DATA</a></button>
    </form>
</body>
</html>
