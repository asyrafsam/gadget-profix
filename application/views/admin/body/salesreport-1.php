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
                  <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-barcode"></i> <span class="badge">BARCODE/LABEL</a></li>
                  <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-word"></i> <span class="badge">WORD</a></li>
                  <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-excel"></i> <span class="badge">EXCEL</a></li>
                  <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-pdf"></i> <span class="badge">PDF</a></li>
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
                  <th>Check</th>
                  <th>Code</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>Items</th>
                  <th>Total</th>
                  <th>Tax</th>
                  <th>Paid</th>
                  <th>Balance</th>
                  <th>Payment Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Check</th>
                  <th>Code</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>Items</th>
                  <th>Total</th>
                  <th>Tax</th>
                  <th>Paid</th>
                  <th>Balance</th>
                  <th>Payment Status</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody id="tablereportsales">

              <?php 
                $test = '1';
                foreach ($sales as $p) {
                  $balance = $p->total - $p->totalpaid;
              ?>
                <tr style="background-color: #e3e6f0;">
                    <td><input type="checkbox" name=""></td>
                    <td><?php echo $p->hold_id ?></td>
                    <td><?php echo $p->date_pos?></td>
                    <td><?php echo $p->c_name?></td>
                    <td><?php echo $p->pro_name?></td>
                    <td><?php echo $p->total?></td>
                    <td><?php echo $p->totaltax ?></td>
                    <td><?php echo $p->totalpaid?></td>
                    <td><?php echo $balance?></td>
                    <?php if($p->total == $p->totalpaid){?>
                    <td><button class="btn btn-success" style="height: 30px;font-size: 12px;">Paid</button></td>
                    <?php }else{?>
                    <td><button class="btn btn-danger" style="height: 30px;font-size: 12px;">Not fully paid</button></td>
                    <?php }?>
                    <td>
                      <div class="dropdown no-arrow">
                         <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <button class="btn btn-primary" style="font-size: 12px">Action</button>
                         </a>
                         <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                           <div class="dropdown-header">Action :</div>
                           <a class="dropdown-item" href="#"><i class="fa fa-fw fa-eye"> &nbsp;Sale Details</i></a>
                           <a class="dropdown-item" href="#"><i class="fa fa-fw fa-print"> &nbsp;&nbsp;View Sale</i></a>
                           <a class="dropdown-item" href="#"><i class="fa fa-fw fa-cloud"> &nbsp;Email Invoice</i></a>
                           <a class="dropdown-item" href="#" onclick="view_paymentsales('<?php echo $p->hold_id?>')"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;View Payments</i></a>
                           <a class="dropdown-item" href="#"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;Add Payments</i></a>
                         </div>
                      </div>
                    </td>
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
                    url: '<?= base_url() ?>func_report/viewsalesselected',
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