  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>
          <?php $siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM siswa")); ?>
          <?php echo $siswa[total]; ?></h3>

        <p>Siswa</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="index.php?view=siswa" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right "></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php $guru = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM guru")); ?>
          <?php echo $guru[total]; ?></h3>

        <p>Guru</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="index.php?view=guru" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3><?php $jurusan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM jurusan")); ?>
          <?php echo $jurusan[total]; ?></h3>

        <p>Jurusan</p>
      </div>
      <div class="icon">
        <i class="fa fa-building-o"></i>
      </div>
      <a href="index.php?view=jurusan" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php $kelas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM kelas")); ?>
          <?php echo $kelas[total]; ?></h3>

        <p>Kelas</p>
      </div>
      <div class="icon">
        <i class="fa fa-institution"></i>
      </div>
      <a href="index.php?view=kelas" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->