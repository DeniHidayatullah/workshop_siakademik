<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $nama; ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <ul class="sidebar-menu">
    <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
    <li><a href="index_siswa.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="index_siswa.php?view=jadwalmapel"><i class="fa fa-tag"></i> <span>Jadwal Pelajaran</span></a></li>
    <li><a href="index_siswa.php?view=absensi"><i class="fa fa-th-large"></i> <span>Absensi Siswa</span></a></li>
    <li class="treeview">
      <a href="#"><i class="fa fa-calendar"></i> <span>Laporan Nilai Siswa</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index_siswa.php?view=raportuts&act=detailsiswa"><i class="fa fa-circle-o"></i> Data Nilai UTS</a></li>
        <li><a href="index_siswa.php?view=raport&act=detailsiswa"><i class="fa fa-circle-o"></i> Data Nilai Raport</a></li>
      </ul>
    </li>
    <!--<li><a href="index.php?view=dokumentasi"><i class="fa fa-book"></i> <span>Panduan Penggunaan</span></a></li>-->
  </ul>
</section>