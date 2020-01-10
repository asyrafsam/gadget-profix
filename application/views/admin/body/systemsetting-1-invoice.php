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
  .flex-parent{
    display: flex;
    flex-flow: row;
    flex-wrap: nowrap;
  }
</style>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">System Setting <i class="fas fa-tools"></i></h1>
  <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-0" style="float: left; width: 500px;">

      </div>
      
      <ul class="nav nav-tabs" style="float: left;">
        <li class="active"><a href="#">Invoice Template</a></li>
        <li><a href="<?php echo base_url('admin/reparation_completed') ;?>">Completed Repairs</a></li>
<!--         <li><a href="<?php echo base_url('admin/reparation_completed') ;?>">Completed Repairs</a></li>
        <li><a href="<?php echo base_url('admin/reparation_completed') ;?>">Completed Repairs</a></li>
        <li><a href="<?php echo base_url('admin/reparation_completed') ;?>">Completed Repairs</a></li> -->
      </ul>
    </div>
    <div class="card-body">
      <form class="row" action="<?php echo base_url('func_setting/updateInvoice'); ?>" method="post" id="form" enctype="multipart/form-data">
      <div class="flex-parent col-lg-12">
        <div class="col-lg-6">
          <div class="card shadow mb-4">
            <!-- Product Basic Details -->
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Invoice Details</h6>
            </div>
            <div class="card-body">
              <?php
                foreach ($invoicedetails as $details) {
                  # code...
              ?>
              <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-file-signature"></i> </span>
               </div>
                  <input name="name" class="form-control" placeholder="Invoice Name" type="text" value="<?php echo $details->invoiceName ?>">
              </div> 
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-globe"></i> </span>
               </div>
                  <input name="email" class="form-control" placeholder="Invoice Email" type="text" value="<?php echo $details->invoiceEmail ?>">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-map-marker"></i> </span>
               </div>
                  <input name="addr" class="form-control" placeholder="Address" type="text" value="<?php echo $details->invoiceAddr ?>">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-phone"></i> </span>
               </div>
                  <input name="phone" class="form-control" placeholder="Invoice Telephone" type="text" value="<?php echo $details->invoiceTel ?>">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-pen"></i> </span>
                </div>
                  <textarea name="disclaimer" class="form-control" placeholder="Disclaimer" rows="5"><?php echo $details->invoiceDisclaimer ?></textarea>
              </div> <!-- form-group// -->    
              <?php
                }
              ?>                                                                                            
            </div>
          </div>
        </div>
        <!-- Supplier -->
        <div class="col-lg-6">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Invoice Logo</h6>
            </div>
            <div class="card-body">
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-image"></i> </span>
               </div>
                  <input name="image" class="form-control" placeholder="Product Image" type="file">
              </div>                                                                        
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Submit Section</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Change Invoice Details  </button>
            </div> <!-- form-group// -->      
            <p class="text-center" style="color: red;">Please ensure that all the fill are inserted before submit </p> 
            </div>
          </div> 
        </div>
      </div>
      </form>
    </div>
  </div>




<!-- JavaScript Code Part -->
<script type="text/javascript">
      // function getDetailEmail($id){
      //   alert($id);
      // }
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

                            var id = response.id;
                            var i_name = response.i_name;
                            var i_price = response.i_price;

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
          var qt = $("#val"+id_dummy+"").val();
          var unit = $("#unit"+id_dummy+"").val();

          //var total_unit = val*unit;
          //$("#unit"+id_dummy+"").val(total_unit);
          var hold_value = $("#hold_value").val();

          update_store(id_dummy,qt,unit,hold_value);
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


        function update_store(id,qt,unit,hold_value)
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
  </script>


