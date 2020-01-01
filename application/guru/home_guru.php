<?php
if ($_GET[act] == '') {
  cek_session_guru();
  if ($_SESSION[level] == 'guru') {
    $nip = $_SESSION[id];
  } else {
    $nip = $_GET[id];
  }
  // relasi
  $detail = mysqli_query($koneksi, "SELECT a.*, b.jenis_kelamin, c.status_kepegawaian, d.jenis_ptk, e.nama_agama, g.nama_golongan, f.nama_status_keaktifan 
  FROM guru a LEFT JOIN jenis_kelamin b ON a.id_jenis_kelamin=b.id_jenis_kelamin 
    LEFT JOIN status_kepegawaian c ON a.id_status_kepegawaian=c.id_status_kepegawaian 
      LEFT JOIN jenis_ptk d ON a.id_jenis_ptk=d.id_jenis_ptk 
        LEFT JOIN agama e ON a.id_agama=e.id_agama 
          LEFT JOIN status_keaktifan f ON a.id_status_keaktifan=f.id_status_keaktifan 
          LEFT JOIN golongan g ON a.id_golongan=g.id_golongan
              where a.nip='$nip'");
  $s = mysqli_fetch_array($detail);
  echo "
  <div class='alert alert-warning alert-dismissible fade in' role='alert'> 
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>×</span></button> 
  <strong>Perhatian!</strong> - Semua Data-data yang ada dibawah ini akan digunakan untuk keperluan pihak sekolah, jika kedapatan data yang diisikan tidak seuai dengan yang sebenarnya, segera hubungi pihak admin sekolah!!!
</div>
  <div class='col-md-12'>
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'>Detail Data Guru</h3>
</div>
<div class='box-body'>
<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
<div class='col-md-7'>
<table class='table table-condensed table-bordered'>
<tbody>
<input type='hidden' name='id' value='$s[nip]'>
<tr><th style='background-color:#E7EAEC' width='160px' rowspan='25'>";
  if (trim($s[foto]) == '') {
    echo "<img class='img-thumbnail' style='width:155px' src='foto_siswa/no-image.jpg'>";
  } else {
    echo "<img class='img-thumbnail' style='width:155px' src='foto_pegawai/$s[foto]'>";
  }
  echo "</th>
</tr>
<tr><th width='120px' scope='row'>Kode Guru</th>      <td>$s[nip]</td></tr>
<tr><th scope='row'>Password</th>               <td>$s[password]</td></tr>
<tr><th scope='row'>Nama Lengkap</th>           <td>$s[nama_guru]</td></tr>
<tr><th scope='row'>Tempat Lahir</th>           <td>$s[tempat_lahir]</td></tr>
<tr><th scope='row'>Tanggal Lahir</th>          <td>" . tgl_indo($s[tanggal_lahir]) . "</td></tr>
<tr><th scope='row'>Jenis Kelamin</th>          <td>$s[jenis_kelamin]</td></tr>
<tr><th scope='row'>Agama</th>                  <td>$s[nama_agama]</td></tr>
<tr><th scope='row'>No Telpon</th>              <td>$s[telepon]</td></tr>
<tr><th scope='row'>Alamat Email</th>           <td>$s[email]</td></tr>
<tr><th scope='row'>Alamat</th>                 <td>$s[alamat_jalan]</td></tr>
<tr><th scope='row'>RT/RW</th>                  <td>$s[rt]/$s[rw]</td></tr>
<tr><th scope='row'>Dusun</th>                  <td>$s[nama_dusun]</td></tr>
<tr><th scope='row'>Kelurahan</th>              <td>$s[desa_kelurahan]</td></tr>
<tr><th scope='row'>Kecamatan</th>              <td>$s[kecamatan]</td></tr>
<tr><th scope='row'>Kabupaten</th>              <td>$s[kabupaten]</td></tr>
<tr><th scope='row'>Kode Pos</th>               <td>$s[kode_pos]</td></tr>
<tr><th scope='row'>NUPTK</th>                  <td>$s[nuptk]</td></tr>
<tr><th width='150px' scope='row'>NIP</th>      <td>$s[nik]</td></tr>
</tbody>
</table>
</div>

<div class='col-md-5'>
<table class='table table-condensed table-bordered'>
<tbody>
<tr><th scope='row'>TMT</th>                   <td>$s[tmt]</td></tr>
<tr><th scope='row'>Jenis PTK</th>              <td>$s[jenis_ptk]</td></tr>
<tr><th scope='row'>Status Pegawai</th>         <td>$s[status_kepegawaian]</td></tr>
<tr><th scope='row'>Status Keaktifan</th>       <td>$s[nama_status_keaktifan]</td></tr>
<tr><th scope='row'>Golongan</th>               <td>$s[nama_golongan]</td></tr>

</tbody>
</table>
</div> 
</div>
</form>
</div>";
// ubah password
}elseif ($_GET[act] == 'ubahpassword') {
  if (isset($_POST[ubah])) {
      mysqli_query($koneksi, "UPDATE guru SET password = '$_POST[b]' where nip='$_POST[id]'");
    
    echo "<script>document.location='index_guru.php';</script>";
  }
  $edit = mysqli_query($koneksi, "SELECT * FROM guru a where a.nip='$_GET[id]'");
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
                    <input type='hidden' name='id' value='$s[nip]'>
                    <tr><th scope='row'>Password</th>               
                    <td><input type='text' class='form-control' name='b' placeholder='Kosongkan saja Jika Password tidak diganti,...'></td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='ubah' class='btn btn-info'>Ubah</button>
                    <a href='index_guru.php'><button type='button' class='btn btn-danger'>Kembali</button></a>
                  </div>
              </form>
            </div>";
}
