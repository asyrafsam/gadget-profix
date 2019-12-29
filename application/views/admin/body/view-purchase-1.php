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
</style>
<?php 
    $random = rand();
     echo $hold_value = '<input type="hidden" id="hold_value" value="'.$random.'">'
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Purchases</h1>
<!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
<hr>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i><i class="fas fa-fw fa-print"></i> Export <span class="badge"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo base_url(). 'func_excel/excel_purchase/'.$random; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-excel"></i> <span class="badge">EXCEL</a></li>
              <li><a href="<?php echo base_url(). 'func_pdf/pdf_purchase/'.$random; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-pdf"></i> <span class="badge">PDF</a></li>
                <li><a href="<?php echo base_url(). 'func_purchase/delete_purchase_check/'.$random; ?>" onclick="return confirm('Are you sure you want to delete marked purchase?');">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-users"></i> <span class="badge">DELETE PURCHASES</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
        <thead>
          <tr>
            <th>Check</th>
            <th>Date</th>
            <th>Reference No</th>
            <th>Supplier</th>
            <th>Status</th>
            <th>Grand Total</th>
            <th>After Discount</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Check</th>
            <th>Date</th>
            <th>Reference No</th>
            <th>Supplier</th>
            <th>Status</th>
            <th>Grand Total</th>
            <th>After Discount</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <?php
          foreach ($purchase as $p) {
        ?>
        <tbody>
          <tr>
            <td style="text-align: center;"><input type="checkbox" name="checkpurchase" id="checkpurchase" onclick="getDetailPurchase(<?php echo $p->id; ?>);" ></td>
            <td><?php echo $p->pur_date?></td>
            <td><?php echo $p->pur_ref?></td>
            <td><?php echo $p->purSupplier?></td>
            <?php if($p->pur_status == 'Pending'){?>
            <td><button class="btn btn-warning" style="width: 80px;height: 30px;font-size: 12px;">Pending</button></td>
            <?php }else{?>
            <td><button class="btn btn-success" style="width: 80px;height: 30px;font-size: 12px;">Received</button></td>
            <?php }?>
            <td><?php echo $p->pur_total?></td>
            <td><?php echo $p->afterDisc?></td>
            <td>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <button class="btn btn-primary" style="font-size: 12px">Action</button>
                </a>
                <!-- <select class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                </select> -->
                <!-- <button class="dropdown-toggle btn btn-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 12px">Action</button> -->
                <div class="dropdown-menu dropdown-menu-bottom shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Export in:</div>
                  <?php if($this->session->userdata('purchaseedit') > 0){?>
                  <?php if($p->pur_status == 'Pending'){?>
                  <a class="dropdown-item" href="<?php echo base_url(). 'admin/editPurchase/'.$p->hold_id; ?>"><i class="fa fa-fw fa-edit"> &nbsp;Edit Purchase</i></a>
                  <?php }else{?>
                  <a class="dropdown-item" href="#"><i class="fa fa-fw fa-edit"> &nbsp;Uneditable Purchase</i></a>
                  <?php }?>
                  <?php }?>
                  <a class="dropdown-item" href="<?php echo base_url(). 'func_pdf/pdf_purchase_unit/'.$p->hold_id ?>"><i class="fa fa-fw fa-file-pdf"> &nbsp;&nbsp;Download Pdf</i></a>
                  <!-- <a class="dropdown-item" href="<?php echo base_url(). 'admin/purchaseBarcode/'.$p->hold_id; ?>"><i class="fa fa-fw fa-barcode"> &nbsp;Print Barcode</i></a> -->
                  <?php if($this->session->userdata('purchasedelete') > 0){?>
                  <a class="dropdown-item" href="<?php echo base_url(). 'func_purchase/deletePurchase/'.$p->hold_id; ?>"><i class="fa fa-fw fa-trash"> &nbsp;Delete Purchase</i></a>
                  <?php }?>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
        <?php
        }
        ?>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
        function getDetailPurchase(id)
        {
          $("#id_purchase").val(id);
          
        }


        //$(document).ready(function() {
        $("[name='checkpurchase']").click(function() {
            var id = $("#id_purchase").val();
            var checked = $(this).is(':checked');
            if (checked) {
                //alert('checked');
                var data = {'id':id}
                $.ajax({
                      url: '<?= base_url() ?>func_purchase/getDetailsPurchase',
                      type: 'POST',
                      dataType: 'json',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        var purid = response.id;

                        var hold_value = $("#hold_value").val();

                        storePurchase(purid,hold_value); // add 
                      }
              });


            } else {
                //alert('unchecked');
                deletePrint(id);
            }
        });


        function deletePrint(id)
        {
          var hold_value =  $("#hold_value").val();
          var data = {'id':id,'hold_value':hold_value}
          $.ajax({
                          url: '<?= base_url() ?>func_purchase/deletePrint',
                          type: 'POST',
                          dataType: 'html',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){

                          }
                  });
        }


        function storePurchase(purid,hold_value){
          var data = {'pur_id':purid,'hold_value':hold_value}
          $.ajax({
                          url: '<?= base_url() ?>func_purchase/storePurchase',
                          type: 'POST',
                          dataType: 'html',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){
                            //var clname = response.
                            //printClient(c_id,hold_value);
                          }
                });

        }
</script>

<input type="hidden" id="id_purchase" name="id_purchase">