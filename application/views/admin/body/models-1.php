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
  justify-content: center;
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
<h1 class="h3 mb-2 text-gray-800">Models</h1>
<!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-3 py-2" style="float: left; width: 500px;">
        <button class="btn btn-dark" style="text-align: center;height: 33px" data-toggle="modal" data-target="#addModal"><h6 class="font-weight-bold center">+ New Model</h6></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <hr>
        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
          <thead>
            <tr>
              <th>Name</th>
              <th>Manufacturer</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Manufacturer</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <?php
            $test = '1';
            foreach ($model as $md) {
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
              <td><?php echo $md->md_name?></td>
              <td><?php echo $md->md_manufacturer?></td>
              <td>
                <a href="#" onclick="edit_model(<?php echo $md->md_id; ?>)">
                  <button type="button" class="btn btn-warning" style="width: 35px;height: 35px;font-size: 11px;text-align: center;"><i class="fa fa-fw fa-pen"></i></button>
                </a>
                <a href="<?php echo base_url(). 'func_model/delete_Model/'.$md->md_id; ?>" onclick="return confirm('Confirm delete model?');">
                  <button type="button" class="btn btn-danger" style="width: 35px;height: 35px;font-size: 11px;text-align: center;"><i class="fa fa-fw fa-trash"></i></button>
                </a>
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

<!-- Modal Add New Models -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Models</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('func_model/add_model'); ?>" method="post" id="form" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="flex-reparation col-lg-12">
              <div class="flex-row col-lg-6">
                <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                  </div>
                    <input type="text" name="mdname" id="mdname" class="form-control" placeholder="Model Name" required>
                </div>
              </div>
              <div class="flex-row col-lg-6">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                  </div>
                    <input type="text" name="mdmanufacturer" id="mdmanufacturer" class="form-control" placeholder="Manufacturer" required>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" id="btn_submit">Add Model</button>
        </div>      
      </form>
    </div>
  </div>
</div>

<!-- Modal Update Models -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Models</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('func_model/update_model'); ?>" method="post" id="formX" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="flex-reparation col-lg-12">
              <div class="flex-row col-lg-6">
                <input type="hidden" name="mdid-1" id="mdid-1">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                  </div>
                    <input type="text" name="mdname-1" id="mdname-1" class="form-control" placeholder="Model Name" required>
                </div>
              </div>
              <div class="flex-row col-lg-6">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                  </div>
                    <input type="text" name="mdmanufacturer-1" id="mdmanufacturer-1" class="form-control" placeholder="Manufacturer" required>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" id="btn_submit">Update Model</button>
        </div>      
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  var save_method;
  var table;

  function edit_model(id){
    save_method = 'update';
    $('#formX')[0].reset();

    /*load data dari ajax sama macam concept atas*/
    $.ajax({
      url:"<?php echo site_url('func_model/edit_model/') ;?>" + id,
      type: "GET",
      dataType:"JSON",
      success: function(data){
        /*cara nak tarik value form data menggunakan name*/
        $('[name="mdid-1"]').val(data.md_id);
        $('[name="mdname-1"]').val(data.md_name);
        $('[name="mdmanufacturer-1"]').val(data.md_manufacturer);

        /*ajax panggil modal dan text*/
        $('#updateModal').modal('show');
        $('.modal_title').text('Edit Client');
      },
      error: function (jqXHR, textStatus, errorThrown){
            alert('error at get data from ajax');
        }
    });
  }
</script>