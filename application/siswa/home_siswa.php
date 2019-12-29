<?php
if ($_GET[act] == '') {
  cek_session_siswa();
  if ($_SESSION[level] == 'siswa') {
    $nisn = $_SESSION[id];
  } else {
    $nisn = $_GET[id];
  }
  $detail = mysqli_query($koneksi, "SELECT * FROM siswa a
     LEFT JOIN kelas b ON a.kode_kelas=b.kode_kelas 
                              LEFT JOIN jenis_kelamin c ON a.id_jenis_kelamin=c.id_jenis_kelamin 
                                  LEFT JOIN jurusan d ON b.kode_jurusan=d.kode_jurusan
                                    LEFT JOIN agama e ON a.id_agama=e.id_agama 
                                      where a.nisn='$nisn'");
  $s = mysqli_fetch_array($detail);
  echo "
  <div class='alert alert-warning alert-dismissible fade in' role='alert'> 
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>×</span></button> <strong>Perhatian!</strong> - Semua Data-data yang ada dibawah ini akan digunakan untuk keperluan pihak sekolah, jika kedapatan data yang diisikan tidak seuai dengan yang sebenarnya, segera hubungi pihak admin sekolah!!!
</div>
<div class='col-md-12'>
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'>Detail Data Siswa</h3>
</div>
<div class='box-body'>
<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
<div class='panel-body'>
<ul id='myTabs' class='nav nav-tabs' role='tablist'>
<li role='presentation' class='active'><a href='#siswa' id='siswa-tab' role='tab' data-toggle='tab' aria-controls='siswa' aria-expanded='true'>Data Siswa </a></li>
<li role='presentation' class=''><a href='#ortu' role='tab' id='ortu-tab' data-toggle='tab' aria-controls='ortu' aria-expanded='false'>Data Orang Tua / Wali</a></li>
</ul><br>
<div id='myTabContent' class='tab-content'>
<div role='tabpanel' class='tab-pane fade active in' id='siswa' aria-labelledby='siswa-tab'>
<form class='form-horizontal'>
<div class='col-md-7'>
<table class='table table-condensed table-bordered'>
<tbody>
<tr><th style='background-color:#E7EAEC' width='160px' rowspan='17'>";
  if (trim($s[foto]) == '') {
    echo "<img class='img-thumbnail' style='width:155px' src='foto_siswa/no-image.jpg'>";
  } else {
    echo "<img class='img-thumbnail' style='width:155px' src='foto_siswa/$s[foto]'>";
  }
  echo "</th>
</tr>
<tr><th width='120px' scope='row'>NIPD</th> <td>$s[nipd]</td></tr>
<tr><th scope='row'>NISN</th> <td>$s[nisn]</td></tr>
<tr><th scope='row'>Password</th> <td>$s[password]</td></tr>
<tr><th scope='row'>Nama Siswa</th> <td>$s[nama]</td></tr>
<tr><th scope='row'>Kelas</th> <td>$s[nama_kelas]</td></tr>
<tr><th scope='row'>Angkatan</th> <td>$s[angkatan]</td></tr>
<tr><th scope='row'>Jurusan</th> <td>$s[nama_jurusan]</td></tr>
<tr><th scope='row'>Alamat Siswa</th> <td>$s[alamat]</td></tr>
<tr><th scope='row'>RT/RW</th> <td>$s[rt]/$s[rw]</td></tr>
<tr><th scope='row'>Dusun</th> <td>$s[dusun]</td></tr>
<tr><th scope='row'>Kelurahan</th> <td>$s[kelurahan]</td></tr>
<tr><th scope='row'>Kecamatan</th> <td>$s[kecamatan]</td></tr>
<tr><th scope='row'>Kode Pos</th> <td>$s[kode_pos]</td></tr>
<tr><th scope='row'>Status Awal</th> <td>$s[status_awal]</td></tr>
<tr><th scope='row'>Status Siswa</th> <td>$s[status_siswa]</td></tr>
</tbody>
</table>
</div>
<div class='col-md-5'>
<table class='table table-condensed table-bordered'>
<tbody>
<tr><th width='120px' scope='row'>NIK</th> <td>$s[nik]</td></tr>
<tr><th scope='row'>Tempat Lahir</th> <td>$s[tempat_lahir]</td></tr>
<tr><th scope='row'>Tanggal Lahir</th> <td>" . tgl_indo($s[tanggal_lahir]) . "</td></tr>
<tr><th scope='row'>Jenis Kelamin</th> <td>$s[jenis_kelamin]</td></tr>
<tr><th scope='row'>Agama</th> <td>$s[nama_agama]</td></tr>
<tr><th scope='row'>Keb. Khusus</th> <td>$s[kebutuhan_khusus]</td></tr>
<tr><th scope='row'>Jenis Tinggal</th> <td>$s[jenis_tinggal]</td></tr>
<tr><th scope='row'>Transportasi</th> <td>$s[alat_transportasi]</td></tr>
<tr><th scope='row'>No Telpon</th> <td>$s[hp]</td></tr>
<tr><th scope='row'>Alamat Email</th> <td>$s[email]</td></tr>
<tr><th scope='row'>SKHUN</th> <td>$s[skhun]</td></tr>
<tr><th scope='row'>Penerima KPS</th> <td>$s[penerima_kps]</td></tr>
<tr><th scope='row'>No KPS</th> <td>$s[no_kps]</td></tr>
</tbody>
</table>
</div>   
</form>
</div>

                    <div role='tabpanel' class='tab-pane fade' id='ortu' aria-labelledby='ortu-tab'>
                        <form class='form-horizontal'>
                        <div class='col-md-12'>
                          <table class='table table-condensed table-bordered'>
                          <tbody>
                            <tr><th style='background-color:#E7EAEC' width='160px' rowspan='20'>";
  if (trim($s[foto]) == '') {
    echo "<img class='img-thumbnail' style='width:155px' src='foto_siswa/no-image.jpg'>";
  } else {
    echo "<img class='img-thumbnail' style='width:155px' src='foto_siswa/$s[foto]'>";
  }

  echo "</th>
                            </tr>
                            <tr bgcolor=#e3e3e3><th width='120px' scope='row'>Nama Ayah</th> <td>$s[nama_ayah]</td></tr>
                            <tr><th scope='row'>Tahun Lahir</th> <td>$s[tahun_lahir_ayah]</td></tr>
                            <tr><th scope='row'>Pendidikan</th> <td>$s[pendidikan_ayah]</td></tr>
                            <tr><th scope='row'>Pekerjaan</th> <td>$s[pekerjaan_ayah]</td></tr>
                            <tr><th scope='row'>Penghasilan</th> <td>$s[penghasilan_ayah]</td></tr>
                            <tr><th scope='row'>No Telpon</th> <td>$s[no_telpon_ayah]</td></tr>
                            <tr><th scope='row' coslpan='2'><br></th></tr>
                            <tr bgcolor=#e3e3e3><th scope='row'>Nama Ibu</th> <td>$s[nama_ibu]</td></tr>
                            <tr><th scope='row'>Tahun Lahir</th> <td>$s[tahun_lahir_ibu]</td></tr>
                            <tr><th scope='row'>Pendidikan</th> <td>$s[pendidikan_ibu]</td></tr>
                            <tr><th scope='row'>Pekerjaan</th> <td>$s[pekerjaan_ibu]</td></tr>
                            <tr><th scope='row'>Penghasilan</th> <td>$s[penghasilan_ibu]</td></tr>
                            <tr><th scope='row'>No Telpon</th> <td>$s[no_telpon_ibu]</td></tr>
                            <tr><th scope='row' coslpan='2'><br></th></tr>
                            <tr bgcolor=#e3e3e3><th scope='row'>Nama Wali</th> <td>$s[nama_wali]</td></tr>
                            <tr><th scope='row'>Tahun Lahir</th> <td>$s[tahun_lahir_wali]</td></tr>
                            <tr><th scope='row'>Pendidikan</th> <td>$s[pendidikan_wali]</td></tr>
                            <tr><th scope='row'>Pekerjaan</th> <td>$s[pekerjaan_wali]</td></tr>
                            <tr><th scope='row'>Penghasilan</th> <td>$s[penghasilan_wali]</td></tr>
                          </tbody>
                          </table>
                        </div>
                        </form>
                    </div>
                </div>
            </div>";
}elseif ($_GET[act] == 'ubahpassword') {
  if (isset($_POST[ubah])) {
      mysqli_query($koneksi, "UPDATE siswa SET password = '$_POST[b]' where nisn='$_POST[id]'");
    
    echo "<script>document.location='index_siswa.php';</script>";
  }
  $edit = mysqli_query($koneksi, "SELECT * FROM siswa a where a.nisn='$_GET[id]'");
  $s = mysqli_fetch_array($edit);
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Ubah Password Administrator</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[nisn]'>
                    <tr><th scope='row'>Password</th>               
                    <td><input type='text' class='form-control' name='b' placeholder='Kosongkan saja Jika Password tidak diganti,...'></td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='ubah' class='btn btn-info'>Ubah</button>
                    <a href='index_siswa.php'><button type='button' class='btn btn-danger'>Kembali</button></a>
                  </div>
              </form>
            </div></div>";
}
?>