<?php
include "config/koneksi.php";
$kelas = $_POST['kelas'];

echo "<option value=''>-Pilih Ruangan-</option>";

$query = "SELECT * FROM kelas a join ruangan b on a.kode_ruangan=b.kode_ruangan WHERE kode_kelas='$kelas' ORDER BY a.kode_ruangan ASC";
$dewan1 = $koneksi->prepare($query);
$dewan1->bind_param("i", $kelas);
$dewan1->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
    echo "<option value='" . $row['kode_ruangan'] . "'>" . $row['nama_ruangan'] . "</option>";
}


?>