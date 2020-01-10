<style type="text/css">

  .header-card a h6 {
   display: inline;
  }
  .print {
    display: inline;
    margin: 0;
    padding: 0;
    text-decoration: none;
  }
  .print {
    display: inline-block;
    text-decoration: none;
  }
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

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Order & Reparation <i class="fas fa-tools"></i></h1>
  <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-0" style="float: left; width: 500px;">
        <?php if($this->session->userdata('repairadd') > 0){?>
        <button class="btn btn-dark" style="text-align: center;height: 33px" data-toggle="modal" data-target="#reparationModal"><h6 class="font-weight-bold center">+ New Reparation</h6></button>
        <?php }?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!-- <div class="print">
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;">
              <i class="fas fa-print fa-sm fa-fw text-blue-400"> Print</i>
            </a>
            <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Export in:</div>
              <a class="dropdown-item" href="#"><i class="fa fa-fw fa-file-pdf"> Pdf</i></a>
              <a class="dropdown-item" href="#"><i class="fa fa-fw fa-file-excel"> Excel</i></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div> -->
      </div>
      
      <ul class="nav nav-tabs" style="float: right;">
        <li class="active"><a href="#">Pending Repairs</a></li>
        <li><a href="<?php echo base_url('admin/reparation_completed') ;?>">Completed Repairs</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="table-responsive" style="width: 100%;">
        <table class="table table-striped table-bordered" id="dataTable" width="50%" cellspacing="0" style="font-size: 13px;color: #000;">
          <thead>
            <tr>
              <th>Reparation Code</th>
              <th>Name</th>
              <th>Type</th>
              <th>Telephone</th>
              <th>Defect</th>
              <th>Model</th>
              <th>Opened At</th>
              <th>Status</th>
              <th>Assigned To</th>
              <th>Created By</th>
              <th>Last Modified</th>
              <th>Files Attached</th>
              <th>Grand Total</th>
              <th>Balance</th>
              <th>Paid</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Reparation Code</th>
              <th>Name</th>
              <th>Type</th>
              <th>Telephone</th>
              <th>Defect</th>
              <th>Model</th>
              <th>Opened At</th>
              <th>Status</th>
              <th>Assigned To</th>
              <th>Created By</th>
              <th>Last Modified</th>
              <th>Files Attached</th>
              <th>Grand Total</th>
              <th>Balance</th>
              <th>Paid</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          
          <tbody>
          <?php
            $test = '1'; 
            foreach ($reparation as $r) 
            {
              $totaltax = $r->r_subtotal + $r->r_tax;
              $all = $totaltax - $r->r_paid;
              if($r->r_statuscompleted == 0){
          ?>
            <tr>
              <td><?php echo $r->r_repairno?></td>
              <td><?php echo $r->r_name?></td>
              <td><?php echo $r->r_type?></td>
              <td><?php echo $r->r_telephone?></td>
              <td><?php echo $r->r_defect?></td>
              <td><?php echo $r->r_model?></td>
              <td><?php echo $r->r_opened?></td>

              <td>
                <div id="dropdownchange">
                  <span style="font-size: 16px; border-radius: 5px; background-color:<?php echo $r->r_statusBGColor?>;color: <?php echo $r->r_statusTextColor?>;font-weight: bold;" onclick="updateStatus('<?php echo $r->r_code?>');"><?php echo $r->r_status?></span>
                  <!-- <a href="" onclick="choose();"><button class="btn" style="background-color:<?php echo $r->r_statusBGColor?>;color: <?php echo $r->r_statusTextColor?>;font-weight: bold;"><?php echo $r->r_status?></button></a> -->
                </div>
              </td>

              <td><?php echo $r->r_assigned?></td>
              <td><?php echo $r->r_created?></td>
              <td><?php echo $r->r_lastmodified?></td>
              <td><a class="dropdown-item" href="<?php echo base_url(). 'func_reparation/download_file/'.$r->r_repairno; ?>"><button class="btn btn-success" style="width: 70px;font-size: 10px;">Download</button></a></td>
              <td><?php echo $totaltax?>.00</td>
              <td><?php echo $all?>.00</td>
              <td><?php echo $r->r_paid?></td>
              <td>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn btn-primary" style="font-size: 12px">Action</button>
                  </a>
                  <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Export in:</div>
                    <a class="dropdown-item" href="#" onclick="view_reparation('<?php echo $r->r_code?>')"><i class="fa fa-fw fa-eye"> &nbsp;View</i></a>
                    <a class="dropdown-item" href="<?php echo base_url(). 'admin/print_reparation_invoice/'.$r->r_repairno; ?>"><i class="fa fa-fw fa-print"> &nbsp;&nbsp;Invoice</i></a>
                    <a class="dropdown-item" href="<?php echo base_url(). 'func_reparation/download_file/'.$r->r_repairno; ?>"><i class="fa fa-fw fa-cloud"> &nbsp;View Attachments</i></a>
                    <a class="dropdown-item" href="#" onclick="view_reparationlog('<?php echo $r->r_repairno?>')"><i class="fa fa-fw fa-clipboard"> &nbsp;View Log</i></a>
                    <a class="dropdown-item" href="#" onclick="view_payment('<?php echo $r->r_code?>')"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;View Payments</i></a>
                    <a class="dropdown-item" href="#" onclick="add_payment('<?php echo $r->r_code?>')"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;Add Payment</i></a>
                    <?php if($this->session->userdata('repairedit') > 0){?>
                      <?php if($r->r_paid <= 0){?>
                    <a class="dropdown-item" href="#" onclick="editReparation('<?php echo $r->r_code?>')"><i class="fa fa-fw fa-edit"> &nbsp;Edit</i></a>
                      <?php }?>
                    <?php }?>
                    <?php if($this->session->userdata('repairdelete') > 0){?>
                    <a class="dropdown-item" href="#" onclick="deleteReparation('<?php echo $r->r_repairno?>')"><i class="fa fa-fw fa-trash"> &nbsp;Delete</i></a>
                    <?php }?>
                    <!-- <a class="dropdown-item" href="#"><i class="fa fa-fw fa-barcode"> &nbsp;Print Barcode</i></a> -->
                  </div>
                </div>
              </td>
            </tr>
              <?php
                }else{
                  echo '';
                }
              $test++;
            
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <form action="<?php echo base_url('func_reparation/add_reparation'); ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="reparationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <?php 
                      date_default_timezone_set('Asia/Kuala_Lumpur');
                    ?>
                    <div class="form-group input-group col-lg-4">
                      <input type="hidden" name="dateopen"  class="form-control" placeholder="<?php date('D-M-Y'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                      <input type="hidden" name="uname" value="<?php echo $this->session->userdata('name');?>">
                      <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                      </div>
                      <select class="form-control" name="addtype">
                        <option value="">Repair Type</option>
                        <option value="PNP">PNP</option>
                        <option value="HSS">HSS</option>
                      </select>
                        <!-- <input type="text" name="addimei" id="search" class="form-control" placeholder="IMEI" list="imei" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                        <datalist id="imei">
                          <?= lookup_r_imei();?>
                        </datalist> -->
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                      </div>
                        <!-- <input type="text" name="addclient" class="form-control" list="repair-client" placeholder="Client">
                        <datalist id="repair-client">
                          <?= lookup_r_client();?>
                        </datalist> -->
                        <select class="form-control" name="clientid" id="dropdownItems" onchange="getClient()">
                          <option value="">Select Client</option>
                          <?php foreach($client as $getc):?>
                          <option value="<?php echo $getc->c_id;?>"><?php echo $getc->c_name;?></option>
                          <?php endforeach;?>
                          <!-- <option value="test">Test</option> -->
                        </select>
                      <input type="hidden" name="addclient" id="clientname" class="form-control">
                      <input type="hidden" name="addclientno" id="clientno" class="form-control">  
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-alt"></i> </span>
                      </div>
                        <input type="text" name="addcategory" class="form-control" placeholder="Category">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-user"></i> </span>
                      </div>
                      <input type="text" name="addassign" class="form-control" placeholder="Assigned to" list="assignselect" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                      <datalist id="assignselect">
                        <?= lookup_r_assign();?>
                      </datalist>
                        <!-- <input type="text" name="addassign" class="form-control" placeholder="Assigned To "> -->
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-building"></i> </span>
                      </div>
                      <input type="text" name="addmanufacturer" class="form-control" placeholder="Manufacturer" list="manufacturerselect" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                      <datalist id="manufacturerselect">
                        <?= lookup_r_manufacturer();?>
                      </datalist>
                        <!-- <input type="text" name="addmanufacturer" class="form-control" placeholder="Manufacturer"> -->
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                      </div>
                        <input type="text" name="addmodel" class="form-control" placeholder="Model" list="model" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                        <datalist id="model">
                          <?= lookup_r_model();?>
                        </datalist>
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                      </div>
                        <input type="text" name="adddefect" class="form-control" placeholder="Defect" list="add-defect" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                        <datalist id="add-defect">
                          <?= lookup_r_defect();?>
                        </datalist>
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-money-bill-alt"></i> </span>
                      </div>
                        <input type="text" name="addservicecharge" class="form-control" id="taxTotal"  placeholder="Service Charges">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-calendar"></i> </span>
                      </div>
                        <input type="text" name="adddate" id="datepicker" class="form-control" placeholder="Expected Close Date">
                    </div>
                    <div class="form-group input-group col-lg-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-wrench"></i> </span>
                      </div>
                        <select class="form-control" name="addperiod">
                          <option>Select</option>
                          <option value="1 Week">1 Week</option>
                          <option value="3 Week">3 Week</option>
                          <option value="1 Month">1 Month</option>
                        </select>
                    </div>
                    <div class="form-group input-group col-lg-12" style="margin-top: 19%;">
                        <textarea class="form-control" name="addcomment" placeholder="Comment" style="height: 150px;"></textarea>
                    </div>
                  </div>
                </div>
                <div class="flex-child col-lg-6">
                  <div class="flex-row">
                    <!-- <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-laptop-code"></i> </span>
                      </div>
                      <select class="form-control" name="addtax">
                        <option>Tax Rate</option>
                        <option value="No Tax">No Tax</option>
                        <option value="VAT">VAT</option>
                      </select>
                    </div> -->
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-link"></i> </span>
                      </div>
                        <select class="form-control" name="additem" id="dropdownItems" onchange="totalIt(this.value);grandTotall();">
                          <option value="">No Selected</option>
                          <?php foreach($item as $row):?>
                          <option value="<?php echo $row->p_id;?>"><?php echo $row->p_name;?></option>
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
                        <tbody id="dataList">

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
                            <td style="text-align: left;"><input type="text" name="subtotal"  id="total_subtotal"></td>
                          </tr>
                          <tr>
                            <td>Service Charges</td>
                            <td style="text-align: left;"><input type="text" name="taxshow" id="taxshow"></td>
                            <td>Grand Total</td>
                            <td style="text-align: left;"><input type="text" name="alltotal" id="grandTotal"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="form-group input-group col-lg-12">
                        <textarea class="form-control" name="adddiagnostics" style="height: 150px;margin-top: 70px;" placeholder="Diagnostics"></textarea>
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
                  <input type="text" name="addrepairstatus" id="addrepairstatus" class="form-control" placeholder="Status" list="repair-status" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                  <datalist id="repair-status">
                    <?= lookup_reparation_status();?>
                  </datalist>
              </div>
              <div class="form-group input-group col-lg-2">
                <div class="input-group-prepend">
                  <span class="input-group-text span-modal"> <i class="fas fa-fw fa-wrench"></i> </span>
                </div>
                  <input type="text" name="addrepairno" class="form-control" placeholder="Repair" value="REPAIR<?= rand(10,10000);?>">
                  
              </div>
              <div class="form-group input-group col-lg-2">
                <div class="input-group-prepend">
                  <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file"></i> </span>
                </div>
                  <input type="file" name="addfile" class="form-control">
              </div>
              <div class="form-group input-group col-lg-2">
                  <a href="" data-toggle="modal" data-target="#signModal"><button class="btn btn-warning">Signature</button></a>
              </div>
              <input type="checkbox" class="chkbox" name="clientemail" id="clientemail">Send Mail &nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button class="btn btn-primary" type="submit">Add Reparation</button>
            </div>      
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="signModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Signature</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-lg-12">

              <div id="signature">
                
              </div>
              <br /> 

              <textarea id='output' name='sig' style="display:none;"></textarea>
              <img src='' id='sign_prev' style='display: none;' /> 
              

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

    <input type="hidden" id="hold_value" name="hold_value" value="<?= rand();?>">


    <input type="hidden" id="id_selected" name="id_selected" value="">


  </form>
  </div>
</div>




<!-- JavaScript Code Part -->
<script type="text/javascript">
      // function getDetailEmail($id){
      //   alert($id);
      // }
      // function updateStatus($id){

      // }
      $(document).ready(function() {
        $('#dataTable').DataTable( {
            "order": [6,'desc'],
            "dom": 'Bfrtip',
            "buttons": [
                        {
                           extend: 'pdf',
                           orientation: 'landscape',
                           exportOptions: {
                           columns: [ 0, 1, 2, 3, 4, 5, 6, 8, 12, 13, 14 ]
                            //Your Colume value those you want
                           }
                         },
                         {
                            extend: 'excel',
                            exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 8, 12, 13, 14 ] //Your Colume value those you want
                         }
                       },
                     ],   
            "pageLength": 100,
            "processing": false,   
            });
        });
      function getClient(){
        var send = $('[name="clientid"]').val();
        var data = {'send':send}
        $.ajax({
                          url: '<?= base_url() ?>func_reparation/getClientDetails',
                          type: 'POST',
                          dataType: 'json',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){

                            var clientname = $("#clientname").val(response.c_name);
                            var clientno = $("#clientno").val(response.c_telephone);
                            var clientemail = $("#clientemail").val(response.c_email);

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
            var $sigdiv = $("#signature").jSignature({
                'UndoButton' : true, 'width': 739, 'height': 200
            });
            true
            $('#click').click(function() {
                // Get response of type image
                var data = $sigdiv.jSignature('getData', 'image');

                // Storing in textarea
                $('#output').val(data);

                // Alter image source 
                $('#sign_prev').attr('src', "data:" + data);
                $('#sign_prev').show();
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

        

        function totalIt(id)
        {
          getDetail(id);
        }

        function getDetail(id)
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

                            var id = response.p_id;
                            var i_name = response.p_name;
                            var i_price = response.p_price;

                            var id_dummy = id;

                            


                            var hold_value = $("#hold_value").val();

                            // alert(i_name);
                            //$("#lab_cerner").val(response.CERNER_MRN);

                            store(id_dummy,i_name,i_price,hold_value); // add 


                          }
                  });
        }

        // Pengiraan berlaku disini
        function kira(id_dummy)
        {
          var itemid = $("#itemid"+id_dummy+"").val();
          var qt = $("#val"+id_dummy+"").val();
          var unit = $("#unit"+id_dummy+"").val();

          //var total_unit = val*unit;
          //$("#unit"+id_dummy+"").val(total_unit);
          var hold_value = $("#hold_value").val();

          update_store(itemid,id_dummy,qt,unit,hold_value);
          //alert(total_unit);
        }

        function store(id,name,price,hold_value)
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
                            getTotal();
                          }
                });
        }


        function update_store(itemid,id,qt,unit,hold_value)
        {
          var data = {'itemid':itemid,'id':id,'qt':qt,'unit':unit,'hold_value':hold_value}
          $.ajax({
                          url: '<?= base_url() ?>func_reparation/update_store',
                          type: 'POST',
                          dataType: 'html',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){
                            getTotal();
                          }
                });
        }

        function getTotal()
        {
          var hold_value = $("#hold_value").val();
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
                            $("#total_subtotal").val(response);
                            getDetailHold(hold_value);
                          
                            var a = Number(document.getElementById('taxTotal').value);
                            //var b = Number(document.getElementById('total_subtotal').value);
                            var b = response;
                            var c = parseFloat(a) + parseFloat(b);

                            $('[name="alltotal"]').val(c);
                          }
                });
        }

        function getDetailHold(hold_value)
        {
          var data = {'hold_value':hold_value}
          $.ajax({
                          url: '<?= base_url() ?>func_reparation/getDetailsHold',
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


                              $('#dataList').html(response);
                          }
                  });
        }

        function deletehold(id){
        // if(confirm('Are you sure?')) {
          var data = {'id':id}
          $.ajax({
                          url: '<?= base_url() ?>func_reparation/deleteprohold',
                          type: 'POST',
                          dataType: 'json',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){
                              var a = Number(document.getElementById('grandTotal').value);
                              var b = response.unit_price;
                              var c = parseFloat(a) - parseFloat(b);
                              var d = Number(document.getElementById('total_subtotal').value);
                              var e = parseFloat(d) - parseFloat(b);
                              var proid = response.id_item;
                              var proqty = response.quantity;
                              $('[name="alltotal"]').val(c);
                              $('[name="subtotal"]').val(e);
                              deleteholdconfirmm(id,proid,proqty);
                          },
                            error: function (jqXHR, textStatus, errorThrown){
                              alert('error at deleting data');
                          }
                  });
          //ajax delete data dari database
        // }
        }
        function deleteholdconfirmm(id,proid,proqty){
        // if(confirm('Are you sure?')) {
            var data = {'id':id,'proid':proid,'proqty':proqty}
          $.ajax({
                          url: '<?= base_url() ?>func_reparation/deletehold',
                          type: 'POST',
                          dataType: 'html',
                          data: data,
                          beforeSend: function() {

                          },
                          success: function(response){
                              var hold_value = $("#hold_value").val();
                              getDetailHold(hold_value);
                          },
                            error: function (jqXHR, textStatus, errorThrown){
                              alert('error at deleting data');
                          }
                  });
          //ajax delete data dari database
        // }
        }
        function deleteReparation(id){
          // if(confirm('Are you sure?')) {
            var data = {'id':id}
            $.ajax({
                            url: '<?= base_url() ?>func_reparation/deleteReparation',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                              return confirm('Confirm delete reparation?');
                            },
                            success: function(response){

                                location.reload();
                            },
                              error: function (jqXHR, textStatus, errorThrown){
                                alert('error at deleting data');
                            }
                    });
            //ajax delete data dari database
          // }
        }

       $("#addrepairstatus").change(function() {
        var g = $('#addrepairstatus').val();
        var id = $('#repair-status option[value="' + g +'"]').attr('id');
        $("#id_selected").val(id);
      });

       function choose(){
          var popup = $('#popup');
       }
  </script>
  <style type="text/css">
    .color-status{
      background-color:#726372;
    }
  </style>



<!-- <script type="text/javascript">
  $('#dataTable').datatable( {
      "order": [0,'asc']
  } );
</script> -->