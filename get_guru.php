<?php
include "config/koneksi.php";
$mata_pelajaran = $_POST['mata_pelajaran'];

echo "<option value=''>-Pilih Guru Pengampu-</option>";

$query = "SELECT * FROM mata_pelajaran a join guru b on a.nip=b.nip WHERE kode_pelajaran='$mata_pelajaran' ORDER BY a.nip ASC";
$dewan1 = $koneksi->prepare($query);
$dewan1->bind_param("i", $mata_pelajaran);
$dewan1->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
    echo "<option value='" . $row['nip'] . "'>" . $row['nama_guru'] . "</option>";
}


?>