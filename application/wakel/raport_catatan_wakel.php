<?php
if ($_GET[act] == '') {
  if (isset($_POST[simpan])) {
    if ($_POST[status] == 'Update') {
      mysqli_query($koneksi, "UPDATE catatan_wakel SET catatan='$_POST[a]' where id_catatan='$_POST[id]'");
    } else {
      mysqli_query($koneksi, "INSERT INTO catatan_wakel VALUES('','$_GET[tahun]','$_POST[nisn]','$kelas[kode_kelas]','$_POST[a]','$_SESSION[id]','" . date('Y-m-d H:i:s') . "')");
    }
    echo "<script>document.location='index_guru.php?view=catatanwakel&tahun=$_GET[tahun]&kelas=$kelas[kode_kelas]#$_POST[nisn]';</script>";
  }

  if (isset($_GET[delete])) {
    mysqli_query($koneksi, "DELETE FROM catatan_wakel where id_catatan='$_GET[delete]'");
    echo "<script>document.location='index_guru.php?view=catatanwakel&tahun=$_GET[tahun]&kelas=$kelas[kode_kelas]#$_POST[nisn]';</script>";
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
        <h3 class="box-title">Input Catatan Siswa</h3>
        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
          <input type="hidden" name='view' value='catatanwakel'>
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
          <input type="submit" style='margin-top:-4px' class='btn btn-info btn-sm' value='Lihat'>
        </form>
      </div><!-- /.box-header -->
      <div class="box-body">
        <?php
          echo "<table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr><th rowspan='2'>No</th>
                        <th>NISN</th>
                        <th width='170px'>Nama Siswa</th>
                        <th width='270px'><center>Catatan</center></th>
                        <th><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>";

                    $kelas =  mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas where nip='$_SESSION[id]' "));
                    $tampil = mysqli_query($koneksi, "SELECT a.* , c.nama_kelas FROM siswa a JOIN jenis_kelamin b ON a.id_jenis_kelamin=b.id_jenis_kelamin JOIN kelas c ON c.kode_kelas=a.kode_kelas where a.kode_kelas='$kelas[kode_kelas]' ORDER BY a.id_siswa");
                    $no = 1;
          while ($r = mysqli_fetch_array($tampil)) {
            if (isset($_GET[edit])) {
              $e = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM catatan_wakel where id_catatan='$_GET[edit]'"));
              $name = 'Update';
            } else {
              $name = 'Simpan';
            }

            if ($_GET[nisn] == $r[nisn]) {
              echo "<form action='index_guru.php?view=catatanwakel&tahun=$_GET[tahun]&kelas=$kelas[kode_kelas]' method='POST'>
                            <tr><td>$no</td>
                              <td>$r[nisn]</td>
                              <td style='font-size:12px' id='$r[nisn]'>$r[nama]</td>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <input type='hidden' name='id' value='$e[id_catatan]'>
                              <input type='hidden' name='status' value='$name'>
                              <td><input type='text' name='a' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Catatan...' value='$e[catatan]'></td>
                              <td align=center><input type='submit' name='simpan' class='btn btn-xs btn-primary' style='width:65px' value='$name'>
                              <button type='reset' class='btn btn-xs btn-danger'>Batal</button></td>
                            </tr>
                          </form>";
            } else {
              echo "<form action='index_guru.php?view=catatanwakel&tahun=$_GET[tahun]&kelas=$kelas[kode_kelas]' method='POST'>
                            <tr><td>$no</td>
                              <td>$r[nisn]</td>
                              <td style='font-size:12px' id='$r[nisn]'>$r[nama]</td>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <td><input type='text' name='a' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Catatan...'></td>
                              <td align=center><input type='submit' name='simpan' class='btn btn-xs btn-primary' style='width:65px' value='$name'>
                              <button type='reset' class='btn btn-xs btn-danger'>Batal</button></td>
                            </tr>
                          </form>";
            }

            $pe = mysqli_query($koneksi, "SELECT * FROM catatan_wakel where id_tahun_akademik='$_GET[tahun]' AND nisn='$r[nisn]' AND kode_kelas='$kelas[kode_kelas]'");
            while ($n = mysqli_fetch_array($pe)) {
              echo "<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>$n[catatan]</td>
                                        <td width='90px' align=center><a href='index_guru.php?view=catatanwakel&tahun=" . $_GET[tahun] . "&kelas=" . $kelas[kode_kelas] . "&edit=" . $n[id_catatan] . "&nisn=" . $r[nisn] . "#$r[nisn]' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-edit'></span></a>
                                                        <a href='index_guru.php?view=catatanwakel&tahun=" . $_GET[tahun] . "&kelas=" . $kelas[kode_kelas] . "&delete=" . $n[id_catatan] . "&nisn=" . $r[nisn] . "' class='btn btn-xs btn-danger' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a></td>
                                      </tr>";
            }
            $no++;
          }
          ?>
        </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

  </div>
<?php }  ?>