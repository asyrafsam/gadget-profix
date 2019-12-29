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
    <h1 class="h3 mb-2 text-gray-800">Inventory <i class="fas fa-clipboard-list"></i></h1>
    <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="header-card col-md-3 py-2" style="float: left; width: 500px;" style="text-decoration: none;">
          <a class="" style="text-decoration: none;" href="<?php echo base_url('admin/add_stock'); ?>">
            <button class="btn btn-dark" style="text-align: left;height: 33px"><h6 class="font-weight-bold center">+ New Product</h6></button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </a>
        </div>
        <div class="container">
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i><i class="fas fa-fw fa-print"></i> Export <span class="badge"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <!-- <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-barcode"></i> <span class="badge">BARCODE/LABEL</a></li> -->
                  <li><a href="<?php echo base_url(). 'func_excel/excel_stock/'.$random; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-excel"></i> <span class="badge">EXCEL</a></li>
                  <li><a href="<?php echo base_url(). 'func_pdf/pdf_stock/'.$random; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-pdf"></i> <span class="badge">PDF</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <hr>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
              <thead>
                <tr>
                  <th>Check</th>
                  <th>Image</th>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Cost</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Alert Quantity</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Check</th>
                  <th>Image</th>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Cost</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Alert Quantity</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <?php 
                $test = '1';
                foreach ($product as $p) {
                  
                  if ($test % 2 == 0){
                     $test1 ="even";
                  }else{
                     $test1 = "odd";
                  }
              ?>
              <tbody>
                <?php if($test1 == 'odd'){?>
                <tr style="background-color: #e3e6f0;">
                <?php }else{?>
                <tr style="background-color: #fdfafa;">
                <?php }?>
                  <td><input type="checkbox" class="chkbox" name="checkstock" id="checkstock" onclick="getDetailStock(<?php echo $p->p_id; ?>)" value="<?php echo $p->p_id?>"></td>
                  <td><?php echo $p->p_name?></td>
                  <td><?php echo $p->p_code?></td>
                  <td><?php echo $p->p_name?></td>
                  <td><?php echo $p->p_cost?></td>
                  <td><?php echo $p->p_price?></td>
                  <td><?php echo $p->p_quantity?></td>
                  <td><?php echo $p->p_alertQuantity?></td>
                  <td>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <button class="btn btn-primary" style="font-size: 12px">Action</button>
                      </a>
                      <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Action :</div>
                        <a class="dropdown-item" href="<?php echo base_url(). 'admin/duplicateProduct/'.$p->p_id; ?>"><i class="fa fa-fw fa-clipboard-list"> &nbsp;Duplicate Product</i></a>
                        <?php if($this->session->userdata('stockedit') > 0){?>
                        <a class="dropdown-item" href="<?php echo base_url(). 'admin/editStock/'.$p->p_id; ?>"><i class="fa fa-fw fa-pen"> &nbsp;Edit Product</i></a>
                        <?php }?>
                        <?php if($this->session->userdata('stockdelete') > 0){?>
                        <!-- <a class="dropdown-item" href="#" onclick="edit_supplier(<?php echo $p->p_id; ?>)"><i class="fa fa-fw fa-print"> &nbsp;Print Barcode</i></a> -->
                        <a class="dropdown-item" href="<?php echo base_url(). 'func_stock/deleteStock/'.$p->p_id; ?>" onclick="return confirm('Confirm delete product?');"><i class="fa fa-fw fa-trash"> &nbsp;Delete Product</i></a>
                        <?php }?>
                      </div>
                    </div>
                </td>
                </tr>
              </tbody>
              <?php
                  $test++;
                }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function getDetailStock(id)
        {
          $("#id_stock").val(id);
          
        }


        //$(document).ready(function() {
        $("[name='checkstock']").click(function() {
            var id = $("#id_stock").val();
            var checked = $(this).is(':checked');
            if (checked) {
                //alert('checked');
                var data = {'id':id}
                $.ajax({
                      url: '<?= base_url() ?>func_stock/getDetailsStock',
                      type: 'POST',
                      dataType: 'json',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){

                        var p_id = response.p_id;
                        var p_name = response.p_name;
                        var p_code = response.p_code;
                        var p_cost = response.p_cost;
                        var p_price = response.p_price;
                        var p_quantity = response.p_quantity;
                        var p_alertQuantity = response.p_alertQuantity;
                        var ubranch = response.u_branch;
                        var hold_value = $("#hold_value").val();

                        storeStock(p_id,p_name,p_code,p_cost,p_price,p_quantity,p_alertQuantity,ubranch,hold_value); // add 
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
                          url: '<?= base_url() ?>func_stock/deletePrint',
                          type: 'POST',
                          dataType: 'html',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){

                          }
                  });
        }


        function storeStock(p_id,p_name,p_code,p_cost,p_price,p_quantity,p_alertQuantity,ubranch,hold_value){
          var data = {'p_id':p_id,'p_name':p_name,'p_code':p_code,'p_cost':p_cost,'p_price':p_price,'p_quantity':p_quantity,'p_alertQuantity':p_alertQuantity,'u_branch':ubranch,'hold_value':hold_value}
          $.ajax({
                          url: '<?= base_url() ?>func_stock/storeStock',
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

<input type="hidden" id="id_stock" name="id_stock">