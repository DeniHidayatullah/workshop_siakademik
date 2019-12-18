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
					text: 'Internet Browser Statistics '
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
								return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
							}
						}
					}
				 },
       
					series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
					<?php
						$query = mysqli_query($koneksi,"SELECT browsername from browser");
					 
						while ($row = mysqli_fetch_array($query)) {
							$browsername = $row['browsername'];
						 
							$data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT total from browser where browsername='$browsername'"));
							$jumlah = $data['total'];
							?>
							[ 
								'<?php echo $browsername ?>', <?php echo $jumlah; ?>
							],
							<?php
						}
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
					<div id ="mygraph"></div>
        <script src="plugins/highchart/highcharts.js"></script>
        <script src="plugins/highchart/modules/data.js"></script>
        <script src="plugins/highchart/modules/exporting.js"></script>
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
					text: 'Internet Browser Statistics '
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
								return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
							}
						}
					}
				 },
       
					series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
					<?php
						$query = mysqli_query($koneksi,"SELECT browsername from browser");
					 
						while ($row = mysqli_fetch_array($query)) {
							$browsername = $row['browsername'];
						 
							$data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT total from browser where browsername='$browsername'"));
							$jumlah = $data['total'];
							?>
							[ 
								'<?php echo $browsername ?>', <?php echo $jumlah; ?>
							],
							<?php
						}
						?>
			 
					]
				}]
			  });
		});	
</script>

    </div><!-- /.chat -->
</div><!-- /.box (chat box) -->