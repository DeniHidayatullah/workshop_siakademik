<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIAKAD | Log in</title>
  <link rel="stylesheet" type="text/css" href="login.css" />
  <link rel="stylesheet" type="text/css" href="animate.css" />

  <style>
    .sub {
      width: 100%;
      padding-top: 5px;
      height: 55px;
      border-radius: 10px 10px 0 0;
      background: #066;
      color: #fff;
      float: left;
      margin-bottom: 30px;
    }

    .img {
      width: 71px;
      height: 50px;
      float: left;
      margin-left: 15px;
    }

    .teks {
      float: left;
      padding-top: 3px;
      margin-left: 15px;
      width: auto;
      height: 40px;
    }
  </style>
</head>

<body>
  <div class="wadah animated bounceInDown">
    <div class="sub">
      <div class="img"><img src="gambar/logo.png" width="50" /></div>
      <div class="teks">
        <font size="+2">SMK NEGERI 7 JEMBER</font><br />
        <center>
          <font size="-1">Dinas pendidikan Provinsi Jawa Timur </font>
      </div>
      </center>
      <div class="img"><img src="gambar/Logo-Provinsi-Jawa-Timur.png" height="50" /></div>
    </div>

    <form method="post" action="">
      <table width="90%" style="margin-left:5%;" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td><input type="text" class="tf" required="required" name="a" placeholder="Username" /></td>
        </tr>
        <tr>
          <td><input type="password" class="tf" required="required" name="b" placeholder="Password" /></td>
        </tr>
        <tr>
          <td><button type="submit" name='login' class="button">Login</button></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>

<?php

if (isset($_POST[login])) {
  $passlain = anti_injection($_POST[b]);
  $data = md5(anti_injection($_POST[b]));
  $pass = hash("sha512", $data);
  $admin = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . anti_injection($_POST[a]) . "' AND password='$pass'");
  $guru = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='" . anti_injection($_POST[a]) . "' AND password='$passlain'");
  $siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='" . anti_injection($_POST[a]) . "' AND password='$passlain'");

  $hitungadmin = mysqli_num_rows($admin);
  $hitungguru = mysqli_num_rows($guru);
  $hitungsiswa = mysqli_num_rows($siswa);
  if ($hitungadmin >= 1) {
    $r = mysqli_fetch_array($admin);
    $_SESSION[id]     = $r[id_user];
    $_SESSION[namalengkap]  = $r[nama_lengkap];
    $_SESSION[level]    = $r[level];
    echo "<script>document.location='index.php';</script>";
  } elseif ($hitungguru >= 1) {
    $r = mysqli_fetch_array($guru);
    $_SESSION[id]     = $r[nip];
    $_SESSION[namalengkap]  = $r[nama_guru];
    $_SESSION[level]    = 'guru';
    echo "<script>document.location='index_guru.php';</script>";
  } elseif ($hitungsiswa >= 1) {
    $r = mysqli_fetch_array($siswa);
    $_SESSION[id]     = $r[nisn];
    $_SESSION[namalengkap]  = $r[nama];
    $_SESSION[kode_kelas]     = $r[kode_kelas];
    $_SESSION[angkatan]     = $r[angkatan];
    $_SESSION[level]    = 'siswa';
    echo "<script>document.location='index_siswa.php';</script>";
  } else {
    echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses');
    window.location=('index.php?view=login')</script>";
  }
}
?>