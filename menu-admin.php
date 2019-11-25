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

  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
    <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

    <li class="treeview">
      <a href="#"><i class="fa fa-th"></i> <span>Data Master</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index.php?view=identitas"><i class="fa fa-circle-o"></i> Data Identitas Sekolah</a></li>
        <li><a href="index.php?view=tahunakademik"><i class="fa fa-circle-o"></i> Data Tahun Akademik</a></li>
        <li><a href="index.php?view=ruangan"><i class="fa fa-circle-o"></i> Data Ruangan</a></li>
        <li><a href="index.php?view=jurusan"><i class="fa fa-circle-o"></i> Data Jurusan</a></li>
        <li><a href="index.php?view=kelas"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
        <li><a href="index.php?view=statuspegawai"><i class="fa fa-circle-o"></i> Data Status Kepegawaian</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-user"></i> <span>Data Pengguna</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index.php?view=siswa"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
        <li><a href="index.php?view=guru"><i class="fa fa-circle-o"></i> Data Guru</a></li>
        <li><a href="index.php?view=wakilkepala"><i class="fa fa-circle-o"></i> Data Kepala Sekolah</a></li>
        <li><a href="index.php?view=admin"><i class="fa fa-circle-o"></i> Data Administrator</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#"><i class="fa fa-tag"></i> <span>Data Akademik</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index.php?view=kelompokmapel"><i class="fa fa-circle-o"></i> Data Kelompok Mapel</a></li>
        <li><a href="index.php?view=matapelajaran"><i class="fa fa-circle-o"></i> Data Mata Pelajaran</a></li>
        <li><a href="index.php?view=jadwalpelajaran"><i class="fa fa-circle-o"></i> Data Jadwal Pelajaran</a></li>
        <li><a href="index.php?view=kompetensidasar"><i class="fa fa-circle-o"></i>Data Kompetensi Dasar</a></li>
        <li><a href="index.php?view=predikat"><i class="fa fa-circle-o"></i>Data Rentang Nilai</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-th-large"></i> <span>Data Absensi</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index.php?view=absensiswa"><i class="fa fa-circle-o"></i> Absensi Siswa</a></li>
        <li><a href="index.php?view=rekapabsensiswa"><i class="fa fa-circle-o"></i> Rekap Absensi Siswa</a></li>
      </ul>
    </li>

    <li><a href="index.php?view=journalkbm"><i class="fa fa-tags"></i><span>Journal KBM</span></a></li>
    <li class="treeview">
      <a href="#"><i class="fa fa-calendar"></i> <span>Laporan Nilai Siswa</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index.php?view=raportuts"><i class="fa fa-circle-o"></i> Data Nilai UTS</a></li>
        <li><a href="index.php?view=raportcetakuts"><i class="fa fa-circle-o"></i> Cetak Raport UTS</a></li>

        <li><a href="index.php?view=capaianhasilbelajar"><i class="fa fa-circle-o"></i> Data Capaian Belajar</a></li>
        <li><a href="index.php?view=extrakulikuler"><i class="fa fa-circle-o"></i> Data Extrakulikuler</a></li>
        <li><a href="index.php?view=prestasi"><i class="fa fa-circle-o"></i> Data Prestasi</a></li>
        <li><a href="index.php?view=raport"><i class="fa fa-circle-o"></i> Data Nilai Raport</a></li>
        <li><a href="index.php?view=raportcetak"><i class="fa fa-circle-o"></i> Cetak Raport</a></li>
      </ul>
    </li>
    <li><a href="index.php?view=kalender"><i class="fa fa-calendar-times-o"></i> <span>Kalender Akademik</span></a></li>
    <li><a href="index.php?view=dokumentasi"><i class="fa fa-book"></i> <span>Panduan Penggunaan</span></a></li>
  </ul>
</section>