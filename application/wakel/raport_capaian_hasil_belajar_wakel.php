<?php
if ($_GET[act] == '') {
  if (isset($_POST[simpan])) {
    $juml = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_kelas='$kelas[kode_kelas]'"));
    for ($ia = 1; $ia <= $juml; $ia++) {
      $a   = $_POST['a' . $ia];
      $b   = $_POST['b' . $ia];
      $c   = $_POST['c' . $ia];
      $d   = $_POST['d' . $ia];
      $nisn   = $_POST['nisn' . $ia];
      if ($a != '' or $b != '' or $c != '' or $d != '') {
        $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM nilai_sikap_semester where id_tahun_akademik='$_POST[tahun]' AND nisn='$nisn' AND kode_kelas='$kelas[kode_kelas]'"));
        if ($cek >= '1') {
          mysqli_query($koneksi, "UPDATE nilai_sikap_semester SET spiritual_predikat='$a', spiritual_deskripsi='$b', sosial_predikat='$c', sosial_deskripsi='$d' where id_tahun_akademik='$_POST[tahun]' AND nisn='$nisn' AND kode_kelas='$kelas[kode_kelas]'");
        } else {
          mysqli_query($koneksi, "INSERT INTO nilai_sikap_semester VALUES('','$_POST[tahun]','$nisn','$kelas[kode_kelas]','$a','$b','$c','$d','$_SESSION[id]','" . date('Y-m-d H:i:s') . "')");
        }
      }
    }
    echo "<script>document.location='index_guru.php?view=capaianhasilbelajar_wakel&tahun=" . $_POST[tahun] . "&kelas=" . $kelas[kode_kelas] . "';</script>";
  }
  ?>
  <section class="content-header">
    <div class='alert alert-warning alert-dismissible fade in' role='alert'> 
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span></button> 
    <strong>Perhatian!</strong> <br>Silahkan Pilih semester dan tahun akademik  dulu !!!
    </div>
</section>
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Input Capaian Hasil Belajar </h3>
        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
          <input type="hidden" name='view' value='capaianhasilbelajar_wakel'>
          <select name='tahun' style='padding:4px'>
            <?php
              echo "<option value=''>- Pilih Tahun Akademik -</option>";
              $tahun = mysqli_query($koneksi, "SELECT * FROM tahun_akademik");
              while ($k = mysqli_fetch_array($tahun)) {
                if ($_GET[tahun] == $k[id_tahun_akademik]) {
                  echo "<option value='$k[id_tahun_akademik]' selected>$k[nama_tahun]</option>";
                } else {
                  echo "<option value='$k[id_tahun_akademik]'>$k[nama_tahun]</option>";
                }
              }
              ?>
          </select>
          <!-- <select name='kelas' style='padding:4px'>
            <?php
              echo "<option value=''>- Filter Kelas -</option>";
              $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
              while ($k = mysqli_fetch_array($kelas)) {
                if ($_GET[kelas] == $k[kode_kelas]) {
                  echo "<option value='$k[kode_kelas]' selected>$k[kode_kelas] - $k[nama_kelas]</option>";
                } else {
                  echo "<option value='$k[kode_kelas]'>$k[kode_kelas] - $k[nama_kelas]</option>";
                }
              }
              ?>
          </select> -->
          <input type="submit" style='margin-top:-4px' class='btn btn-info btn-sm' value='Lihat'>
        </form>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form action='' method='POST'>
          <input type="hidden" name='tahun' value='<?php echo $_GET[tahun]; ?>'>
          <input type="hidden" name='kelas' value='<?php echo $_GET[kelas]; ?>'>
          <?php
            echo "<table id='example' class='table table-bordered table-striped'>
                    <thead>
                      <tr><th rowspan='2'>No</th>
                        <th rowspan='2'>NISN</th>
                        <th rowspan='2'>Nama Siswa</th>
                        <th colspan='2'><center>Sikap Spiritual</center></th>
                        <th colspan='2'><center>Sikap Sosial</center></th>
                      </tr>
                      <tr>
                          <th><center>Predikat</center></th>
                          <th><center>Deskripsi</center></th>
                          <th><center>Predikat</center></th>
                          <th><center>Deskripsi</center></th>
                      </tr>
                    </thead>
                    <tbody>";
                    $kelas =  mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas where nip='$_SESSION[id]' "));
                    $tampil = mysqli_query($koneksi, "SELECT a.* , c.nama_kelas FROM siswa a JOIN jenis_kelamin b ON a.id_jenis_kelamin=b.id_jenis_kelamin JOIN kelas c ON c.kode_kelas=a.kode_kelas where a.kode_kelas='$kelas[kode_kelas]' ORDER BY a.id_siswa");
                    $no = 1;
            while ($r = mysqli_fetch_array($tampil)) {
              $n = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai_sikap_semester where id_tahun_akademik='$_GET[tahun]' AND nisn='$r[nisn]' AND kode_kelas='$_GET[kelas]'"));
              echo "<tr><td>$no</td>
                              <td>$r[nisn]</td>
                              <td>$r[nama]</td>
                              <input type='hidden' name='nisn" . $no . "' value='$r[nisn]'>
                              <td><center><input type='text' name='a" . $no . "' value='$n[spiritual_predikat]' style='width:70px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><textarea name='b" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'>$n[spiritual_deskripsi]</textarea></td>
                              <td><center><input type='text' name='c" . $no . "' value='$n[sosial_predikat]' style='width:70px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><textarea name='d" . $no . "' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'>$n[sosial_deskripsi]</textarea></td>
                            </tr>";
              $no++;
            }
            ?>
          </tbody>
          </table>
      </div><!-- /.box-body -->
      <div style='clear:both'></div>
      <div class='box-footer'>
        <button type='submit' name='simpan' class='btn btn-info'>Simpan</button>
        <button type='reset' class='btn btn-danger pull-right'>Batal</button>
      </div>
    </div><!-- /.box -->

    </form>
  </div>
<?php }  ?>