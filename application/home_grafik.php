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
                </tr>
            </thead>
            <tbody>
                <?php
                $grafik = mysqli_query($koneksi, "SELECT * FROM jurusan a join siswa b on a.kode_jurusan=b.kode_jurusan");
                while ($r = mysqli_fetch_array($grafik)) {
                    $ale = tgl_grafik($r[angkatan]);
                    $siswa = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_jurusan='TKJ'"));
                    $guru = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_jurusan='MM' "));
                    $superuser = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa where kode_jurusan='TSM'"));
                    echo "<tr>
                    <th>$ale</th>
                    <td>$siswa</td>
                    <td>$guru</td>
                    <td>$superuser</td>
                  </tr>";
                }
                ?>
            </tbody>
        </table>
    </div><!-- /.chat -->
</div><!-- /.box (chat box) -->