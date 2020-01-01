<!-- TAMPIL DATA USER @MHA -->
<?php if ($_GET[act] == '') { ?>
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Administrator </h3>
        <a class='pull-right btn btn-primary btn-sm' href='index.php?view=admin&act=tambah'>Tambahkan Data Admin</a>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style='width:30px'>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Alamat Email</th>
              <th>No Telpon</th>
              <th>Jabatan</th>
              <th>Level</th>
              <th style='width:70px'>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM users where level='superuser' ORDER BY id_user DESC");
              $no = 1;
              while ($r = mysqli_fetch_array($tampil)) {
                echo "<tr><td>$no</td>
                              <td>$r[username]</td>
                              <td>$r[nama_lengkap]</td>
                              <td>$r[email]</td>
                              <td>$r[no_telpon]</td>
                              <td>$r[jabatan]</td>
                              <td>$r[level]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='?view=admin&act=edit&id=$r[id_user]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='?view=admin&hapus=$r[id_user]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>";
                echo "</tr>";
                $no++;
              }
              // HAPUS USER @MHA
              if (isset($_GET[hapus])) {
                mysqli_query($koneksi, "DELETE FROM users where id_user='$_GET[hapus]'");
                echo "<script>document.location='index.php?view=admin';</script>";
              }

              ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  <!-- EDIT USER @MHA -->
<?php
} elseif ($_GET[act] == 'edit') {
  if (isset($_POST[update])) {
    $data = md5($_POST[b]);
    $passs = hash("sha512", $data);
    if (trim($_POST[b]) == '') {
      mysqli_query($koneksi, "UPDATE users SET username = '$_POST[a]',
                                                nama_lengkap = '$_POST[c]',
                                                email = '$_POST[d]',
                                                no_telpon = '$_POST[e]',
                                                jabatan = '$_POST[f]' where id_user='$_POST[id]'");
    } else {
      mysqli_query($koneksi, "UPDATE users SET username = '$_POST[a]',
                                                password = '$passs',
                                                nama_lengkap = '$_POST[c]',
                                                email = '$_POST[d]',
                                                no_telpon = '$_POST[e]',
                                                jabatan = '$_POST[f]' where id_user='$_POST[id]'");
    }
    echo "<script>document.location='index.php?view=admin';</script>";
  }
  $edit = mysqli_query($koneksi, "SELECT * FROM users a where a.id_user='$_GET[id]'");
  $s = mysqli_fetch_array($edit);
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Administrator</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[id_user]'>
                    <tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='a' value='$s[username]'> </td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='text' class='form-control' name='b' placeholder='Kosongkan saja Jika Password tidak diganti,...'></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' name='c' value='$s[nama_lengkap]'></td></tr>
                    <tr><th scope='row'>Alamat Email</th>           <td><input type='text' class='form-control' name='d' value='$s[email]'></td></tr>
                    <tr><th scope='row'>No Telpon</th>              <td><input type='text' class='form-control' name='e' value='$s[no_telpon]'></td></tr>
                    <tr><th scope='row'>Jabatan</th>                <td><input type='text' class='form-control' name='f' value='$s[jabatan]'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Edit</button>
                    <a href='index.php?view=admin'><button type='button' class='btn btn-danger'>Kembali</button></a>
                  </div>
              </form>
            </div>";
}elseif ($_GET[act] == 'ubahpassword') {
  if (isset($_POST[ubah])) {
    $data = md5($_POST[b]);
    $passs = hash("sha512", $data);
      mysqli_query($koneksi, "UPDATE users SET password = '$passs' where id_user='$_POST[id]'");
    
    echo "<script>document.location='index.php';</script>";
  }
  $edit = mysqli_query($koneksi, "SELECT * FROM users a where a.id_user='$_GET[id]'");
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
                    <input type='hidden' name='id' value='$s[id_user]'>
                    <tr><th scope='row'>Password</th>               <td><input type='text' class='form-control' name='b' placeholder='Kosongkan saja Jika Password tidak diganti,...'></td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='ubah' class='btn btn-info'>Ubah</button>
                    <a href='index.php'><button type='button' class='btn btn-danger'>Kembali</button></a>
                  </div>
              </form>
            </div>";
// TAMBAH USER @MHA
} elseif ($_GET[act] == 'tambah') {
  if (isset($_POST[tambah])) {
    $data = md5($_POST[b]);
    $passs = hash("sha512", $data);
    mysqli_query($koneksi, "INSERT INTO users VALUES('','$_POST[a]','$passs','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','superuser','Y')");
    echo "<script>document.location='index.php?view=admin';</script>";
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
                    <input type='hidden' name='id' value='$s[id_user]'>
                    <tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='a'> </td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='text' class='form-control' name='b'></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' name='c'></td></tr>
                    <tr><th scope='row'>Alamat Email</th>           <td><input type='text' class='form-control' name='d' value='$s[email]'></td></tr>
                    <tr><th scope='row'>No Telpon</th>              <td><input type='text' class='form-control' name='e' value='$s[no_telpon]'></td></tr>
                    <tr><th scope='row'>Jabatan</th>                <td><input type='text' class='form-control' name='f' value='$s[jabatan]'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=admin'><button type='button' class='btn btn-danger'>Kembali</button></a>
                  </div>
              </form>
            </div>";
}
?>