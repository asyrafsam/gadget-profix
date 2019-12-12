<div class="modal fade" id="viewaddsubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <form action="<?php echo base_url('func_stock/add_subcategory');?>" method="post">
    <!-- <input type="hidden" name="catholdid" value="<?php echo rand(10,9999);?>"> -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product Sub Category</h5>
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
                    <span class="input-group-text span-modal"><i class="fas fa-fw fa-mobile-alt"></i>| Choose Category &nbsp;</span>
                    </div>
                        <select name="holdidcategory" onchange="get_existscategories();" class="form-control">
                          <?php foreach($productcat as $cat):?>
                            <option value="<?php echo $cat->cat_id;?>"><?php echo $cat->cat_name;?></option>
                          <?php endforeach;?>
                        </select>
                </div>
                <input type="hidden" name="categoryholdid" id="categoryholdid">
                <div class="form-group input-group col-lg-12">
                  <div class="input-group-prepend">
                    <a href="#" style="text-decoration: none;" class="add_field_button"><span class="input-group-text span-modal col-lg-12"> <i class="fas fa-fw fa-users"></i>| + Sub Category</span></a>
                  </div>
                  <div class="input_fields_wrap2">
                    <div><input type="text" name="subnamee[subnamee][]" class="form-control" style="width: 229px;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="rrepairnoo">
          <input type="hidden" name="holdidd">
          <input type="hidden" name="datechange"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
          <input type="hidden" name="uuubranch" value="<?php echo $this->session->userdata('branch');?>">
          <input type="hidden" name="changeStatus" value="<?php echo $this->session->userdata('name');?>">
          <input type="hidden" name="rcode">
          <input type="hidden" name="kiraaa" id="kurrkurr">
          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-file"></i>Submit</button>
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

  function add_subcategory(){

        $('#viewaddsubcategoryModal').modal('show');
        $('.modal_title').text('Edit Client');

  }

  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper       = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      if(x < max_fields){ //max input box allowed
        var kurkur = x++; //text box increment
        // var kurkur = x++;
        $(wrapper).append('<div class="input-group-prepend"><span class="input-group-text span-modal remove_fieldd"> <i class="fas fa-fw fa-trash"></i></span><input type="text" name="subnamee[subnamee][]" class="form-control"/></div>'); 

        $('#kurrkurr').val(kurkur);
        //add input box
      }
    });
    
    $(wrapper).on("click",".remove_fieldd", function(e){ //user click on remove text
      e.preventDefault(); $(this).parent('div').remove(); x--;
    })
  });

  function get_existscategories(){
    var send = $('[name="holdidcategory"]').val();
    var data = {'send':send}
    $.ajax({
                      url: '<?= base_url() ?>func_stock/getCategoryDetailsHoldid',
                      type: 'POST',
                      dataType: 'json',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){

                        // var clientname = $("#clientname").val(response.c_name);
                        // var clientno = $("#clientno").val(response.c_telephone);
                        var catholdid = $("#categoryholdid").val(response.hold_id);
                        // $('#addsubcategory').html(response);

                      }
              });
  }
</script>