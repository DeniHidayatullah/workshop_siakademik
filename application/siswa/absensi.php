<!-- menampilkan -->
<?php
echo "<section class='content-header'>
<div class='alert alert-warning alert-dismissible fade in' role='alert'> 
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>×</span></button> 
// pilih tahun akademik
<strong>Perhatian!</strong> <br>Silahkan Pilih semester dan tahun akademik  dulu !!!
</div>
    </section><div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Laporan Presensi Siswa : <b>$nama</b></h3>
                <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
                    <input type='hidden' name='view' value='rekapabsensiswa'>
                    <input type='hidden' name='act' value='detailsiswa'>
                    <select name='tahun' style='padding:4px'>
                        <option value=''>- Pilih Tahun Akademik -</option>";
$tahun = mysqli_query($koneksi, "SELECT * FROM tahun_akademik");
while ($k = mysqli_fetch_array($tahun)) {
  if ($_GET[tahun] == $k[id_tahun_akademik]) {
    echo "<option value='$k[id_tahun_akademik]' selected>$k[nama_tahun]</option>";
  } else {
    echo "<option value='$k[id_tahun_akademik]'>$k[nama_tahun]</option>";
  }
}

echo "</select>
                    <input type='submit' style='margin-top:-4px' class='btn btn-success btn-sm' value='Lihat'>
                  </form>
                </div>
                <div class='box-body'>

        <table class='table table-bordered table-striped'>
          <tr>
            <th style='border:1px solid #ffffff; background-color:lightblue' colspan='1' ><center>No</center></th>
            <th style='border:1px solid #ffffff; background-color:lightblue' colspan='2' ><center>Mata Pelajaran</center></th>
            <th style='border:1px solid #ffffff; background-color:lightblue' style='text-align:center'><center>Pertemuan</center></th>
            <th style='border:1px solid #ffffff; background-color:lightblue' style='text-align:center'><center>Hadir</center></th>
            <th style='border:1px solid #ffffff; background-color:lightblue' style='text-align:center'><center>Sakit</center></th>
            <th style='border:1px solid #ffffff; background-color:lightblue' style='text-align:center'><center>Izin</center></th>
            <th style='border:1px solid #ffffff; background-color:lightblue' style='text-align:center'><center>Alpa</center></th>
            <th style='border:1px solid #ffffff; background-color:lightblue' colspan='2' ><center>Kehadiran</center></th>
          </tr>";
$kelompok = mysqli_query($koneksi, "SELECT * FROM kelompok_mata_pelajaran");
while ($k = mysqli_fetch_array($kelompok)) {
  echo "<tr>
            <td style='border:1px solid #e3e3e3' colspan='9'><b>$k[nama_kelompok_mata_pelajaran]</b></td>
          </tr>";
          // relasi
  $mapel = mysqli_query($koneksi, "SELECT * FROM  jadwal_pelajaran a 
          JOIN mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran 
            where a.kode_kelas='$_SESSION[kode_kelas]' 
              AND a.id_tahun_akademik='$_GET[tahun]' 
                AND b.id_kelompok_mata_pelajaran='$k[id_kelompok_mata_pelajaran]'");

  $no = 1;
  while ($m = mysqli_fetch_array($mapel)) {
    $n = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$m[kodejdwl]' AND nisn='$iden[nisn]'"));
    $total = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$m[kodejdwl]' GROUP BY tanggal"));
    $hadir = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$m[kodejdwl]' AND nisn='$n[nisn]' AND kode_kehadiran='H'"));
    $sakit = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$m[kodejdwl]' AND nisn='$n[nisn]' AND kode_kehadiran='S'"));
    $izin = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$m[kodejdwl]' AND nisn='$n[nisn]' AND kode_kehadiran='I'"));
    $alpa = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$m[kodejdwl]' AND nisn='$n[nisn]' AND kode_kehadiran='A'"));
    $bobotsakit = 0.5;
    $bobotalpa = 0;
    $kehadiran = $hadir + ($bobotsakit * $sakit) + ($bobotsakit * $izin) + ($bobotalpa * $alpa);
    $persen = $kehadiran / ($total) * 100;
    echo "<tr bgcolor=$warna>
                                    <td>$no</td>
                                    <td colspan='2'>$m[namamatapelajaran]</td>
                                    <td align=center>$total</td>
                                    <td align=center>$hadir</td>
                                    <td align=center>$sakit</td>
                                    <td align=center>$izin</td>
                                    <td align=center>$alpa</td>
                                    <td align=right>" . number_format($persen, 2) . " %</td>";
    echo "</tr>";
    $no++;
  }
}

echo "</table></div></div>";
