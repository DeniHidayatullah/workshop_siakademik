<script type="text/javascript" src="plugins/jQuery/jquery.min.js"></script>


		
<script type="text/javascript">
  	var chart; 
		$(document).ready(function() {
			  chart = new Highcharts.Chart(
			  {
				  
				 chart: {
					renderTo: 'mygraph',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				 },   
				 title: {
					text: 'Jumlah siswa Menurut Jenis Kelamin '
				 },
				 tooltip: {
					formatter: function() {
						return '<b>'+
						this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
					}
				 },
				 
				
				 plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: 'green',
							formatter: function() 
							{
								return Highcharts.numberFormat(this.percentage, 2) +' % ';
							}
						}
					}
				 },
       
					series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
						<?php 
					$jumlah_laki = mysqli_query($koneksi,"select * from siswa where id_jenis_kelamin='1'");
					echo mysqli_num_rows($jumlah_laki);
					?>, 
					<?php 
					$jumlah_perempuan = mysqli_query($koneksi,"select * from siswa where id_jenis_kelamin='2'");
					echo mysqli_num_rows($jumlah_perempuan);
					?>
			 
					]
				}]
			  });
		});	
</script>

<div class="box box-info">
    <div class="box-header">
      
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <div class="box-body chat" id="chat-box">
        <script src="plugins/highchart/highcharts.js"></script>
        <script src="plugins/highchart/modules/data.js"></script>
        <script src="plugins/highchart/modules/exporting.js"></script>

					<div id ="mygraph"></div>
    </div><!-- /.chat -->
</div><!-- /.box (chat box) -->
