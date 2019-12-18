<div class="modal fade" id="viewsalesdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Sales Details</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12" id="tableshow">
                  
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

      function view_sales_details(hold_id)
        {
          // $('#viewsalesdetails').modal('show');

          var data = hold_id;
          $.ajax({
                          url: '<?= base_url() ?>func_report/getDetailsModal/' + hold_id,
                          type: 'POST',
                          dataType: 'html',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){
                              

                              // $('#datapayment').html(response);
                              $('#viewsalesdetails').modal('show');
                              $('#tableshow').html(response);
                              $('.modal_title').text('Edit Client');
                              // $('#table_id').DataTable();
                          }
                  });
        }


    </script>