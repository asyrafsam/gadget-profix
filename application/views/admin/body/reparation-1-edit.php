<form action="<?php echo base_url('func_reparation/edit_reparation'); ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editReparation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <div class="flex-child col-lg-6">
                  <div class="flex-row">
                    <div class="form-group input-group col-lg-4">
                      <input type="hidden" name="editDateopen"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                      <input type="hidden" name="uname" value="<?php echo $this->session->userdata('name');?>">
                      <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                      </div>
                        <input type="text" name="editImei" id="search" class="form-control" placeholder="IMEI" list="imei" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                        <datalist id="imei">
                          <?= lookup_r_imei();?>
                        </datalist>
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                      </div>
                        <select class="form-control" name="editClientid" id="dropdownItems" onchange="getClientEdit()">
                          <option value="">Select Client</option>
                          <?php foreach($client as $getc):?>
                          <option value="<?php echo $getc->c_id;?>"><?php echo $getc->c_name;?></option>
                          <?php endforeach;?>
                          <!-- <option value="test">Test</option> -->
                        </select>
                      <input type="hidden" name="editName" id="editName" class="form-control">
                      <input type="hidden" name="editTelephone" id="editTelephone" class="form-control">  
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-alt"></i> </span>
                      </div>
                        <input type="text" name="editCategory" class="form-control" placeholder="Category">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-user"></i> </span>
                      </div>
                        <input type="text" name="editAssign" class="form-control" placeholder="Assigned To ">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-building"></i> </span>
                      </div>
                        <input type="text" name="editManufacturer" class="form-control" placeholder="Manufacturer">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                      </div>
                        <input type="text" name="editModel" class="form-control" placeholder="Model" list="model" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                        <datalist id="model">
                          <?= lookup_r_model();?>
                        </datalist>
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                      </div>
                        <input type="text" name="editDefect" class="form-control" placeholder="Defect" list="add-defect" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                        <datalist id="add-defect">
                          <?= lookup_r_defect();?>
                        </datalist>
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-money-bill-alt"></i> </span>
                      </div>
                        <input type="text" name="editServicecharge" class="form-control" id="editTaxTotal"  placeholder="Service Charges">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-calendar"></i> </span>
                      </div>
                        <input type="text" name="editDate" id="datepicker" class="form-control" placeholder="Expected Close Date">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-wrench"></i> </span>
                      </div>
                        <select class="form-control" name="editPeriod">
                          <option>Select</option>
                          <option value="1 Week">1 Week</option>
                          <option value="3 Week">3 Week</option>
                          <option value="1 Month">1 Month</option>
                        </select>
                    </div>
                    <div class="form-group input-group col-lg-12" style="margin-top: 19%;">
                        <textarea class="form-control" name="editComment" placeholder="Comment" style="height: 150px;"></textarea>
                    </div>
                  </div>
                </div>
                <div class="flex-child col-lg-6">
                  <div class="flex-row">
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-laptop-code"></i> </span>
                      </div>
                      <select class="form-control" name="editTax">
                        <option>Tax Rate</option>
                        <option value="No Tax">No Tax</option>
                        <option value="VAT">VAT</option>
                      </select>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-link"></i> </span>
                      </div>
                        <select class="form-control" name="editItem" id="dropdownItems" onchange="getItem(this.value);">
                          <option value="">No Selected</option>
                          <?php foreach($item as $row):?>
                          <option value="<?php echo $row->id;?>"><?php echo $row->i_name;?></option>
                          <?php endforeach;?>
                        </select>            
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <table class="table table-striped table-bordered" cellspacing="0" style="font-size: 13px;width: 152%;">
                        <thead style="font-weight: bold;color: black;">
                          <tr>
                            <th>Product Name(Product Code)</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody id="editdataList">

                        </tbody>
                      </table>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <table class="table table-border-custom" cellspacing="0" style="font-size: 13px;width: 152%;">
                        <tbody style="background-color: #efd2d7;color: #000;text-align: right;font-weight: bold;">
                          <tr>
                            <td>Tax</td>
                            <td style="text-align: left;">0</td>
                            <td>Subtotal</td>
                            <td style="text-align: left;"><input type="text" name="editSubtotal"  id="editTotal_subtotal"></td>
                          </tr>
                          <tr>
                            <td>Service Charges</td>
                            <td style="text-align: left;"><input type="text" name="editTaxshow" id="editTaxshow"></td>
                            <td>Grand Total</td>
                            <td style="text-align: left;"><input type="text" name="editAlltotal" id="editAlltotal"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="form-group input-group col-lg-12">
                        <textarea class="form-control" name="editDiagnostics" style="height: 150px;" placeholder="Diagnostics"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex-reparation col-lg-12">
                
              </div>
            </div>
            <div class="modal-footer">
              <div class="form-group input-group col-lg-2">
                <div class="input-group-prepend">
                  <span class="input-group-text span-modal"> <i class="fas fa-fw fa-calendar"></i> </span>
                </div>
                  <input type="text" name="editRepairstatus" class="form-control" placeholder="Status" list="editrepair-status" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                  <datalist id="editrepair-status">
                    <?= lookup_reparation_status();?>
                  </datalist>
              </div>
              <div class="form-group input-group col-lg-2">
                <div class="input-group-prepend">
                  <span class="input-group-text span-modal"> <i class="fas fa-fw fa-wrench"></i> </span>
                </div>
                  <input type="text" name="editRepairno" class="form-control" placeholder="Repair">
                  
              </div>
              <div class="form-group input-group col-lg-2">
                <div class="input-group-prepend">
                  <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file"></i> </span>
                </div>
                  <input type="file" name="editFile" class="form-control">
              </div>
              <div class="form-group input-group col-lg-2">
                  <a href="" data-toggle="modal" data-target="#signnModal"><button class="btn btn-warning">Signature</button></a>
              </div>
              <input type="checkbox" class="chkbox" name="editEmail" id="editEmail">Send Mail &nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button class="btn btn-primary" type="submit">Add Reparation</button>
            </div>      
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="signnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Signature</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-lg-12">

              <div id="signaturee">
                
              </div>
              <br/> 

              <textarea id='editoutput' name='editSig'></textarea>
              <img src='' id='sign_prev2' style='display: none;' /> 
              

            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <!-- <input type='button' id='click' value='click'> -->
            <button type="button" class="btn btn-primary" id="click" value="click">Save Changes</button>
          </div>      
        </div>
      </div>
    </div>

    <input type="hidden" id="hold_editvalue" name="hold_editvalue">
  </form>
