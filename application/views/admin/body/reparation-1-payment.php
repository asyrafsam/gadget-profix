<div class="modal fade" id="addpaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?php echo base_url('func_reparation/add_payment'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row">
                    <input type="hidden" name="paymentholdid">
                    <input type="hidden" name="paymentdateadd"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                    <input type="hidden" name="paymentbranch" value="<?php echo $this->session->userdata('branch');?>">
                    <input type="hidden" name="paymentmadeby" value="<?php echo $this->session->userdata('name');?>">
                    <input type="hidden" name="repairno">
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"><i class="fas fa-fw fa-mobile-alt"></i>| DATE</span>
                      </div>
                        <input type="date" name="pay_date" class="form-control">
                    </div>
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-users"></i>| REFERENCE NO</span>
                      </div>
                        <input type="text" name="pay_ref" class="form-control" value="<?php echo date('Y').'/'.rand(10,1000);?>">
                    </div>
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-file-alt"></i>| AMOUNT</span>
                      </div>
                        <input type="number" name="pay_amount" class="form-control" placeholder="0.00">
                    </div>
                    <div class="form-group input-group col-lg-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;"> <i class="fas fa-fw fa-user"></i>| PAYING BY</span>
                      </div>
                        <select class="form-control" name="pay_type">
                          <option>Cash</option>
                          <option>Credit Card</option>
                          <option>Cheque</option>
                          <option>Other</option>
                        </select>
                    </div>
                  </div>
                  <div class="flex-row col-lg-12">
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal" style="width: 150px;height: 150px;"> <i class="fas fa-fw fa-pen"></i>| Note</span>
                      </div>
                      <textarea class="form-control" name="pay_note" placeholder="Note" style="height: 150px;"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Add Payment</button>
            </div>      
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      // function getDetailEmail($id){
      //   alert($id);
      // }
      var save_method;
      var table;

      function add_payment(id){
        // save_method = 'update';
        // $('#formX')[0].reset();

        /*load data dari ajax sama macam concept atas*/
        $.ajax({
          url:"<?php echo site_url('func_reparation/getReparation/') ;?>" + id,
          type: "GET",
          dataType:"JSON",
          success: function(data){
            /*cara nak tarik value form data menggunakan name*/
            $('[name="paymentholdid"]').val(data.hold_id);
            $('[name="repairno"]').val(data.r_repairno);
            $('[name="payment_holdid"]').val(data.hold_id);
            $('[name="reparationID"]').val(data.r_code);

            /*ajax panggil modal dan text*/
            $('#addpaymentModal').modal('show');
            $('.modal_title').text('Edit Client');
          },
          error: function (jqXHR, textStatus, errorThrown){
                        alert('error at get data from ajax');
                    }
        });
      }
    </script>