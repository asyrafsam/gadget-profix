<div class="modal fade" id="viewpaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Payment</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row col-lg-12">
                    <table class="table" cellspacing="0" style="font-size: 13px;width: 100%;">
                      <thead style="background-color: #f0f0f0;color: #000;text-align: center;font-weight: bold;">
                        <tr>
                          <td>Date</td>
                          <td>Amount</td>
                          <td>Paid by</td>
                          <td>Actions</td>
                        </tr>
                      </thead>
                      <tbody id="datapayment" style="background-color: #f0f0f0;color: #000;text-align: center;font-weight: bold;">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <!-- <button class="btn btn-primary">Add Payment</button> -->
            </div>      
        </div>
      </div>
    </div>
    <script type="text/javascript">
      var save_method;
      var table;

      // function view_payment(id){
      //   // save_method = 'update';
      //   // $('#formX')[0].reset();

      //   /*load data dari ajax sama macam concept atas*/
      //   $.ajax({
      //     url:"<?php echo site_url('func_reparation/getPayment/') ;?>" + id,
      //     type: "GET",
      //     dataType:"JSON",
      //     success: function(data){
      //       /*cara nak tarik value form data menggunakan name*/
      //       $('[name="rrepairno"]').val(data.r_repairno);
      //       $('[name="paydate"]').html(data.pay_date);
      //       $('[name="payamount"]').html(data.pay_amount);
      //       $('[name="paytype"]').html(data.pay_type);
      //       // $('[name="payholddelete"]').html(data.hold_id);
      //       /*ajax panggil modal dan text*/
      //       $('#viewpaymentModal').modal('show');
      //       $('.modal_title').text('Edit Client');
      //       // var rrepairnoo = $("#rrepairno").val();
      //       // view_reparationpayment(rrepairnoo);
      //     },
      //     error: function (jqXHR, textStatus, errorThrown){
      //           alert('error at get data from ajax');
      //       }
      //   });
      // }
      function view_paymentsales(id)
        {
          var data = id;
          $.ajax({
                          url: '<?= base_url() ?>func_report/getPaymentSales/' + id,
                          type: 'POST',
                          dataType: 'html',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){
                              

                              $('#datapayment').html(response);
                              $('#viewpaymentModal').modal('show');
                              $('.modal_title').text('Edit Client');
                              // $('#table_id').DataTable();
                          }
                  });
        }


    </script>