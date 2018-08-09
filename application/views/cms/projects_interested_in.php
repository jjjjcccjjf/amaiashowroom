

<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->

    <div id="chart_container" style="min-width: 310px; height: 800px; margin: 0 auto"></div>

    <script type="text/javascript">
    $(document).ready(function() {


      Highcharts.chart('chart_container', {
        chart: {
          type: 'bar'
        },
        title: {
          text: 'Projects interested in'
        },
        // subtitle: {
        //   text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
        // },
        xAxis: {
          categories: <?php echo $projects_json ?>,
          title: {
            text: null
          }
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Number of interests',
            align: 'high'
          },
          labels: {
            overflow: 'justify'
          }
        },
        tooltip: {
          valueSuffix: ' people interested'
        },
        plotOptions: {
          bar: {
            dataLabels: {
              enabled: true
            }
          }
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'top',
          x: -40,
          y: 80,
          floating: true,
          borderWidth: 1,
          backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
          shadow: true
        },
        credits: {
          enabled: false
        },
        series: <?php echo $series_json ?>
      });


    }); // end document ready

    </script>

    <!-- page end-->
  </section>
</section>
<!--main content end-->

<script src="<?php echo base_url('public/highcharts/') ?>highcharts.js"></script>
<script src="<?php echo base_url('public/highcharts/') ?>modules/exporting.js"></script>
<script src="<?php echo base_url('public/highcharts/') ?>modules/export-data.js"></script>
