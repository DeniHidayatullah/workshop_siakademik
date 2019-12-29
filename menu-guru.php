<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $nama; ?></p>
      <p><a href="#"><i class="fa fa-circle text-success"></i> Online</a></p>
    </div>
  </div>

  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
    <li><a href="index_guru.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="index_guru.php?view=jadwalguru"><i class="fa fa-th-large"></i> <span>Jadwal Pelajaran</span></a></li>
    <li><a href="index_guru.php?view=kompetensiguru"><i class="fa fa-tags"></i> <span>Kompetensi Dasar</span></a></li>
    <li><a href="index_guru.php?view=journalguru"><i class="fa fa-list"></i> <span>Journal KBM</span></a></li>
    <li class="treeview">
      <a href="#"><i class="fa fa-calendar"></i> <span>Input Nilai Siswa</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index_guru.php?view=raportuts&act=detailguru"><i class="fa fa-circle-o"></i> Input Nilai UTS</a></li>
        <li><a href="index_guru.php?view=raport&act=detailguru"><i class="fa fa-circle-o"></i> Input Nilai Raport</a></li>
      </ul>
     </li>

    <?php
				if($_SESSION[level] == 'guru'){
          $iden = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM guru where nip='$_SESSION[id]'"));
          $nama =  $iden[nama_guru];
          $sql2=mysqli_query($koneksi,"SELECT * FROM kelas where nip='$_SESSION[id]'");
          $cekwalikelas=mysqli_num_rows($sql2);
          $kelas=mysqli_fetch_array($sql2);
				if ($cekwalikelas == 0) { } else {
					?>
				 <li class="treeview">
          <a href="#"><i class="fa fa-calendar"></i> <span>Rapot <?= $kelas['nama_kelas']; ?></span><i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
          <li><a href="index_guru.php?view=raportuts_wakel"><i class="fa fa-circle-o"></i> Data Nilai UTS</a></li>
          <li><a href="index_guru.php?view=raportcetakuts_wakel"><i class="fa fa-circle-o"></i> Cetak Raport UTS</a></li>
          <li><a href="index_guru.php?view=capaianhasilbelajar_wakel"><i class="fa fa-circle-o"></i> Data Capaian Belajar</a></li>
          <li><a href="index_guru.php?view=extrakulikuler_wakel"><i class="fa fa-circle-o"></i> Data Extrakulikuler</a></li>
          <li><a href="index_guru.php?view=prestasi_wakel"><i class="fa fa-circle-o"></i> Data Prestasi</a></li>
          <li><a href="index_guru.php?view=catatanwakel"><i class="fa fa-circle-o"></i> Data Catatan Wakel</a></li>
          <li><a href="index_guru.php?view=raport_wakel"><i class="fa fa-circle-o"></i> Data Nilai Raport</a></li>
          <li><a href="index_guru.php?view=raportcetak_wakel"><i class="fa fa-circle-o"></i> Cetak Raport</a></li>
          </ul>
        </li>
       		<?php } ?>
      <?php } ?> 
      <li><a href="index_guru.php?view=kalender"><i class="fa fa-calendar-times-o"></i> <span>Kalender Akademik</span></a></li>
  </ul>
</section>