<script type="text/javascript">
var save_method;
var table;

function editReparation(id){
  // save_method = 'update';
  // $('#formX')[0].reset();

  /*load data dari ajax sama macam concept atas*/
  $.ajax({
    url:"<?php echo site_url('func_reparation/getReparationEdit/') ;?>" + id,
    type: "GET",
    dataType:"JSON",
    success: function(data){
      /*cara nak tarik value form data menggunakan name*/
      $('[name="hold_editvalue"]').val(data.hold_id);
      $('[name="editImei"]').val(data.r_imei);
      $('[name="editClientid"]').val(data.c_id);
      $('[name="editName"]').val(data.r_name);
      $('[name="editTelephone"]').val(data.r_telephone);
      $('[name="editCategory"]').val(data.r_category);
      $('[name="editAssign"]').val(data.r_assigned);
      $('[name="editManufacturer"]').val(data.r_manufacturer);
      $('[name="editModel"]').val(data.r_model);
      $('[name="editDefect"]').val(data.r_defect);
      $('[name="editServicecharge"]').val(data.r_servicecharge);
      $('[name="editDate"]').val(data.r_closedate);
      $('[name="editPeriod"]').val(data.r_period);
      $('[name="editComment"]').val(data.r_comment);
      $('[name="editTax"]').val(data.r_taxtype);
      $('[name="editSubtotal"]').val(data.r_subtotal);
      $('[name="editTaxshow"]').val(data.r_tax);
      $('[name="editAlltotal"]').val(data.r_total);
      $('[name="editDiagnostics"]').val(data.r_diagnostics); //tbl_repair_details
      $('[name="editRepairstatus"]').val(data.r_repairstatus); //tbl_repair_details
      $('[name="editRepairno"]').val(data.r_repairno); 
      $('[name="editEmail"]').val(data.r_email);
      $('[name="editSig"]').val(data.r_signature);

      /*ajax panggil modal dan text*/
      $('#editReparation').modal('show');
      $('.modal_title').text('Edit Client');
    },
    error: function (jqXHR, textStatus, errorThrown){
                  alert('error at get data from ajax');
              }
  });
}

  function getClientEdit(){
    var send = $('[name="editClientid"]').val();
    var data = {'send':send}
    $.ajax({
                      url: '<?= base_url() ?>func_reparation/getClientDetails',
                      type: 'POST',
                      dataType: 'json',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){

                        var clientname = $("#editName").val(response.c_name);
                        var clientno = $("#editTelephone").val(response.c_telephone);
                        var clientemail = $("#editEmail").val(response.c_email);

                      }
              });
  }
  function grandTotall() 
  {
      var a = Number(document.getElementById('taxTotal').value);
      $('[name="taxshow"]').val(a);
  }

  function plusop(b)
  {
    //alert(b);
  }

  $(document).ready(function() {

        // Initialize jSignature
        var $sigdiv = $("#signaturee").jSignature({
            'UndoButton' : true, 'width': 739, 'height': 200
        });
        true
        $('#click').click(function() {
            // Get response of type image
            var data = $sigdiv.jSignature('getData', 'image');

            // Storing in textarea
            $('#editoutput').val(data);

            // Alter image source 
            $('#sign_prev2').attr('src', "data:" + data);
            $('#sign_prev2').show();
        });
    });

    $(document).ready(function() {
      $('input[type="checkbox"]').change(function() {
        $('input[value="' + this.value + '"]:checkbox').prop('checked', this.checked);
        $(".div1").toggle(this.checked);
      });
    });
    $( function() {
      $( "#datepicker" ).datepicker();
    } );


