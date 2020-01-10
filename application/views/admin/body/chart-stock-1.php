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
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Stock (Count)</div>
              <?php foreach($total as $totalstock){?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalstock->totalstock?></div>
              <?php }?>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Stock (Quantity)</div>
              <?php foreach($total as $totalquantity){?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalquantity->totalquantity?></div>
              <?php }?>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Heading -->
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-0" style="float: left; width: 500px;">
        <h3>Stock Chart</h3>
      </div>
    </div>


    <div class="card-body" id="viewgraph">
      <div id="piechart" style="margin-left: 200px;"></div>
    </div>
  </div>
 
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      <?php
      foreach ($data as $key => $row) {
        echo "['".$row['name']."', ".$row['total']."],";
        }
      ?>
    ]);
    
    var options = {
        title: '',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>

<!-- <input type="hidden" id="id_client" name="id_client"> -->