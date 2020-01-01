<?php
include "config/koneksi.php";
$kelas = $_POST['kelas'];

echo "<option value=''>-Pilih Mata Pelajaran-</option>";

$query = "SELECT  * FROM mata_pelajaran a join jurusan b on a.kode_jurusan=b.kode_jurusan JOIN kelas c on b.kode_jurusan=c.kode_jurusan WHERE c.kode_kelas='$kelas' group by a.namamatapelajaran";
$dewan1 = $koneksi->prepare($query);
$dewan1->bind_param("i", $kelas);
$dewan1->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
    echo "<option value='" . $row['kode_pelajaran'] . "'>" . $row['namamatapelajaran'] . "</option>";
}


?>