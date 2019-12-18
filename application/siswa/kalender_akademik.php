<?php if ($_GET[act] == '') { ?>
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Kalender Akademik </h3>
       </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example" class="table table-bordered table-striped">
          <thead>
          </thead>
          <tbody>
            <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM kalender_akademik  ORDER BY id_kalender_akademik DESC");
              $no = 1;
              while ($r = mysqli_fetch_array($tampil)) {
                echo "<tr><td>";
                if (trim($s[foto]) == '') {
                  echo "<img class='img-thumbnail' style='width:100%' src='foto_kalender/$r[foto]'>";
                } else {
                  echo "<img class='img-thumbnail' style='width:155px' src='foto_kalender/$r[foto]'>";
                }
                echo "</tr>";
                $no++;
              }
              ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>

<?php } ?>