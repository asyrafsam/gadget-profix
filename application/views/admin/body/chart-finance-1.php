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
</style>
<div class="container-fluid">
  <?php 
    $random = rand();
     echo $hold_value = '<input type="hidden" id="hold_value" value="'.$random.'">'
  ?>
  
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Finance Chart</h1>
  <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-0" style="float: left; width: 500px;">
        <h3>Revenue Report</h3>
      </div>
    </div>


    <div class="card-body">
      <div id="graph"></div>

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
        <div class="input-group-prepend">
          <span class="input-group-text"> <i class="fas fa-fw fa-barcode"></i> </span>
        </div>
          <input name="pcode" class="form-control" placeholder="Product Code" type="text">
          <button class="btn btn-success col-lg-3">Update</button>
          <h4 style="float: left;">Total:</h4>
      </div>
        
      </div>

    </div>
  </div>
   
<script type="text/javascript">
  Morris.Area({
      element: 'graph',
      data: <?php echo $data;?>,
      xkey: 'mon',
      ykeys: ['totalpaid'],
      labels: ['Sales'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['green'],
      pointStrokeColors: ['7BB32E'],
      lineColors:['#7BB32E','red']
    });
</script>

<!-- <input type="hidden" id="id_client" name="id_client"> -->