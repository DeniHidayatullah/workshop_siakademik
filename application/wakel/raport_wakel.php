<?php
if ($_GET[act] == '') {
  cek_session_guru();
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
        <h3 class="box-title"><?php if (isset($_GET[kelas]) and isset($_GET[tahun])) {
                                  echo "Input Nilai Siswa";
                                } else {
                                  echo "Input Nilai Siswa " . date('Y');
                                } ?></h3>
        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
          <input type="hidden" name='view' value='raport_wakel'>
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
          <input type="submit" style='margin-top:-4px' class='btn btn-success btn-sm' value='Lihat'>
        </form>

      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style='width:20px'>No</th>
              <th>Jadwal Pelajaran</th>
              <th>Kelas</th>
              <th>Guru</th>
              <th>Hari</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Ruang</th>
              <?php
                if (isset($_GET[tahun]) and isset($_GET[tahun])) {
                  if ($_SESSION[level] != 'kepala') {
                    echo "<th><center>Penilaian</center></th>";
                  }
                }
                ?>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($_GET[tahun])) {
                $tampil = mysqli_query($koneksi, "SELECT a.*, e.nama_kelas, b.namamatapelajaran, b.kode_pelajaran, c.nama_guru, d.nama_ruangan FROM jadwal_pelajaran a 
                                    JOIN mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran
                                      JOIN guru c ON a.nip=c.nip 
                                        JOIN ruangan d ON a.kode_ruangan=d.kode_ruangan
                                          JOIN kelas e ON a.kode_kelas=e.kode_kelas 
                                          where e.nip='$_SESSION[id]' 
                                            AND a.id_tahun_akademik='$_GET[tahun]'  ORDER BY a.hari DESC");
              } else {
                $tampil = mysqli_query($koneksi, "SELECT a.*, e.nama_kelas, b.namamatapelajaran, b.kode_pelajaran, c.nama_guru, d.nama_ruangan FROM jadwal_pelajaran a 
                                    JOIN mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran
                                      JOIN guru c ON a.nip=c.nip 
                                        JOIN ruangan d ON a.kode_ruangan=d.kode_ruangan
                                        JOIN kelas e ON a.kode_kelas=e.kode_kelas 
                                          where a.nip='$_SESSION[id]' 
                                              AND a.id_tahun_akademik LIKE '" . date('Y') . "%' ORDER BY a.hari DESC");
              }
              $no = 1;
              while ($r = mysqli_fetch_array($tampil)) {
                echo "<tr><td>$no</td>
                              <td>$r[namamatapelajaran]</td>
                              <td>$r[nama_kelas]</td>
                              <td>$r[nama_guru]</td>
                              <td>$r[hari]</td>
                              <td>$r[jam_mulai]</td>
                              <td>$r[jam_selesai]</td>
                              <td>$r[nama_ruangan]</td>";
                if (isset($_GET[tahun])) {
                  if ($_SESSION[level] != 'kepala') {
                    echo "<td style='width:280px !important'><center>
                                          <a class='btn btn-warning btn-xs' title='Lihat Nilai Sikap Siswa' href='index_guru.php?view=raport&act=listsiswasikap&jdwl=$r[kodejdwl]&kd=$r[kode_pelajaran]&id=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-th-list'></span> Sikap</a>
                                          <a class='btn btn-success btn-xs' title='Lihat Nilai Pengetahuan Siswa' href='index_guru.php?view=raport&act=listsiswa&jdwl=$r[kodejdwl]&kd=$r[kode_pelajaran]&id=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-th-list'></span> Pengetahuan</a>
                                          <a class='btn btn-primary btn-xs' title='Lihat Nilai Keterampilan Siswa' href='index_guru.php?view=raport&act=listsiswaketerampilan&jdwl=$r[kodejdwl]&kd=$r[kode_pelajaran]&id=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-th-list'></span> Keterampilan</a>
                                        </center></td>";
                  }
                }
                echo "</tr>";
                $no++;
              }
              ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div>
  </div>

<?php
} elseif ($_GET[act] == 'listsiswa') {
  cek_session_guru();
  include "application/raport/raport_nilai_pengetahuan.php";
} elseif ($_GET[act] == 'listsiswaketerampilan') {
  cek_session_guru();
  include "application/raport/raport_nilai_keterampilan.php";
} elseif ($_GET[act] == 'detailguru') {
  cek_session_guru();
  include "guru/raport_halaman_guru.php";
} elseif ($_GET[act] == 'detailsiswa') {
  cek_session_siswa();
  include "siswa/raport_halaman_siswa.php";
} elseif ($_GET[act] == 'listsiswasikap') {
  cek_session_guru();
  include "application/raport/raport_nilai_sikap.php";
}
?>