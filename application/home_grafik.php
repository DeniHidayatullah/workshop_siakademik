<script type="text/javascript" src="plugins/jQuery/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#container').highcharts({
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: ''
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>Jumlah Siswa ' + this.series.name + '</b><br/>' +
                        'Ada ' + this.point.y ;
                }
            }
        });
    });
</script>

<div class="box box-success">
    <div class="box-header">
        <i class="fa fa-th-list"></i>
        <h3 class="box-title">Grafik Jumlah Siswa Per Jurusan Per Tahun</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <div class="box-body chat" id="chat-box">
        <script src="plugins/highchart/highcharts.js"></script>
        <script src="plugins/highchart/modules/data.js"></script>
        <script src="plugins/highchart/modules/exporting.js"></script>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <table id="datatable" style='display:none'>
            <thead>
                <tr>
                    <th></th>
                    <th>TKJ</th>
                    <th>MM</th>
                    <th>TSM</th>
                    <th>TKR</th>
                    <th>KKR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grafik = mysqli_query($koneksi, "SELECT * FROM jurusan a join siswa b on a.kode_jurusan=b.kode_jurusan");
                while ($r = mysqli_fetch_array($grafik)) {
                    $ale = tgl_grafik($r[angkatan]);
                    $tkj = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_jurusan='TKJ' and angkatan='$r[angkatan]'"));
                    $mm = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_jurusan='MM' and angkatan='$r[angkatan]' "));
                    $tsm = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_jurusan='TSM' and angkatan='$r[angkatan]'"));
                    $tkr = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_jurusan='TKR' and angkatan='$r[angkatan]'"));
                    $kkr = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_jurusan='KKR' and angkatan='$r[angkatan]'"));
                    echo "<tr>
                    <th>$ale</th>
                    <td>$tkj</td>
                    <td>$mm</td>
                    <td>$tsm</td>
                    <td>$tkr</td>
                    <td>$kkr</td>
                  </tr>";
                }
                ?>
            </tbody>
        </table>
    </div><!-- /.chat -->
</div><!-- /.box (chat box) -->