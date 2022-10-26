<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hasil Klasifikasi Profil Lulusan</title>
</head>

<body>
    <h3>
        <center>DATA KLASIFIKASI PROFIL LULUSAN</center>
    </h3>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kelompok Profil</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($mahasiswa2 as $data) {
                $no++;
                echo "<tr>";
                echo "<td><center>" . $no . "</center></td>";
                echo "<td>" . $data->nim . "</td>";
                echo "<td>" . $data->nama_mahasiswa . "</td>";
                echo "<td>" . $data->prediksi_k13 . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>