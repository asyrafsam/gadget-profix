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
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-clipboard-list"></i>List of Group </h1>
    <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="container">
          <?php if($this->session->userdata('groupadd') > 0){?>
          <button class="btn btn-default" style="float:right;text-align: center;height: 33px" data-toggle="modal" data-target="#addgroupModal"><h6 class="font-weight-bold center">+ Add New Group</h6></button>
          <?php }?>
        </div>

        <div class="card-body">
          <div class="table-responsive" id="changepermission">
            <hr>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;color: #000;">
              <thead>
                <tr>
                  <th>Group Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Group Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody id="tablereportsales">

              <?php 
                $test = '1';
                foreach ($usergroup as $p) {
              ?>
                <tr style="background-color: #e3e6f0;">
                    <td><?php echo $p->groupName ?></td>
                    <td><?php echo $p->groupDescription?></td>
                    <td>
                      <button class="btn btn-primary" onclick="changepermission(<?php echo $p->id;?>);"><i class="fa fa-fw fa-clipboard-list" ></i></button>
                      <?php if($this->session->userdata('groupedit') > 0){?>
                      <button class="btn btn-warning" onclick="editModal(<?php echo $p->id;?>);"><i class="fa fa-fw fa-pen" ></i></button>
                      <?php }?>
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
    <div class="modal fade" id="addgroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Group <p style="color: red">Please enter group information below</p></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('func_setting/creategroup'); ?>" method="post" enctype="multipart/form-data">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row">
                    <input type="hidden" name="paymentholdid">
                    <input type="hidden" name="paymentdateadd"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                    <input type="hidden" name="paymentbranch" value="<?php echo $this->session->userdata('branch');?>">
                    <input type="hidden" name="paymentmadeby" value="<?php echo $this->session->userdata('name');?>">
                    <input type="hidden" name="transactionID">
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"><i class="fas fa-fw fa-mobile-alt"></i>| Group Name</span>
                      </div>
                        <input type="text" name="groupname" id="groupname" class="form-control">
                    </div>
                    <div class="flex-row col-lg-12">
                      <div class="form-group input-group col-lg-12">
                        <div class="input-group-prepend">
                          <span class="input-group-text span-modal" style="width: 150px;height: 150px;"> <i class="fas fa-fw fa-pen"></i>| Description</span>
                        </div>
                        <textarea class="form-control" name="groupdescription" placeholder="Note" style="height: 150px;"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <!-- <input type='button' id='click' value='click'> -->
                <button class="btn btn-primary" type="submit">Add Group</button>
              </div>
            </form>      
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editgroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Group <p style="color: red">Please enter group information below</p></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('func_setting/editgroup'); ?>" method="post" enctype="multipart/form-data">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row">
                    <input type="hidden" name="paymentholdid">
                    <input type="hidden" name="paymentdateadd"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                    <input type="hidden" name="paymentbranch" value="<?php echo $this->session->userdata('branch');?>">
                    <input type="hidden" name="paymentmadeby" value="<?php echo $this->session->userdata('name');?>">
                    <input type="hidden" name="transactionID">
                    <input type="hidden" name="editid" id="editid">
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"><i class="fas fa-fw fa-mobile-alt"></i>| Group Name</span>
                      </div>
                        <input type="text" name="editgroupname" id="editgroupname" class="form-control">
                    </div>
                    <div class="flex-row col-lg-12">
                      <div class="form-group input-group col-lg-12">
                        <div class="input-group-prepend">
                          <span class="input-group-text span-modal" style="width: 150px;height: 150px;"> <i class="fas fa-fw fa-pen"></i>| Description</span>
                        </div>
                        <textarea class="form-control" name="editgroupdescription" id="editgroupdescription" placeholder="Note" style="height: 150px;"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <!-- <input type='button' id='click' value='click'> -->
                <button class="btn btn-primary" type="submit">Edit Group</button>
              </div>
            </form>      
          </div>
        </div>
      </div>
    </div>
  </div>
  
<script type="text/javascript">
  function editModal(id)
  {
    var data = {'id':id}
    $.ajax({
                    url: '<?= base_url() ?>func_setting/getgroup',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        $('#editgroupModal').modal('show');
                        var editgroup1 = $('#editid').val(response.id);
                        var editgroup2 = $('#editgroupname').val(response.groupName);
                        var editgroup3 = $('#editgroupdescription').val(response.groupDescription);
                        
                    }
            });
  }
  function changepermission(id)
  {
    var data = {'id':id}
    $.ajax({
              url: '<?= base_url() ?>func_setting/getpermission',
              type: 'POST',
              dataType: 'json',
              data: data,
              beforeSend: function() {

              },
              success: function(response){
                
                // $('#changepermission').html(response);
                  var repairview = $('#repairview').val(response.reparation_view);
                  var repairadd = $('#repairadd').val(response.reparation_add);
                  var repairedit = $('#repairedit').val(response.reparation_edit);
                  var repairdelete = $('#repairdelete').val(response.reparation_delete);

                  var clientview = $('#clientview').val(response.clients_view);
                  var clientadd = $('#clientadd').val(response.clients_add);
                  var clientedit = $('#clientedit').val(response.clients_edit);
                  var clientdelete = $('#clientdelete').val(response.clients_delete);

                  var stockview = $('#stockview').val(response.stock_view);
                  var stockadd = $('#stockadd').val(response.stock_add);
                  var stockedit = $('#stockedit').val(response.stock_edit);
                  var stockdelete = $('#stockdelete').val(response.stock_delete);

                  var supplierview = $('#supplierview').val(response.suppliers_view);
                  var supplieradd = $('#supplieradd').val(response.suppliers_add);
                  var supplieredit = $('#supplieredit').val(response.suppliers_edit);
                  var supplierdelete = $('#supplierdelete').val(response.suppliers_delete);

                  var modelview = $('#modelview').val(response.models_view);
                  var modeladd = $('#modeladd').val(response.models_add);
                  var modeledit = $('#modeledit').val(response.models_edit);
                  var modeldelete = $('#modeldelete').val(response.models_delete);

                  var purchaseview = $('#purchaseview').val(response.purchases_view);
                  var purchaseadd = $('#purchaseadd').val(response.purchases_add);
                  var purchaseedit = $('#purchaseedit').val(response.purchases_edit);
                  var purchasedelete = $('#purchasedelete').val(response.purchases_delete);

                  var userview = $('#userview').val(response.users_view);
                  var useradd = $('#useradd').val(response.users_add);
                  var useredit = $('#useredit').val(response.users_edit);
                  var userdelete = $('#userdelete').val(response.users_delete);

                  var groupview = $('#groupview').val(response.group_view);
                  var groupadd = $('#groupadd').val(response.group_add);
                  var groupedit = $('#groupedit').val(response.group_edit);
                  var groupdelete = $('#groupdelete').val(response.group_delete);

                  var taxview = $('#taxview').val(response.tax_view);
                  var taxadd = $('#taxadd').val(response.tax_add);
                  var taxedit = $('#taxedit').val(response.tax_edit);
                  var taxdelete = $('#taxdelete').val(response.tax_delete);

                  var categoryview = $('#categoryview').val(response.categories_view);
                  var categoryadd = $('#categoryadd').val(response.categories_add);
                  var categoryedit = $('#categoryedit').val(response.categories_edit);
                  var categorydelete = $('#categorydelete').val(response.categories_delete);

                  var manufacturerview = $('#manufacturerview').val(response.manufacturers_view);
                  var manufactureradd = $('#manufactureradd').val(response.manufacturers_add);
                  var manufactureredit = $('#manufactureredit').val(response.manufacturers_edit);
                  var manufacturerdelete = $('#manufacturerdelete').val(response.manufacturers_delete);

                  var reportstock = $('#reportstock').val(response.reports_stock);
                  var reportfinance = $('#reportfinance').val(response.reports_finance);
                  var reportquantity = $('#reportquantity').val(response.reports_quantity);
                  var reportsales = $('#reportsales').val(response.reports_sales);
                  var reportdrawer = $('#reportdrawer').val(response.reports_drawer);

                  var databaseview = $('#databaseview').val(response.database_view);
                  var databasebackup = $('#databasebackup').val(response.database_backup);
                  var databaserestore = $('#databaserestore').val(response.database_restore);
                  var databaseremove = $('#databaseremove').val(response.database_remove);
                  var miscellanousemail = $('#miscellanousemail').val(response.miscellanous_email);
                  // var editgroup2 = $('#editgroupname').val(response.groupName);
                  // var editgroup3 = $('#editgroupdescription').val(response.groupDescription);
                  data0 = response.groupId;
                  data1 = response.reparation_view;
                  data2 = response.reparation_add;
                  data3 = response.reparation_edit;
                  data4 = response.reparation_delete;

                  data5 = response.clients_view;
                  data6 = response.clients_add;
                  data7 = response.clients_edit;
                  data8 = response.clients_delete;

                  data9 = response.stock_view;
                  data10 = response.stock_add;
                  data11 = response.stock_edit;
                  data12 = response.stock_delete;

                  data13 = response.suppliers_view;
                  data14 = response.suppliers_add;
                  data15 = response.suppliers_edit;
                  data16 = response.suppliers_delete;

                  data17 = response.models_view;
                  data18 = response.models_add;
                  data19 = response.models_edit;
                  data20 = response.models_delete;

                  data21 = response.purchases_view;
                  data22 = response.purchases_add;
                  data23 = response.purchases_edit;
                  data24 = response.purchases_delete;

                  data25 = response.users_view;
                  data26 = response.users_add;
                  data27 = response.users_edit;
                  data28 = response.users_delete;

                  data29 = response.group_view;
                  data30 = response.group_add;
                  data31 = response.group_edit;
                  data32 = response.group_delete;

                  data33 = response.tax_view;
                  data34 = response.tax_add;
                  data35 = response.tax_edit;
                  data36 = response.tax_delete;

                  data37 = response.categories_view;
                  data38 = response.categories_add;
                  data39 = response.categories_edit;
                  data40 = response.categories_delete;

                  data41 = response.manufacturers_view;
                  data42 = response.manufacturers_add;
                  data43 = response.manufacturers_edit;
                  data44 = response.manufacturers_delete;

                  data45 = response.reports_stock;
                  data46 = response.reports_finance;
                  data47 = response.reports_quantity;
                  data48 = response.reports_sales;
                  data49 = response.reports_drawer;

                  data50 = response.database_view;
                  data51 = response.database_backup;
                  data52 = response.database_restore;
                  data53 = response.database_remove;
                  data54 = response.miscellanous_email;

                  changepermissionview(data0,data1,data2,data3,data4,data5,data6,data7,data8,data9,data10,data11,data12,data13,data14,data15,data16,data17,data18,data19,data20,data21,data22,data23,data24,data25,data26,data27,data28,data29,data30,data31,data32,data33,data34,data35,data36,data37,data38,data39,data40,data41,data42,data43,data44,data45,data46,data47,data48,data49,data50,data51,data52,data53,data54);
              }
      });
  }
  function changepermissionview(groupId,repairview,repairadd,repairedit,repairdelete,clientview,clientadd,clientedit,clientdelete,stockview,stockadd,stockedit,stockdelete,supplierview,supplieradd,supplieredit,supplierdelete,modelview,modeladd,modeledit,modeldelete,purchaseview,purchaseadd,purchaseedit,purchasedelete,userview,useradd,useredit,userdelete,groupview,groupadd,groupedit,groupdelete,taxview,taxadd,taxedit,taxdelete,categoryview,categoryadd,categoryedit,categorydelete,manufacturerview,manufactureradd,manufactureredit,manufacturerdelete,reportstock,reportfinance,reportquantity,reportsales,reportdrawer,databaseview,databasebackup,databaserestore,databaseremove,miscellanousemail)
  {
    var data = {'name':groupId}
    $.ajax({
              url: '<?= base_url() ?>func_setting/getpermissionview',
              type: 'POST',
              dataType: 'html',
              data: data,
              beforeSend: function() {

              },
              success: function(response){
                $('#changepermission').html(response);

                // var test1 = repairview;
                $('#groupId').val(groupId);
                $('#repairview').val(repairview);
                $('#repairadd').val(repairadd);
                $('#repairedit').val(repairedit);
                $('#repairdelete').val(repairdelete);

                $('#clientview').val(clientview);
                $('#clientadd').val(clientadd);
                $('#clientedit').val(clientedit);
                $('#clientdelete').val(clientdelete);

                $('#stockview').val(stockview);
                $('#stockadd').val(stockadd);
                $('#stockedit').val(stockedit);
                $('#stockdelete').val(stockdelete);

                $('#supplierview').val(supplierview);
                $('#supplieradd').val(supplieradd);
                $('#supplieredit').val(supplieredit);
                $('#supplierdelete').val(supplierdelete);

                $('#modelview').val(modelview);
                $('#modeladd').val(modeladd);
                $('#modeledit').val(modeledit);
                $('#modeldelete').val(modeldelete);

                $('#purchaseview').val(purchaseview);
                $('#purchaseadd').val(purchaseadd);
                $('#purchaseedit').val(purchaseedit);
                $('#purchasedelete').val(purchasedelete);

                $('#userview').val(userview);
                $('#useradd').val(useradd);
                $('#useredit').val(useredit);
                $('#userdelete').val(userdelete);

                $('#groupview').val(groupview);
                $('#groupadd').val(groupadd);
                $('#groupedit').val(groupedit);
                $('#groupdelete').val(groupdelete);

                $('#taxview').val(taxview);
                $('#taxadd').val(taxadd);
                $('#taxedit').val(taxedit);
                $('#taxdelete').val(taxdelete);

                $('#categoryview').val(categoryview);
                $('#categoryadd').val(categoryadd);
                $('#categoryedit').val(categoryedit);
                $('#categorydelete').val(categorydelete);

                $('#manufacturerview').val(manufacturerview);
                $('#manufactureradd').val(manufactureradd);
                $('#manufactureredit').val(manufactureredit);
                $('#manufacturerdelete').val(manufacturerdelete);

                $('#reportstock').val(reportstock);
                $('#reportfinance').val(reportfinance);
                $('#reportquantity').val(reportquantity);
                $('#reportsales').val(reportsales);
                $('#reportdrawer').val(reportdrawer);

                $('#databaseview').val(databaseview);
                $('#databasebackup').val(databasebackup);
                $('#databaserestore').val(databaserestore);
                $('#databaseremove').val(databaseremove);

                $('#miscellanousemail').val(miscellanousemail);

                if(repairview == 1){
                    $('#repairview').attr("checked", "checked");
                }
                if(repairadd == 1){
                    $('#repairadd').attr("checked", "checked");
                }
                if(repairedit == 1){
                    $('#repairedit').attr("checked", "checked");
                }
                if(repairdelete == 1){
                    $('#repairdelete').attr("checked", "checked");
                }

                if(clientview == 1){
                    $('#clientview').attr("checked", "checked");
                }
                if(clientadd == 1){
                    $('#clientadd').attr("checked", "checked");
                }
                if(clientedit == 1){
                    $('#clientedit').attr("checked", "checked");
                }
                if(clientdelete == 1){
                    $('#clientdelete').attr("checked", "checked");
                }

                if(stockview == 1){
                    $('#stockview').attr("checked", "checked");
                }
                if(stockadd == 1){
                    $('#stockadd').attr("checked", "checked");
                }
                if(stockedit == 1){
                    $('#stockedit').attr("checked", "checked");
                }
                if(stockdelete == 1){
                    $('#stockdelete').attr("checked", "checked");
                }

                if(supplierview == 1){
                    $('#supplierview').attr("checked", "checked");
                }
                if(supplieradd == 1){
                    $('#supplieradd').attr("checked", "checked");
                }
                if(supplieredit == 1){
                    $('#supplieredit').attr("checked", "checked");
                }
                if(supplierdelete == 1){
                    $('#supplierdelete').attr("checked", "checked");
                }

                if(modelview == 1){
                    $('#modelview').attr("checked", "checked");
                }
                if(modeladd == 1){
                    $('#modeladd').attr("checked", "checked");
                }
                if(modeledit == 1){
                    $('#modeledit').attr("checked", "checked");
                }
                if(modeldelete == 1){
                    $('#modeldelete').attr("checked", "checked");
                }

                if(purchaseview == 1){
                    $('#purchaseview').attr("checked", "checked");
                }
                if(purchaseadd == 1){
                    $('#purchaseadd').attr("checked", "checked");
                }
                if(purchaseedit == 1){
                    $('#purchaseedit').attr("checked", "checked");
                }
                if(purchasedelete == 1){
                    $('#purchasedelete').attr("checked", "checked");
                }

                if(userview == 1){
                    $('#userview').attr("checked", "checked");
                }
                if(useradd == 1){
                    $('#useradd').attr("checked", "checked");
                }
                if(useredit == 1){
                    $('#useredit').attr("checked", "checked");
                }
                if(userdelete == 1){
                    $('#userdelete').attr("checked", "checked");
                }

                if(groupview == 1){
                    $('#groupview').attr("checked", "checked");
                }
                if(groupadd == 1){
                    $('#groupadd').attr("checked", "checked");
                }
                if(groupedit == 1){
                    $('#groupedit').attr("checked", "checked");
                }
                if(groupdelete == 1){
                    $('#groupdelete').attr("checked", "checked");
                }

                if(taxview == 1){
                    $('#taxview').attr("checked", "checked");
                }
                if(taxadd == 1){
                    $('#taxadd').attr("checked", "checked");
                }
                if(taxedit == 1){
                    $('#taxedit').attr("checked", "checked");
                }
                if(taxdelete == 1){
                    $('#taxdelete').attr("checked", "checked");
                }

                if(categoryview == 1){
                    $('#categoryview').attr("checked", "checked");
                }
                if(categoryadd == 1){
                    $('#categoryadd').attr("checked", "checked");
                }
                if(categoryedit == 1){
                    $('#categoryedit').attr("checked", "checked");
                }
                if(categorydelete == 1){
                    $('#categorydelete').attr("checked", "checked");
                }

                if(manufacturerview == 1){
                    $('#manufacturerview').attr("checked", "checked");
                }
                if(manufactureradd == 1){
                    $('#manufactureradd').attr("checked", "checked");
                }
                if(manufactureredit == 1){
                    $('#manufactureredit').attr("checked", "checked");
                }
                if(manufacturerdelete == 1){
                    $('#manufacturerdelete').attr("checked", "checked");
                }

                if(reportstock == 1){
                    $('#reportstock').attr("checked", "checked");
                }
                if(reportfinance == 1){
                    $('#reportfinance').attr("checked", "checked");
                }
                if(reportquantity == 1){
                    $('#reportquantity').attr("checked", "checked");
                }
                if(reportsales == 1){
                    $('#reportsales').attr("checked", "checked");
                }
                if(reportdrawer == 1){
                    $('#reportdrawer').attr("checked", "checked");
                }

                if(databaseview == 1){
                    $('#databaseview').attr("checked", "checked");
                }
                if(databasebackup == 1){
                    $('#databasebackup').attr("checked", "checked");
                }
                if(databaserestore == 1){
                    $('#databaserestore').attr("checked", "checked");
                }
                if(databaseremove == 1){
                    $('#databaseremove').attr("checked", "checked");
                }
                if(miscellanousemail == 1){
                    $('#miscellanousemail').attr("checked", "checked");
                }
              }
      });
  }
  function geeks(){
    var test = document.getElementById("repairview").value;
    if($(test).val() == 1){
        $(test).attr("checked", "checked");
    }
  }
</script>
<input type="hidden" id="id_sales" name="id_sales">