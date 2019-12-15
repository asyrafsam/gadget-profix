<div id="graphselect"></div>
<script type="text/javascript">
	Morris.Area({
      element: 'graphselect',
      data: <?php echo $data;?>,
      xkey: 'pay_date',
      ykeys: ['totalpaid'],
      labels: ['Sales'],
      xLabels: 'day',
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['green'],
      pointStrokeColors: ['7BB32E'],
      lineColors:['#7BB32E','red']
    });
</script>