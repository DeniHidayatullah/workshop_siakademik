
<?php
  $j =  mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM jadwal_pelajaran where nip='$_SESSION[id]'"));
  $d =  mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas where nip='$_SESSION[id]' "));              
  $m = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mata_pelajaran where nip='$_SESSION[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Rekap Data Absensi Siswa Pada $_GET[tahun]</b></h3>
                </div>
              <div class='box-body'>

              <div class='col-md-12'>
              <table class='table table-condensed table-hover'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[kode_kelas]'>
                    <tr><th width='120px' scope='row'>Kode Kelas</th> <td>$d[kode_kelas]</td></tr>
                    <tr><th scope='row'>Nama Kelas</th>               <td>$d[nama_kelas]</td></tr>
                    <tr><th scope='row'>Mata Pelajaran</th>           <td>$m[namamatapelajaran]</td></tr>
                  </tbody>
              </table>
              </div>

              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered table-striped'>
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Pertemuan</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Izin</th>
                        <th>Alpa</th>
                        <th><center>% Kehadiran</center></th>
                      </tr>
                    </thead>
                    <tbody>";
  $no = 1;
  $tampil = mysqli_query($koneksi, "SELECT * FROM siswa a JOIN jenis_kelamin b ON a.id_jenis_kelamin=b.id_jenis_kelamin where a.kode_kelas='$d[kode_kelas]' ORDER BY a.id_siswa");
  while ($r = mysqli_fetch_array($tampil)) {
    $total = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$j[kodejdwl]' GROUP BY tanggal"));
    $hadir = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$j[kodejdwl]' AND nisn='$r[nisn]' AND kode_kehadiran='H'"));
    $sakit = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$j[kodejdwl]' AND nisn='$r[nisn]' AND kode_kehadiran='S'"));
    $izin = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$j[kodejdwl]' AND nisn='$r[nisn]' AND kode_kehadiran='I'"));
    $alpa = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `absensi_siswa` where kodejdwl='$j[kodejdwl]' AND nisn='$r[nisn]' AND kode_kehadiran='A'"));
    $bobotsakit = 0.5;
    $bobotalpa = 0;
    $kehadiran = $hadir + ($bobotsakit * $sakit) + ($bobotsakit * $izin) + ($bobotalpa * $alpa);
    $persen = $kehadiran / ($total) * 100;
    echo "<tr bgcolor=$warna>
                            <td>$no</td>
                            <td>$r[nisn]</td>
                            <td>$r[nama]</td>
                            <td>$r[jenis_kelamin]</td>
                            <td align=center>$total</td>
                            <td align=center>$hadir</td>
                            <td align=center>$sakit</td>
                            <td align=center>$izin</td>
                            <td align=center>$alpa</td>
                            <td align=right>" . number_format($persen, 2) . " %</td>";
    echo "</tr>";
    $no++;
  }

  echo "</tbody>
                  </table>
                  <a href='index_guru.php?view=jadwalguru'><button type='button' class='btn btn-danger pull-right'>Kembali</button></a>
                </div>
              </div>
            </div>";

?>