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
          <button class="btn btn-default" style="float:right;text-align: center;height: 33px" data-toggle="modal" data-target="#addrepairstatusModal"><h6 class="font-weight-bold center">+ Add Repair Status</h6></button>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <hr>
            <table class="table table-striped table-bordered" width="100%" cellspacing="0" style="font-size: 13px;color: #000;">
              <thead>
                <tr>
                  <th>Status Label</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Status Label</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody class="row_position" id="tablereportsales">

              <?php 
                $test = '1';
                foreach ($repairstatus as $p) {
              ?>
                <tr id="<?php echo $p->id ?>" style="background-color: #e3e6f0;">
                    <td>
                      <button class="btn" style="background-color:<?php echo $p->statusBGColor?>;color: <?php echo $p->statusTextColor?>;font-weight: bold;"><?php echo $p->statusName ?></button>
                    </td>
                    <td>
                      <button class="btn btn-warning" onclick="editModal(<?php echo $p->id;?>);"><i class="fa fa-fw fa-pen" ></i></button>
                      <a href="<?php echo base_url(). 'func_setting/deletestatus/'.$p->id; ?>" onclick="return confirm('Are you sure you want to delete this status?');"><button class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></button></a>
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
    <div class="modal fade" id="addrepairstatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Repair Status <p style="color: red">Please enter status information below</p></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('func_setting/createstatus'); ?>" method="post" enctype="multipart/form-data">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row">
                    <input type="hidden" name="paymentholdid">
                    <input type="hidden" name="paymentdateadd"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                    <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
                    <input type="hidden" name="paymentmadeby" value="<?php echo $this->session->userdata('name');?>">
                    <input type="hidden" name="transactionID">
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"><i class="fas fa-fw fa-mobile-alt"></i>| Status Name</span>
                      </div>
                        <input type="text" name="statusname" id="groupname" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 180px;"><i class="fas fa-fw fa-mobile-alt"></i>| Background Color</span>
                      </div>
                        <input type="text" name="statusbgcolor" id="groupname" placeholder="#000000" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"><i class="fas fa-fw fa-mobile-alt"></i>| Text Color</span>
                      </div>
                        <input type="text" name="statustextcolor" id="groupname" placeholder="#000000" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <!-- <input type='button' id='click' value='click'> -->
                <button class="btn btn-primary" type="submit">Add Status</button>
              </div>
            </form>      
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editstatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Status <p style="color: red">Please enter status information below</p></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('func_setting/editstatus'); ?>" method="post" enctype="multipart/form-data">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row">
                    <input type="hidden" name="paymentholdid">
                    <input type="hidden" name="paymentdateadd"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                    <input type="hidden" name="paymentbranch" value="<?php echo $this->session->userdata('branch');?>">
                    <input type="hidden" name="paymentmadeby" value="<?php echo $this->session->userdata('name');?>">
                    <input type="hidden" name="transactionID">
                    <input type="hidden" name="editid" id="editid">
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"><i class="fas fa-fw fa-mobile-alt"></i>| Status Name</span>
                      </div>
                        <input type="text" name="editstatusname" id="editstatusname" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 180px;"><i class="fas fa-fw fa-mobile-alt"></i>| Background Color</span>
                      </div>
                        <input type="text" name="editstatusbgcolor" id="editstatusbgcolor" placeholder="#000000" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"><i class="fas fa-fw fa-mobile-alt"></i>| Text Color</span>
                      </div>
                        <input type="text" name="editstatustextcolor" id="editstatustextcolor" placeholder="#000000" class="form-control">
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
  $(".row_position").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });

    function updateOrder(data) {
        $.ajax({
            url:'<?= base_url() ?>func_setting/orderby',
            type:'post',
            data:{position:data},
            success:function(){
                
            }
        })
    }
    function editModal(id)
    {
      var data = {'id':id}
      $.ajax({
                url: '<?= base_url() ?>func_setting/getstatus',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                    $('#editstatusModal').modal('show');
                    var editstatus1 = $('#editid').val(response.id);
                    var editstatus2 = $('#editstatusname').val(response.statusName);
                    var editstatus3 = $('#editstatusbgcolor').val(response.statusBGColor);
                    var editstatus4 = $('#editstatustextcolor').val(response.statusTextColor);
                    
                }
        });
    }
</script>
<input type="hidden" id="id_sales" name="id_sales">