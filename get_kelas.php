<?php
include "config/koneksi.php";
$jurusan = $_POST['jurusan'];

echo "<option value=''>-Pilih kelas-</option>";

$query = "SELECT * FROM kelas WHERE kode_jurusan='$jurusan' ORDER BY nama_kelas ASC";
$dewan1 = $koneksi->prepare($query);
$dewan1->bind_param("i", $jurusan);
$dewan1->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
    echo "<option value='" . $row['kode_kelas'] . "'>" . $row['nama_kelas'] . "</option>";
}


?>