function getItem(id)
{
  getDetailEdit(id);
}

function getDetailEdit(id)
{
  var data = {'id':id}
  $.ajax({
                  url: '<?= base_url() ?>func_reparation/getDetails',
                  type: 'POST',
                  dataType: 'json',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){

                    var id = response.id;
                    var i_name = response.i_name;
                    var i_price = response.i_price;

                    var id_dummy = id;

                    


                    var hold_value = $("#hold_editvalue").val();

                    // alert(i_name);
                    //$("#lab_cerner").val(response.CERNER_MRN);

                    storeEdit(id_dummy,i_name,i_price,hold_value); // add 


                  }
          });
}

// Pengiraan berlaku disini
function kira(id_dummy)
{
  var qt = $("#vall"+id_dummy+"").val();
  var unit = $("#unitt"+id_dummy+"").val();

  //var total_unit = val*unit;
  //$("#unit"+id_dummy+"").val(total_unit);
  var hold_value = $("#hold_editvalue").val();

  update_storeEdit(id_dummy,qt,unit,hold_value);
  //alert(total_unit);
}

function storeEdit(id,name,price,hold_value)
{
  var data = {'id':id,'name':name,'price':price,'hold_value':hold_value}
  $.ajax({
                  url: '<?= base_url() ?>func_reparation/saveValue',
                  type: 'POST',
                  dataType: 'html',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){
                    getTotalEdit();
                  }
        });
}


function update_storeEdit(id,qt,unit,hold_value)
{
  var data = {'id':id,'qt':qt,'unit':unit,'hold_value':hold_value}
  $.ajax({
                  url: '<?= base_url() ?>func_reparation/update_store',
                  type: 'POST',
                  dataType: 'html',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){
                    getTotalEdit();
                  }
        });
}

function getTotalEdit()
{
  var hold_value = $("#hold_editvalue").val();
  var data = {'hold_value':hold_value}
  $.ajax({
                  url: '<?= base_url() ?>func_reparation/getTotal',
                  type: 'POST',
                  dataType: 'html',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){
                    // var test1 = response + tax;
                    $("#editTotal_subtotal").val(response);
                    getDetailHoldEdit(hold_value);
                  
                    var a = Number(document.getElementById('editTaxTotal').value);
                    //var b = Number(document.getElementById('total_subtotal').value);
                    var b = response;
                    var c = parseFloat(a) + parseFloat(b);

                    $('[name="editAlltotal"]').val(c);
                  }
        });
}

function getDetailHoldEdit(hold_value)
{
  var data = {'hold_value':hold_value}
  $.ajax({
                  url: '<?= base_url() ?>func_reparation/getDetailsHoldEdit',
                  type: 'POST',
                  dataType: 'html',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){

                      var id = response.id;
                      var p_name = response.product_name;
                      var p_price = response.unit_price;

                      var id_dummy = id;


                      $('#editdataList').html(response);
                  }
          });
}

function deleteholdEdit(id){
// if(confirm('Are you sure?')) {
    var data = {'id':id}
  $.ajax({
                  url: '<?= base_url() ?>func_reparation/deletehold',
                  type: 'POST',
                  dataType: 'html',
                  data: data,
                  beforeSend: function() {

                  },
                  success: function(response){

                      var hold_value = $("#hold_editvalue").val();
                      getDetailHoldEdit(hold_value);
                  },
                    error: function (jqXHR, textStatus, errorThrown){
                      alert('error at deleting data');
                  }
          });
  //ajax delete data dari database
// }
}
</script>