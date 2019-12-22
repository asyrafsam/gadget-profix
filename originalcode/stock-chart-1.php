<style type="text/css">

  .navbar-findcond { background: #fff; border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
.navbar-findcond a { color: #f14444; }
.navbar-findcond ul.navbar-nav a { color: #f14444; border-style: solid; border-width: 0 0 2px 0; border-color: #fff; }
.navbar-findcond ul.navbar-nav a:hover,
.navbar-findcond ul.navbar-nav a:visited,
.navbar-findcond ul.navbar-nav a:focus,
.navbar-findcond ul.navbar-nav a:active { background: #fff; }
.navbar-findcond ul.navbar-nav a:hover { border-color: #f14444; }
.navbar-findcond li.divider { background: #ccc; }
.navbar-findcond button.navbar-toggle { background: #f14444; border-radius: 2px; }
.navbar-findcond button.navbar-toggle:hover { background: #999; }
.navbar-findcond button.navbar-toggle > span.icon-bar { background: #fff; }
.navbar-findcond ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
.navbar-findcond ul.dropdown-menu > li > a { color: #444; }
.navbar-findcond ul.dropdown-menu > li > a:hover { background: #f14444; color: #fff; }
.navbar-findcond span.badge { background: #f14444; font-weight: normal; font-size: 11px; margin: 0 4px; }
.navbar-findcond span.badge.new { background: rgba(255, 0, 0, 0.8); color: #fff; }

thead, tfoot{
  color: #000;
  font-weight: bold;
}
.header-card{
  padding: 0px;
}
  .flex-reparation{
    display: flex;
    flex-flow: row;
    /*height: 400px;*/
    overflow-x: auto;
  }
  .flex-child{
    display: flex;
    flex-flow: row;
    /*height: 300px;*/
  }
  .flex-row{
    display: flex;
    flex-flow: row;
    flex-wrap: wrap;
  }
  .span-modal{
    height: 38px;
  }
  label{
    text-align: right;
  }
  .total{
    display: flex;
    flex-flow: row;

  }
</style>
<div class="container-fluid">
  <?php 
    $random = rand();
     echo $hold_value = '<input type="hidden" id="hold_value" value="'.$random.'">'
  ?>
  
  <!-- Page Heading -->
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-0" style="float: left; width: 500px;">
        <h3>Revenue Report</h3>
      </div>
    </div>


    <div class="card-body" id="viewgraph">
      <div id="piechart" style="margin-left: 180px;"></div>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-0" style="float: left; width: 500px;">
      </div>
    </div>


    <div class="card-body">
      <div class="col-lg-12">
        
      <div class="form-group input-group col-lg-6">
        <div class="total">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-fw fa-barcode"></i> </span>
          </div>
          <input type="month" name="month" id="month" class="form-control">
          <button class="btn btn-success col-lg-2" type="submit" onclick="viewgraph()" >Update</button>
          <div style="margin-left: 400px;margin-top: 7px;">
            
          </div>
        </div>
          
      </div>
        
      </div>

    </div>
  </div>
   
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var test = <?php echo $jsonecjo; ?>;
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['12', '23']
  // [<?php echo $data;?>],

]);

  // Optional; add a title and set the width and height of the chart
  // var options = {'title':'My Average Day', 'width':1000, 'height':800};
  var options = {'title':'', 'width':900, 'height':500};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

<!-- <input type="hidden" id="id_client" name="id_client"> -->


[data] => Array
        (
            [total_revenue] => 165.00
            [product_cost] => 55.00
            [product_quantity] => 36
        )

        [
          [['name'] => total_revenue, ['value'] => 123.00]
        ]