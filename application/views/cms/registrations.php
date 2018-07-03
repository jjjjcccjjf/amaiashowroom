

<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->

    <div id="chart_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



    <script type="text/javascript">
    $(document).ready(function() {

      Highcharts.chart('chart_container', {
        chart: {
          type: 'column'
        },
        title: {
          text: 'Showroom registrations'
        },
        // subtitle: {
        //   text: 'Source: WorldClimate.com'
        // },
        xAxis: {
          categories: <?php echo $months_json ?>,
          crosshair: true
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Showroom visits'
          }
        },
        tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y}</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
        },
        plotOptions: {
          column: {
            pointPadding: 0.2,
            borderWidth: 0
          }
        },
        series: <?php echo $series_json; ?>
      });
    });

    </script>

    <!-- page end-->
  </section>
</section>
<!--main content end-->

<script src="<?php echo base_url('public/highcharts/') ?>highcharts.js"></script>
<script src="<?php echo base_url('public/highcharts/') ?>modules/exporting.js"></script>
<script src="<?php echo base_url('public/highcharts/') ?>modules/export-data.js"></script>
