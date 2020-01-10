<form action="<?php echo base_url('func_reparation/editStatus'); ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editReparationStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-12">
                  <div class="flex-row">
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-pen"></i> </span>
                      </div>
                        <input type="hidden" name="editReparationcodestatus" id="editReparationcodestatus">
                        <input type="text" name="editReparationstatus" id="editReparationstatus" class="form-control" placeholder="Status" list="editreparation-status" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                        <datalist id="editreparation-status">
                          <?= lookup_reparation_status();?>
                        </datalist>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex-reparation col-lg-12">
                
              </div>
            </div>
            <div class="modal-footer">
              
              <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button class="btn btn-primary" type="submit">Change Status</button>
            </div>      
          
        </div>
      </div>
    </div>


    <input type="hidden" id="hold_editvaluestatus" name="hold_editvaluestatus">
    <input type="hidden" id="id_selectededitstatus" name="id_selectededitstatus" value="">
  </form>
<script type="text/javascript">
var save_method;
var table;

function updateStatus(id){
  // save_method = 'update';
  // $('#formX')[0].reset();

  /*load data dari ajax sama macam concept atas*/
  $.ajax({
    url:"<?php echo site_url('func_reparation/getReparationEditStatus/') ;?>" + id,
    type: "GET",
    dataType:"JSON",
    success: function(data){
      /*cara nak tarik value form data menggunakan name*/
      $('[name="hold_editvaluestatus"]').val(data.hold_id);
      $('[name="editReparationcodestatus"]').val(data.r_code);
      $('[name="editReparationstatus"]').val(data.r_status);
      // $('[name="editImei"]').val(data.r_imei);

      /*ajax panggil modal dan text*/
      $('#editReparationStatus').modal('show');
      $('.modal_title').text('Edit Client');
    },
    error: function (jqXHR, textStatus, errorThrown){
                  alert('error at get data from ajax');
              }
  });
}


  $("#editReparationstatus").change(function() {
        var g = $('#editReparationstatus').val();
        var id = $('#editreparation-status option[value="' + g +'"]').attr('id');
        $("#id_selectededitstatus").val(id);
      });

       function choose(){
          var popup = $('#popup');
       }
</script>