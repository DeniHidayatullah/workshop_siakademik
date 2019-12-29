<style type="text/css">
  .sekolah {
    float: left;
    background-color: transparent;
    background-image: none;
    padding: 15px 15px;
    font-family: fontAwesome;
    color: #fff;
  }

  .sekolah:hover {
    color: #fff;
  }
</style>
<!-- Logo -->
<a href="index.php" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini">SIA</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>SMK N 7 JEMBER</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li>
      <?php
      if ($_SESSION[level] == 'superuser') {
        echo "<a href='index.php?view=admin&act=ubahpassword&id=$_SESSION[id]'>Ubah Password</a>";
      }elseif ($_SESSION[level] == 'guru') {
        echo "<a href='index_guru.php?view=home&act=ubahpassword&id=$_SESSION[id]'>Ubah Password</a>";
      }elseif ($_SESSION[level] == 'siswa') {
        echo "<a href='index_siswa.php?view=home&act=ubahpassword&id=$_SESSION[id]'>Ubah Password</a>";
      } elseif ($_SESSION[level] == 'kepala') {
        echo "<a href='index.php?view=admin&act=edit&id=$_SESSION[id]' class='btn btn-default btn-flat'>Edit Profile</a>";
      }
      ?></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>