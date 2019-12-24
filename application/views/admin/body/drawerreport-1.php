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
button{
  font-size: 13px;
}

  .flex-reparation{
    display: flex;
    flex-flow: row;
    /*height: 400px;
    overflow-x: auto;*/
  }
  .flex-child{
    display: flex;
    flex-flow: row;
    flex-wrap: wrap;
  }
  .flex-row{
    display: flex;
    flex-flow: row;
    flex-wrap: wrap;
  }
  .span-modal{
    height: 38px;
  }
  .table-border-custom, td{
    border:1px solid #fff;
  }
  .text-area{
    margin-top: 10%;
  }
  .testing{
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  #datepicker{
    z-index:1151 !important;
  }
  #signature {
    width: 100%;
    height: auto;
    border: 1px solid black;
}
</style>
<div class="container-fluid">
<?php 
    $random = rand();
     echo $hold_value = '<input type="hidden" id="hold_value" value="'.$random.'">'
  ?>
<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sales Report <i class="fas fa-clipboard-list"></i></h1>
    <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="header-card col-md-3 py-2" style="float: left; width: 500px;" style="text-decoration: none;">
          <!-- <a class="" style="text-decoration: none;" href="<?php echo base_url('admin/add_stock'); ?>"> -->
            <!-- <button class="btn btn-dark" style="text-align: left;height: 33px"><h6 class="font-weight-bold center">+ New Product</h6></button> -->
            <input type="text" name="daterange" onsubmit="daterange();" class="form-control" style="float: left; width: 500px;">
          <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
          <!-- </a> -->
        </div>
        <div class="container">
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i><i class="fas fa-fw fa-print"></i> Export <span class="badge"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url(). 'func_excel/excel_sales/'.$random; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-excel"></i> <span class="badge">EXCEL</a></li>
                  <li><a href="<?php echo base_url(). 'func_pdf/pdf_sales/'.$random; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-pdf"></i> <span class="badge">PDF</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <hr>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;color: #000;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Opened By</th>
                  <th>Open Time</th>
                  <th>Cash in Hand</th>
                  <th>Closed By</th>
                  <th>Close Time</th>
                  <th>Closing Cash</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Opened By</th>
                  <th>Open Time</th>
                  <th>Cash in Hand</th>
                  <th>Closed By</th>
                  <th>Close Time</th>
                  <th>Closing Cash</th>
                </tr>
              </tfoot>
              <tbody id="tablereportsales">

              <?php 
                $test = '1';
                foreach ($drawer as $p) {
              ?>
                <tr style="background-color: #e3e6f0;">
                    <td><?php echo $p->id ?></td>
                    <td><?php echo $p->openBy?></td>
                    <td><?php echo $p->closedTime?></td>
                    <td><?php echo $p->openingCash?></td>
                    <td><?php echo $p->closedBy?></td>
                    <td><?php echo $p->closedTime?></td>
                    <td><?php echo $p->closingCash ?></td>
                </tr>
              <?php
                }
              ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  $(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    daterange(start,end);
  });
});
  function convert(str) {
    var date = new Date(str),
        mnth = ("0" + (date.getMonth()+1)).slice(-2),
        day  = ("0" + date.getDate()).slice(-2);
        hours  = ("0" + date.getHours()).slice(-2);
        minutes = ("0" + date.getMinutes()).slice(-2);
    return [ date.getFullYear(), mnth, day ].join("-");
}
  function daterange(start,end){
    var whatSTART = convert(start);
    var whatEND = convert(end);

    var data = {'start':whatSTART,'end':whatEND}
    $.ajax({
                    url: '<?= base_url() ?>func_report/viewdrawerselected',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

                        $('#tablereportsales').html(response);
                    }
            });
      
  }
</script>
<input type="hidden" id="id_sales" name="id_sales">