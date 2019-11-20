<?php if ($_GET[act]==''){?>
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title"><?php if(isset($_GET[kelas]) AND isset($_GET[tahun])){ echo"Jadwal Pelajaran";}
else{echo "Jadwal Pelajaran Pada Tahun".date('Y'); } ?></h3>
<?php if($_SESION[level]!='kepala'){ ?>
<a class='pull_right btn btn_primary btn-sm' href='index.php?view=jadwalpelajaran&act'>Tambahkan Jadwal Pelajaran</a>
<?php} ?>
<form style='margin-right:5px; margin-top:0px' class='pull-right' action=''method='Get'>
<input type="hidden" name='view' value='jadwalpelajaran'>
<select name='tahun' style='padding:4px'>
<?php
echo "<option value=''>- Pilih Tahun Akademik -</option>";
$tahun = mysqli_query($koneksi,"SELECT * FROM tahun_akademik");
while ($k = mysqli_fetch_array($tahun)){
    if ($_GET[tahun]==$k[id_tahun_akademik]){
echo "<option value='$k[id_tahun_akademik]' selected>$k[nama_tahun]</option>";
    }else{
        echo "<option value='$k[id_tahun_akademik]'>$k[nama_tahun]</option>";
    }
}
?>
</select>
<select name='kelas' style='padding:4px'>
<?php
echo "<option value=''>- Pilih Kelas -</option>";
$kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
while ($k = mysqli_fetch_array($kelas)){
    if ($_GET[kelas]==$k[kode_kelas]){
echo "<option value='$k[kode_kelas]' selected>$k[kode_kelas]</option>";
    }else{
        echo "<option value='$k[kode_kelas]'>$k[kode_kelas]</option>";
    }
}
?>
</select>
<input type="submit" style='margin-top:4px' class='btn btn-success btn-sm' value='Lihat'>
</form>

</div><!-- /.box-header -->
<div class="box-body">
<table id="example" class="table table-bordered table-striped">
<thead>
<tr>
<th style='widht:40px'>No</th>
<th>Jadwal Pelajaran</th>
<th>Kelas</th>
<th>Guru</th>
<th>Hari</th>
<th>Mulai</th>
<th>Selesai</th>
<th>Ruangan</th>
<?php if($_SESSION[level]!='kepala') { ?>
<th>Daftar Hadir</th> 
<?php }
if($_SESSION[level]!='kepala'){ ?>
<th>action</th> 
<?php } ?>
<?tr>
</thead>
<tbody>
<?php
if (isset($_GET[kelas]) AND isset($_GET[tahun])){
    $tampil = mysqli_query($koneksi,"SELECT a.*,e.nama_kelas,
    b.namamatapelajaran, b.kode_kurikulum, b.kode_pelajaran, c.nama_guru, d.nama_ruangan FROM jadwal_pelajaran a
   JOIN mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran
   JOIN guru c ON a.nip=c.nip
   JOIN ruangan d ON a.kode_ruangan=d.kode_ruangan
   JOIN kelas e ON a.kode_kelas=e.kode_kelas
   where a.kode_kelas='$_GET[kelas]' AND
   a.id_tahun_akademik='$_GET[tahun]' AND
   d.kode_kurikulum='$kurikulum[kode_kurikulum]' ORDER BY a.hari DESC");

}
$no = 1;
while($r=mysqli_fet6ch_array($tampil)){
    echo "<tr><td>$no</td>
<td>$r[namamatapelajaran]</td>
<td>$r[nama_kelas]</td>
<td>$r[wali_guru]</td>
<td>$r[hari]</td>
<td>$r[jam_mulai]</td>
<td>$r[jam_selesai]</td>"
<td>$[nama_ruangan]</td>";
if($_SESSION[level]!='kepala'){
echo 
"<td><a class='btn btn-xs btn-warning' href='index.php?view=absensisiswa&act=tampilabsen&id=$r[kode_kelas]&kd=$r[kode_pelajaran]'>
Buku Absensi Siswa</a></td>";
}
if($_SESSION[level]!='kepala'){
    echo  "<td style='widht:70px !important'<center>
    <a class='btn btn-succes btn-xs' title='Edit Jadwal' href='index.php?view=jadwalpelajaran&act=edit&id=$r[kodejdwl]'><span class='glyphicon glyphicon-edit'></span></a>
<a class='btn btn-danger btn-xs' title='Hapus Jadwal' href='index.php?view=jadwalpelajaran&hapus=$r[kodejdwl]' onclick=\"return config">
</center></td>;
}
echo "<?tr>;"
$no++;
}

if (isset($_GET[hapus])){
mysqli_query($koneksi,"DELETE FROM jadwal_pelajaran where kodejdwl='$_GET[hapus]'");
echo "<script>document.location='index.php?view=jadwalpelajaran';</script>";
}
?>
</tbody>
</table>
</div><!-- /.box-body -->
<?php
if($_GET[kelas]=='' AND $_GET[tahun]==''){
echo "<center style='padding:60px; color:red'>Silahkan Memilih Tahun akademik dan Kelas Terlebih dahulu...</center>";
}
?>
</div>
</div>

<?php
}elseif ($_GET[act] == 'tambah') {
    if (isset($_POST[tambah])) {
        mysqli_query($koneksi,"INSERT INTO jadwal_pelajaran VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]',)")
    echo "<script>document.location='index.php?view=jadwalpelajaran';</script>";
    }
    
    echo "<div class='col-md-12'>
    <div class='box box-info'>
    <div class='box-header with-border'>
    <h3 class='box-title'>Tambah Data Jadwal Pelajaran</h3>
    </div>
    <div class='box-body'>
    <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
<div class='col-md-12'>
<table class='table table-condensed table-bordered'>
<tbody>
<tr><th widht='120px' scope='row'>Tahun Akademik</th> <td><input type='text' class='form-control' name='a'>
 <option value='0' selected>- Pilih Tahun Akademik -</option>";
 $tahun = mysqli_query($koneksi,"SELECT * FROM tahun_akademik");
 while ($a = mysqli_fetch_array($tahun)) {
     echo"<option value='$a[id_tahun_akademik]'>$a[nama_tahun]</option>";
 }
 echo "</select>
 </td></tr>
 <tr><th scope='row'>kelas</th>   <td><select class='form-control' name='b'>
 <option value='0' selected>- Pilih Kelas -</option>";
 $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
 while ($a = mysqli_fecth_array($kelas)) {
     echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
 }
 echo "</select>
 </td></tr>
 <tr><th scope='row'>Mata Pelajaran</th>   <td><select class='form-control' name='c'>
 <option value='0' selected>- Pilih Mata Pelajaran -</option>";
 $mapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran);
 while ($a = mysqli_fecth_array($mapel)) {
     echo "<option value='$a[kode_pelajaran]'>$a[namamatapelajaran]</option>";
 }
 echo "</select>
 </td></tr>
 <tr><th scope='row'>Ruangan</th>   <td><select class='form-control' name='d'>
 <option value='0' selected>- Pilih Ruangan -</option>";
 $jur = mysqli_query($koneksi, "SELECT * FROM ruangan a JOIN gedung b ON a.kode_gedung=b.kode_gedung");
 while ($a = mysqli_fecth_array($rua)) {
     echo "<option value='$a[kode_ruangan]'>$a[nama_gedung] - $a[nama_ruangan]</option>";
 }
 echo "</select>
 </td></tr>
 <tr><th scope='row'>Guru</th>   <td><select class='form-control' name='e'>
 <option value='0' selected>- Pilih Guru -</option>";
 $guru = mysqli_query($koneksi, "SELECT * FROM guru");
 while ($a = mysqli_fecth_array($guru)) {
     echo "<option value='$a[nip]'>$a[nama_guru]</option>";
 }
 echo "</select>
 </td></tr>
 <tr><th scope='row'>Jadwal Paralel</th>   <td><input type='text' class='form-control' name='f'></td></tr>
 <tr><th scope='row'>Jadwal Serial</th>   <td><input type='text' name='g'</td></tr>
 <tr><th scope='row'>Jam Mulai</th>
 <td><input type='text' class='from-control' name='h' placeholder='hh:ii:ss' value='".date(H:i:s)"'</td></tr>
 <tr><th scope='row'>Jam Selesai
 </th><td><input type='text' class='from-control' name='i' placeholder='hh:ii:ss' value='".date(H:i:s)"'</td></tr>
 <tr><th scope='row'>Hari</th> <td>select class='from-control' name='j'>
  <option value='0' selected>- Pilih Hari-</option>
  <option value='Senin'>Senin</option>
  <option value='Selasa'>Selasa</option>
  <option value='Rabu'>Rabu</option>
  <option value='Kamis'>Kamis</option>
  <option value='Jumat'>Jumat</option>
  <option value='Sabtu'>Sabtu</option>
  <option value='Minggu'>Minggu</option>
  </td></tr>
  <tr><th scope='row'>Aktif</th>   <td><input type='radio' name='k' value='Ya' checked> Ya
 <input type='radio' name='k' value='Tidak'> Tidak 
 </td></tr>
 </tbody>
 </table>
 </div>
 </div>
 </div class='box-footer'>
 <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
 <a herf='index.php?view=kelas'><button class='btn btn-default pull-right'>Cancel</button></a>

 </div>
 </form>
 </div>";
}elseif($_GET[act]=='edit') {
    if (isset($_POST[update])) {
        mysqli_query($koneksi,"UPDATE jadwal_pelajaran SET ide_tahun_akademik ='$_POST[a]',
    kode_kelas= '$_POST[b]',
    kode_pelajaran= '$_POST[c]',
    kode_ruangan= '$_POST[d]',
    nip= '$_POST[e]',
    paralel= '$_POST[f]',
    jadwal_serial= '$_POST[g]',
    jadwal_mulai= '$_POST[h]',
    jadwal_selesai= '$_POST[i]',
    hari= '$_POST[j]',
    aktif= '$_POST[k]',
    echo "<script>document.location='index.php?view=jadwalpelajaran';</script>";
}
$e = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM jadwal_pelajaran where kodejdwl='$_GET[id]'"));
echo "<div class='col-md-12'>
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'>Tambah Data Jadwal Pelajaran</h3>
</div>
<div class='box-body'>
<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
<div class='col-md-12'>
<table class='table table-condensed table-bordered'>
<tbody>
<input type='hidden' name='id' value='$_GET[id]'>
<tr><th widht='120px' scope='row'>Tahun Akademik</th> <td><input type='text' class='form-control' name='a'>
<option value='0' selected>- Pilih Tahun Akademik -</option>";
$tahun = mysqli_query($koneksi,"SELECT * FROM tahun_akademik");
while ($a = mysqli_fetch_array($tahun)) {
    if ($e[id_tahun_akademik]==$a[id_tahun_akademik]){
 echo"<option value='$a[id_tahun_akademik]'selected>$a[nama_tahun]</option>";
}else{
    echo"<option value='$a[id_tahun_akademik]'>$a[nama_tahun]</option>";
}
}
echo "</select>
</td></tr>
<tr><th scope='row'>kelas</th>   <td><select class='form-control' name='b'>
 <option value='0' selected>- Pilih Kelas -</option>";
 $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
 while ($a = mysqli_fecth_array($kelas)) {
    if ($e[kode_kelas]==$a[kode_kelas]){
     echo "<option value='$a[kode_kelas]' selected>$a[nama_kelas]</option>";
 }else{
    echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
 }
}
 echo "</select>
 </td></tr>
 <tr><th scope='row'>Mata Pelajaran</th>   <td><select class='form-control' name='c'>
 <option value='0' selected>- Pilih Mata Pelajaran -</option>";
 $mapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran);
 while ($a = mysqli_fecth_array($mapel)) {
    if ($e[kode_pelajaran]==$a[kode_pelajaran]){
     echo "<option value='$a[kode_pelajaran]' selected>$a[namamatapelajaran]</option>";
 }else{
    echo "<option value='$a[kode_pelajaran]'>$a[namamatapelajaran]</option>";
 }
}
 echo "</select>
 </td></tr>
 <tr><th scope='row'>Ruangan</th>   <td><select class='form-control' name='d'>
 <option value='0' selected>- Pilih Ruangan -</option>";
 $jur = mysqli_query($koneksi, "SELECT * FROM ruangan a JOIN gedung b ON a.kode_gedung=b.kode_gedung");
 while ($a = mysqli_fecth_array($rua)) {
    if ($e[kode_ruangan]==$a[kode_ruangan]){
     echo "<option value='$a[kode_ruangan]' selected>$a[nama_gedung] - $a[nama_ruangan]</option>";
 }else{
    echo "<option value='$a[kode_ruangan]'>$a[nama_gedung] - $a[nama_ruangan]</option>";
 }
}
 echo "</select>
 </td></tr>
 <tr><th scope='row'>Guru</th>   <td><select class='form-control' name='e'>
 <option value='0' selected>- Pilih Guru -</option>";
 $guru = mysqli_query($koneksi, "SELECT * FROM guru");
 while ($a = mysqli_fecth_array($guru)) {
    if ($e[nip]==$a[nip]){
     echo "<option value='$a[nip]' selected>$a[nama_guru]</option>";
 }else{
    echo "<option value='$a[nip]'>$a[nama_guru]</option>";
 }
}
 echo "</select>
 </td></tr>
 <tr><th scope='row'>Jadwal Paralel</th>   <td><input type='text' class='form-control' name='f'></td></tr>
 <tr><th scope='row'>Jadwal Serial</th>   <td><input type='text' name='g'</td></tr>
 <tr><th scope='row'>Jam Mulai</th>
 <td><input type='text' class='from-control' name='h' placeholder='hh:ii:ss' value='".date(H:i:s)"'</td></tr>
 <tr><th scope='row'>Jam Selesai
 </th><td><input type='text' class='from-control' name='i' placeholder='hh:ii:ss' value='".date(H:i:s)"'</td></tr>
 <tr><th scope='row'>Hari</th> <td>select class='from-control' name='j'>
  <option value='$e[hari]' selected>$e[hari]</option>
  <option value='Senin'>Senin</option>
  <option value='Selasa'>Selasa</option>
  <option value='Rabu'>Rabu</option>
  <option value='Kamis'>Kamis</option>
  <option value='Jumat'>Jumat</option>
  <option value='Sabtu'>Sabtu</option>
  <option value='Minggu'>Minggu</option>
  </td></tr>
  <tr><th scope='row'>Aktif</th>   <td>";
  if ($e[aktif]=='Ya'){
  echo "<input type='radio' name='k' value='Ya' checked> Ya
 <input type='radio' name='k' value='Tidak'> Tidak";
  }else{
    echo "<input type='radio' name='k' value='Ya'> Ya
    <input type='radio' name='k' value='Tidak' checked> Tidak";
  }
 echo "</td></tr>
 </tbody>
 </table>
 </div>
 </div>
 </div class='box-footer'>
 <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
 <a herf='index.php?view=kelas'><button class='btn btn-default pull-right'>Cancel</button></a>

 </div>
 </form>
 </div>";
}
?>