<div class="modal fade" id="viewreparationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-custom" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Reparation</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row">
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"><i class="fas fa-fw fa-mobile-alt"></i>| IMEI</span>
                      </div>
                        <input type="text" name="r_imei" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-users"></i>| CLIENT</span>
                      </div>
                        <input type="text" name="r_name" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-file-alt"></i>| CONDITION</span>
                      </div>
                        <input type="text" name="addcategory" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-user"></i>| OPENED AT</span>
                      </div>
                        <input type="text" name="r_opened" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-building"></i>| DEFECT</span>
                      </div>
                        <input type="text" name="r_defect" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-mobile-alt"></i>| CATEGORY</span>
                      </div>
                        <input type="text" name="r_category" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-file-archive"></i>| MODEL</span>
                      </div>
                        <input type="text" name="r_model" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-money-bill-alt"></i>| PRICE</span>
                      </div>
                        <input type="text" name="r_total" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-calendar"></i>| TELEPHONE</span>
                      </div>
                        <input type="number" name="r_telephone" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 200px;"> <i class="fas fa-fw fa-wrench"></i>| REPARATION CODE</span>
                      </div>
                        <input type="text" name="hold_id" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-wrench"></i>| WARRANTY</span>
                      </div>
                        <input type="text" name="addservicecharge" class="form-control" id="taxTotal">
                    </div>
                  </div>
                  <div class="flex-row col-lg-12">
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;height: 150px;"> <i class="fas fa-fw fa-pen"></i>| Comment</span>
                      </div>
                      <textarea class="form-control" name="r_comment" placeholder="Comment" style="height: 150px;"></textarea>
                    </div>
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;height: 150px;"> <i class="fas fa-fw fa-pen"></i>| Diagnostics</span>
                      </div>
                        <textarea class="form-control" name="r_diagnostics" style="height: 150px;" placeholder="Diagnostics"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <form action="<?php echo base_url('func_reparation/changeStatus');?>" method="post">
                <input type="hidden" name="rrepairnoo">
                <input type="hidden" name="holdidd">
                <input type="hidden" name="datechange"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                <input type="hidden" name="uubranch" value="<?php echo $this->session->userdata('branch');?>">
                <input type="hidden" name="changeStatus" value="<?php echo $this->session->userdata('name');?>">
                <input type="hidden" name="rcode">
                <button class="btn btn-primary">Waiting for client confirmation</button>
              </form>
              <form action="<?php echo base_url('admin/print_reparation_report');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="reparationID">
                <button class="btn btn-default"><i class="fas fa-fw fa-file"></i>Report</button>
              </form>
              <!-- <a href="<?php echo base_url('func_pdf/print_reparation_invoice'); ?>"><button class="btn btn-default"><i class="fas fa-fw fa-print"></i>Invoice</button></a> -->
            </div>      
          
        </div>
      </div>
    </div>
    <script type="text/javascript">
      // function getDetailEmail($id){
      //   alert($id);
      // }
      var save_method;
      var table;

      function view_reparation(id){
        // save_method = 'update';
        // $('#formX')[0].reset();

        /*load data dari ajax sama macam concept atas*/
        $.ajax({
          url:"<?php echo site_url('func_reparation/getReparation/') ;?>" + id,
          type: "GET",
          dataType:"JSON",
          success: function(data){
            /*cara nak tarik value form data menggunakan name*/
            $('[name="rcode"]').val(data.r_code);
            $('[name="reparationID"]').val(data.r_repairno);
            $('[name="r_code"]').val(data.r_code);
            $('[name="r_imei"]').val(data.r_imei);
            $('[name="r_name"]').val(data.r_name);
            $('[name="r_opened"]').val(data.r_opened);
            $('[name="r_defect"]').val(data.r_defect);
            $('[name="r_category"]').val(data.r_category);
            $('[name="r_model"]').val(data.r_model);
            $('[name="r_total"]').val(data.r_total);
            $('[name="r_telephone"]').val(data.r_telephone);
            $('[name="r_comment"]').val(data.r_comment);
            $('[name="r_diagnostics"]').val(data.r_diagnostics);
            $('[name="hold_id"]').val(data.r_repairno);

            $('[name="holdidd"]').val(data.hold_id);
            $('[name="rrepairnoo"]').val(data.r_repairno);

            /*ajax panggil modal dan text*/
            $('#viewreparationModal').modal('show');
            $('.modal_title').text('Edit Client');
          },
          error: function (jqXHR, textStatus, errorThrown){
                        alert('error at get data from ajax');
                    }
        });
      }
    </script>