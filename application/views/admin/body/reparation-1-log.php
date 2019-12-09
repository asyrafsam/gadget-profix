<div class="modal fade" id="viewreparationlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reparation Log</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row col-lg-12">
                    <div class="table-responsive">
                      <hr>
                      <table class="table table-striped table-bordered" id="table_id" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                          <tr>
                            <th>Check</th>
                            <th>Image</th>
                            <th>Code</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Check</th>
                            <th>Image</th>
                            <th>Code</th>
                          </tr>
                        </tfoot>
                        <tbody id="dataListLog" style="color: #000000;">

                        </tbody>
                      </table>
                    </div>
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
      $(document).ready(function() {
        
        console.log('a');
                              
      })
      var save_method;
      var table;

      function view_reparationlog(id)
        {
          var data = {'id':id}
          $.ajax({
                          url: '<?= base_url() ?>func_reparation/getReparationLog',
                          type: 'POST',
                          dataType: 'html',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){
                              

                              $('#dataListLog').html(response);
                              $('#viewreparationlogModal').modal('show');
                              $('.modal_title').text('Edit Client');
                              $('#table_id').DataTable();
                          }
                  });
        }

    </script>