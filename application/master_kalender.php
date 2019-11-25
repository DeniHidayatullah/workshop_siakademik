<?php if ($_GET[act] == '') { ?>
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Administrator </h3>
        <a class='pull-right btn btn-primary btn-sm' href='index.php?view=kalender&act=tambah'>Tambahkan Data Kalender Akademik</a>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style='width:30px'>No</th>
              <th style='width:50px'>Foto</th>
              <th style='width:10px'>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM kalender_akademik  ORDER BY id_kalender_akademik DESC");
              $no = 1;
              while ($r = mysqli_fetch_array($tampil)) {
                echo "<tr><td>$no</td>
                              <td>";
                if (trim($s[foto]) == '') {
                  echo "<img class='img-thumbnail' style='width:655px' src='foto_kalender/$r[foto]'>";
                } else {
                  echo "<img class='img-thumbnail' style='width:155px' src='foto_kalender/$r[foto]'>";
                }
                echo "</td>
                              <td><center>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='?view=kalender&hapus=$r[id_kalender_akademik]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>";
                echo "</tr>";
                $no++;
              }
              if (isset($_GET[hapus])) {
                mysqli_query($koneksi, "DELETE FROM kalender_akademik where id_kalender_akademik='$_GET[hapus]'");
                echo "<script>document.location='index.php?view=kalender';</script>";
              }

              ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
<?php
} elseif ($_GET[act] == 'tambah') {
  if (isset($_POST[tambah])) {
    $dir_gambar = 'foto_kalender/';
    $filename = basename($_FILES['ax']['name']);
    $filenamee = date("YmdHis") . '-' . basename($_FILES['ax']['name']);
    $uploadfile = $dir_gambar . $filenamee;
    if ($filename != '') {
      if (move_uploaded_file($_FILES['ax']['tmp_name'], $uploadfile)) {
        mysqli_query($koneksi, "INSERT INTO kalender_akademik VALUES('','$filenamee')");
      }
    } else {
      mysqli_query($koneksi, "INSERT INTO kalender_akademik VALUES('','')");
    }
    echo "<script>document.location='index.php?view=kalender';</script>";
  }

  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Administrator</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[id_kalender_akademik]'>
                    <tr><th scope='row'>Foto</th>             
                    <td><div style='position:relative;''>
                    <a class='btn btn-primary' href='javascript:;'>
                    <span class='glyphicon glyphicon-search'></span> Browse..."; ?>
  <input type='file' class='files' name='ax' onchange='$("#upload-file-info").html($(this).val());'>
<?php echo "</a> <span style='width:155px' class='label label-info' id='upload-file-info'></span>
                                                                        </div>
                    </td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=kalender'><button type='button' class='btn btn-danger'>Kembali</button></a>
                  </div>
              </form>
            </div>";
}
?>