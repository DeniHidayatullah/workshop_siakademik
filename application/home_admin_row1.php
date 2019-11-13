<a style='color:#000' href='index.php?view=siswa'>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <?php $siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM siswa")); ?>
                <span class="info-box-text">Siswa</span>
                <span class="info-box-number"><?php echo $siswa[total]; ?></span>
            </div>
            <!--/.info-box-content -->
        </div>
        <!--/.info-box -->
    </div>
    <!--/.col -->
</a>

<a style='color:#000' href='index.php?view=guru'>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
                <?php $guru = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM guru")); ?>
                <span class="info-box-text">Guru</span>
                <span class="info-box-number"><?php echo $guru[total]; ?></span>
            </div>
            <!--/.info-box-content -->
        </div>
        <!--/.info-box -->
    </div>
    <!--/.col -->
</a>

<a style='color:#000' href='index.php?view=bahantugas'>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <?php $jurusan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM jurusan")); ?>
                <span class="info-box-text">Jurusan</span>
                <span class="info-box-number"><?php echo $jurusan[total]; ?></span>
            </div>
            <!--/.info-box-content -->
        </div>
        <!--/.info-box -->
    </div>
    <!--/.col -->
</a>

<a style='color:#000' href='index.php?view=kelas'>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
            <div class="info-box-content">
                <?php $kelas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM kelas")); ?>
                <span class="info-box-text">kelas</span>
                <span class="info-box-number"><?php echo $kelas[total]; ?></span>
            </div>
            <!--/.info-box-content -->
        </div>
        <!--/.info-box -->
    </div>
    <!--/.col -->
</a>

abror