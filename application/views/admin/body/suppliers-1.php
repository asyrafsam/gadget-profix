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
  /*height: 400px;
  overflow-x: auto;*/
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

<!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Suppliers</h1>
  <hr>
<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="header-card col-md-3 py-2" style="float: left; left: 18px; width: 500px;">
          <?php if($this->session->userdata('supplieradd') > 0){?>
          <button class="btn btn-dark" style="text-align: center;height: 33px" data-toggle="modal" data-target="#addSupplierModal"><h6 class="font-weight-bold center">+ New Suppliers</h6></button>
          <?php }?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      <div class="card-body">
        <div class="table-responsive">
          <hr>
          <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
            <thead>
              <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
                <th>Country</th>
                <th>VAT</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
                <th>Country</th>
                <th>VAT</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <?php 
              $test = '1';
              foreach ($supplier as $s) {
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
                <td style="text-align: center;"><?php echo $s->s_name?></td>
                <td><?php echo $s->s_company?></td>
                <td><?php echo $s->s_phone?></td>
                <td><?php echo $s->s_email?></td>
                <td><?php echo $s->s_city?></td>
                <td><?php echo $s->s_country?></td>
                <td><?php echo $s->s_vat?></td>
                <td>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <button class="btn btn-primary" style="font-size: 12px">Action</button>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action :</div>
                      <a class="dropdown-item" href="#" onclick="view_supplier(<?php echo $s->s_id; ?>)"><i class="fa fa-fw fa-eye"> &nbsp;View Supplier</i></a>
                      <?php if($this->session->userdata('supplieredit') > 0){?>
                      <a class="dropdown-item" href="#" onclick="edit_supplier(<?php echo $s->s_id; ?>)"><i class="fa fa-fw fa-cloud"> &nbsp;Edit Supplier</i></a>
                      <?php }?>
                      <?php if($this->session->userdata('supplierdelete') > 0){?>
                      <a class="dropdown-item" href="<?php echo base_url(). 'func_supplier/deleteSupplier/'.$s->s_id; ?>" onclick="return confirm('Confirm delete supplier?');"><i class="fa fa-fw fa-clipboard"> &nbsp;Delete Supplier</i></a>
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

<!-- Modal Add New Suppliers -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('func_supplier/add_supplier'); ?>" method="post" id="form" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="flex-reparation col-lg-12">
            <div class="flex-child col-lg-6">
              <div class="flex-row">
                <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                  </div>
                    <input type="text" name="sname" id="sname" class="form-control" placeholder="Name">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-map-marker-alt"></i> </span>
                  </div>
                    <input type="text" name="saddress" id="saddress" class="form-control" placeholder="Address">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe-asia"></i> </span>
                  </div>
                    <input type="text" name="scountry" id="scountry" class="form-control" placeholder="Country">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                  </div>
                    <input type="text" name="spostal" id="spostal" class="form-control" placeholder="Postal Code" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                  </div>
                    <input type="text" name="semail" id="semail" class="form-control" placeholder="Email">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                  </div>
                    <input type="text" name="scompany" id="scompany" class="form-control" placeholder="Company">
                </div>
              </div>
            </div>
            <div class="flex-child col-lg-6" style="height: 200px;">
              <div class="flex-row">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-building"></i> </span>
                  </div>
                    <input type="text" name="scity" id="scity" class="form-control" placeholder="City">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-road"></i> </span>
                  </div>
                    <input type="text" name="sstate" id="sstate" class="form-control" placeholder="States">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe"></i> </span>
                  </div>
                    <input type="text" name="sphone" id="sphone" class="form-control" placeholder="Phone">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-envelope"></i> </span>
                  </div>
                    <input type="text" name="svat" id="svat" class="form-control" placeholder="VAT" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" id="btn_submit">Add Supplier</button>
        </div>      
      </form>
    </div>
  </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-custom-2" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Supplier Details</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('func_supplier/update_supplier'); ?>" method="post" id="formX" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="flex-reparation col-lg-12">
            <div class="flex-child col-lg-6">
              <div class="flex-row">
                <input type="hidden" name="sid-1">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                  </div>
                    <input type="text" name="sname-1" id="sname" class="form-control" placeholder="Name">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-map-marker-alt"></i> </span>
                  </div>
                    <input type="text" name="saddress-1" id="saddress" class="form-control" placeholder="Address">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe-asia"></i> </span>
                  </div>
                    <input type="text" name="scountry-1" id="scountry" class="form-control" placeholder="Country">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                  </div>
                    <input type="text" name="spostal-1" id="spostal" class="form-control" placeholder="Postal Code" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                  </div>
                    <input type="text" name="semail-1" id="semail" class="form-control" placeholder="Email">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                  </div>
                    <input type="text" name="scompany-1" id="scompany" class="form-control" placeholder="Company">
                </div>
              </div>
            </div>
            <div class="flex-child col-lg-6" style="height: 200px;">
              <div class="flex-row">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-building"></i> </span>
                  </div>
                    <input type="text" name="scity-1" id="scity" class="form-control" placeholder="City">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-road"></i> </span>
                  </div>
                    <input type="text" name="sstate-1" id="sstate" class="form-control" placeholder="States">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe"></i> </span>
                  </div>
                    <input type="text" name="sphone-1" id="sphone" class="form-control" placeholder="Phone">
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-envelope"></i> </span>
                  </div>
                    <input type="text" name="svat-1" id="svat" class="form-control" placeholder="VAT" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" id="btn_submit">Update Supplier</button>
        </div>      
      </form>      
    </div>
  </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-custom-2" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Supplier Details</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('func_supplier/update_supplier'); ?>" method="post" id="formXY" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="flex-reparation col-lg-12">
            <div class="flex-child col-lg-6">
              <div class="flex-row">
                <input type="hidden" name="sid-1" id="sid-2" readonly>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                  </div>
                    <input type="text" name="sname-2" id="sname-2" class="form-control" placeholder="Name" readonly>
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-map-marker-alt"></i> </span>
                  </div>
                    <input type="text" name="saddress-2" id="saddress-2" class="form-control" placeholder="Address" readonly>
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe-asia"></i> </span>
                  </div>
                    <input type="text" name="scountry-2" id="scountry-2" class="form-control" placeholder="Country" readonly>
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                  </div>
                    <input type="text" name="spostal-2" id="spostal-2" class="form-control" placeholder="Postal Code" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;" readonly>
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                  </div>
                    <input type="text" name="semail-2" id="semail-2" class="form-control" placeholder="Email" readonly>
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                  </div>
                    <input type="text" name="scompany-2" id="scompany-2" class="form-control" placeholder="Company" readonly>
                </div>
              </div>
            </div>
            <div class="flex-child col-lg-6" style="height: 200px;">
              <div class="flex-row">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-building"></i> </span>
                  </div>
                    <input type="text" name="scity-2" id="scity-2" class="form-control" placeholder="City" readonly>
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-road"></i> </span>
                  </div>
                    <input type="text" name="sstate-2" id="sstate-2" class="form-control" placeholder="States" readonly>
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe"></i> </span>
                  </div>
                    <input type="text" name="sphone-2" id="sphone-2" class="form-control" placeholder="Phone" readonly>
                </div>
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-envelope"></i> </span>
                  </div>
                    <input type="text" name="svat-2" id="svat-2" class="form-control" placeholder="VAT" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">

        </div>      
      </form>      
    </div>
  </div>
</div>
<script type="text/javascript">
      var save_method;
      var table;
      $(document).ready(function() {
        $('#dataTable').DataTable( {
            "order": [0,'desc']
            
            });
        });
      function edit_supplier(id){
        save_method = 'update';
        $('#formX')[0].reset();

        /*load data dari ajax sama macam concept atas*/
        $.ajax({
          url:"<?php echo site_url('func_supplier/edit_supplier/') ;?>" + id,
          type: "GET",
          dataType:"JSON",
          success: function(data){
            /*cara nak tarik value form data menggunakan name*/
            $('[name="sid-1"]').val(data.s_id);
            $('[name="sname-1"]').val(data.s_name);
            $('[name="saddress-1"]').val(data.s_address);
            $('[name="scountry-1"]').val(data.s_country);
            $('[name="spostal-1"]').val(data.s_postal);
            $('[name="semail-1"]').val(data.s_email);
            $('[name="scompany-1"]').val(data.s_company);
            $('[name="scity-1"]').val(data.s_city);
            $('[name="sstate-1"]').val(data.s_state);
            $('[name="sphone-1"]').val(data.s_phone);
            $('[name="svat-1"]').val(data.s_vat);

            /*ajax panggil modal dan text*/
            $('#updateModal').modal('show');
            $('.modal_title').text('Edit Client');
          },
          error: function (jqXHR, textStatus, errorThrown){
                alert('error at get data from ajax');
            }
        });
      }

      function view_supplier(id){
        save_method = 'update';
        $('#formXY')[0].reset();
        /*load data dari ajax sama macam concept atas*/
        $.ajax({
          url:"<?php echo site_url('func_supplier/edit_supplier/') ;?>" + id,
          type: "GET",
          dataType:"JSON",
          success: function(data){
            /*cara nak tarik value form data menggunakan name*/
            $('[name="sname-2"]').val(data.s_name);
            $('[name="saddress-2"]').val(data.s_address);
            $('[name="scountry-2"]').val(data.s_country);
            $('[name="spostal-2"]').val(data.s_postal);
            $('[name="semail-2"]').val(data.s_email);
            $('[name="scompany-2"]').val(data.s_company);
            $('[name="scity-2"]').val(data.s_city);
            $('[name="sstates-2"]').val(data.s_states);
            $('[name="sphone-2"]').val(data.s_phone);
            $('[name="svat-2"]').val(data.s_vat);

            /*ajax panggil modal dan text*/
            $('#viewModal').modal('show');
            $('.modal_title').text('Edit Client');
          },
          error: function (jqXHR, textStatus, errorThrown){
                alert('error at get data from ajax');
            }
        });
      }
</script>