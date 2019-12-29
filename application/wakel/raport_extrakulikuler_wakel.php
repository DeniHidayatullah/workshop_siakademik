<?php
if ($_GET[act] == '') {
  if (isset($_POST[simpan])) {
    if ($_POST[status] == 'Update') {
      mysqli_query($koneksi, "UPDATE nilai_extrakulikuler SET kegiatan='$_POST[a]', nilai='$_POST[b]', deskripsi='$_POST[c]' where id_nilai_extrakulikuler='$_POST[id]'");
    } else {
      mysqli_query($koneksi, "INSERT INTO nilai_extrakulikuler VALUES('','$_GET[tahun]','$_POST[nisn]','$kelas[kode_kelas]','$_POST[a]','$_POST[b]','$_POST[c]','$_SESSION[id]','" . date('Y-m-d H:i:s') . "')");
    }
    echo "<script>document.location='index_guru.php?view=extrakulikuler_wakel&tahun=$_GET[tahun]&kelas=$kelas[kode_kelas]#$_POST[nisn]';</script>";
  }

  if (isset($_GET[delete])) {
    mysqli_query($koneksi, "DELETE FROM nilai_extrakulikuler where id_nilai_extrakulikuler='$_GET[delete]'");
    echo "<script>document.location='index_guru.php?view=extrakulikuler_wakel&tahun=$_GET[tahun]&kelas=$kelas[kode_kelas]#$_POST[nisn]';</script>";
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
        <h3 class="box-title">Input Extrakulikuler Siswa</h3>
        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
          <input type="hidden" name='view' value='extrakulikuler_wakel'>
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
          echo "<table id='example' class='table table-bordered table-striped'>
                    <thead>
                      <tr><th rowspan='2'>No</th>
                        <th>NISN</th>
                        <th width='170px'>Nama Siswa</th>
                        <th width='240px'><center>Kegiatan Extrakulikuler</center></th>
                        <th><center>Nilai</center></th>
                        <th><center>Deskripsi</center></th>
                        <th><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>";
                    $kelas =  mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas where nip='$_SESSION[id]' "));
                    $tampil = mysqli_query($koneksi, "SELECT a.* , c.nama_kelas FROM siswa a JOIN jenis_kelamin b ON a.id_jenis_kelamin=b.id_jenis_kelamin JOIN kelas c ON c.kode_kelas=a.kode_kelas where a.kode_kelas='$kelas[kode_kelas]' ORDER BY a.id_siswa");
                    $no = 1;
          while ($r = mysqli_fetch_array($tampil)) {
            if (isset($_GET[edit])) {
              $e = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai_extrakulikuler where id_nilai_extrakulikuler='$_GET[edit]'"));
              $name = 'Update';
            } else {
              $name = 'Simpan';
            }

            if ($_GET[nisn] == $r[nisn]) {
              echo "<form action='index_guru.php?view=extrakulikuler_wakel&tahun=$_GET[tahun]&kelas=$kelas[kode_kelas]' method='POST'>
                            <tr><td>$no</td>
                              <td>$r[nisn]</td>
                              <td style='font-size:12px' id='$r[nisn]'>$r[nama]</td>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <input type='hidden' name='id' value='$e[id_nilai_extrakulikuler]'>
                              <input type='hidden' name='status' value='$name'>
                              <td><input type='text' name='a' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Kegiatan...' value='$e[kegiatan]'></td>
                              <td><center><input type='text' class='form-control'  name='b' value='$e[nilai]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><input type='text' name='c' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...' value='$e[deskripsi]'></td>
                              <td align=center><input type='submit' name='simpan' class='btn btn-xs btn-primary' style='width:65px' value='$name'>
                              <button type='reset' class='btn btn-xs btn-danger'>Batal</button></td>
                            </tr>
                          </form>";
            } else {
              echo "<form action='index_guru.php?view=extrakulikuler_wakel&tahun=$_GET[tahun]&kelas=$kelas[kode_kelas]' method='POST'>
                            <tr><td>$no</td>
                              <td>$r[nisn]</td>
                              <td style='font-size:12px' id='$r[nisn]'>$r[nama]</td>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <td><input type='text' name='a' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Kegiatan...'></td>
                              <td><center><input type='text' class='form-control'  name='b' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><input type='text' name='c' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Deskripsi...'></td>
                              <td><input type='submit' name='simpan' class='btn btn-xs btn-primary' style='width:65px' value='$name'>
                              <button type='reset' class='btn btn-xs btn-danger'>Batal</button></td>
                            </tr>
                          </form>";
            }

            $pe = mysqli_query($koneksi, "SELECT * FROM nilai_extrakulikuler where id_tahun_akademik='$_GET[tahun]' AND nisn='$r[nisn]' AND kode_kelas='$kelas[kode_kelas]'");
            while ($n = mysqli_fetch_array($pe)) {
              echo "<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>$n[kegiatan]</td>
                                        <td align=center>$n[nilai]</td>
                                        <td>$n[deskripsi]</td>
                                        <td align=center><a href='index_guru.php?view=extrakulikuler_wakel&tahun=" . $_GET[tahun] . "&kelas=" .$kelas[kode_kelas] . "&edit=" . $n[id_nilai_extrakulikuler] . "&nisn=" . $r[nisn] . "#$r[nisn]' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-edit'></span></a>
                                                        <a href='index_guru.php?view=extrakulikuler_wakel&tahun=" . $_GET[tahun] . "&kelas=" . $kelas[kode_kelas] . "&delete=" . $n[id_nilai_extrakulikuler] . "&nisn=" . $r[nisn] . "' class='btn btn-xs btn-danger' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a></td>
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