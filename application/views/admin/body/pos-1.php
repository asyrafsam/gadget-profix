<style type="text/css">
  .row{
    position: relative;
  }

  #sailorTableArea{
    max-height: 300px;
    overflow-x: auto;
    overflow-y: auto;
  }
  #sailorTable{
      white-space: normal;
  }
  tbody {
      display:block;
      height:300px;
      overflow:auto;
  }
  #dataList input[type="text"] { 
    border: none 
  }
  #dataList input[type="number"] {
    border: none 
  }
  thead, tbody tr {
      display:table;
      width:100%;
      table-layout:fixed;
  }
  .card-header > select{
    border-radius: 5px;
    color: #928f8f;
  }
/*  .card-header::-webkit-select-placeholder{
    color: #f0f0f0;
  }*/
  .pos-result > .total > input[type="number"]{
      background: transparent;
      border: none;
  }
  .pos-item >input[type="text"]{
    border-radius: 5px;
    color: #928f8f;
    border:1;
  }
  .flex-head{
    display: flex;
    flex-flow: row;
    justify-content: center;
    flex-wrap: wrap;
    height: 50%;
    overflow: auto;
  }
  .flex-head > a{
    text-decoration: none;
  }
  .box1{
    position: relative;
    width: 100px;
    height: 150px;
    margin: 10px;
    border-style: solid;
    border:0;
    border-radius: 10px;
    box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }
  .box1 > img{
    position: absolute;
    width: 100%;
    height: 70%;
    left: 0px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }
    #custom-search-form {
      margin:0;
      margin-top: 5px;
      padding: 0;
    }
 
    #custom-search-form .search-query {
      padding-right: 3px;
      padding-right: 4px \9;
      padding-left: 3px;
      padding-left: 4px \9;
      /* IE7-8 doesn't have border-radius, so don't indent the padding */

      margin-bottom: 0;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      -webkit-transition: width  0.2s ease-in-out;
      -moz-transition:width  0.2s ease-in-out;
      -o-transition: width  0.2s ease-in-out;
      transition: width  0.2s ease-in-out;
    }
 
    #custom-search-form button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }   
    .search-query:focus{
        width: 360px;
    }   
    .box1 p{
      position: absolute;
      margin-top: 127px;
      text-align: center;
      /*width: 100px;*/
      left: 50%;
      transform: translate(-50%, -50%);
      overflow: hidden;
      max-height: 3.6em;
      line-height: 1.1em;
    }
    .flex-row{
      display: flex;
      flex-flow: wrap;
    }
    
</style>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Point of Sale</h1>
  <hr>
  <div class="row">
    <div class="col-lg-7">
      <div class="test span12 col-lg-12">
        <div class="input-append span12">
          <?php $branch = $this->session->userdata('branch');?>
            <input type="text" class="search-query mac-style" placeholder="Search Product" name="listsearch" id="listsearch" list="listaddproduct" style="border-radius: 10px;border: 1.2px solid #e6e6e6;height: 40px;">
            <datalist id="listaddproduct">
              <?=lookup_r_product($branch);?>
            </datalist>
            <input type="hidden" name="id_selectedproduct" id="id_selectedproduct">
            <!-- <button type="submit" class="btn"><i class="fas fa-search"></i></button> -->
        </div>

        <!-- <select class="form-control" name="additem" id="dropdownItems" onchange="totalIt(this.value);grandTotall();" required>
           <option value="">No Selected</option>
           <?php foreach($item as $row):?>
           <option value="<?php echo $row->p_id;?>"><?php echo $row->p_name;?></option>
           <?php endforeach;?>
        </select> -->
      </div>
      
        <div class="flex-head" id="view1">

          <?php 
            foreach ($posdata as $pos) {
          ?>
          <a onclick="view1('<?php echo $pos->hold_id?>')" class="box1 col-lg-2 col-sm-4" style="margin-top:50px;">
            <img src="../images/ProfixLogin.png">
            <p><?php echo $pos->cat_name?></p>
          </a>
          <?php 
            }
          ?>
        </div>
      </div>
    <!-- Supplier -->
    <div class="col-lg-5 cashier">
      <form action="<?php echo base_url('func_pos/addbuying'); ?>" method="post" enctype="multipart/form-data">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;">POS Section</h6>
            <input type="text" name="customerlist" id="customerlist" class="form-control" placeholder="Customer Name" list="customerlist-list" style="float: right; width: 250px;border:1px solid #989898;" required>
            <datalist id="customerlist-list">
              <?= lookup_rr_client();?>
            </datalist>

            <!-- <input type="text" name="addrepairstatus" id="addrepairstatus" class="form-control" placeholder="Status" list="repair-status" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;" required>
                  <datalist id="repair-status">
                    <?= lookup_reparation_status();?>
                  </datalist> -->
          </div>
          <div class="card-body" >
            <table class="table" width="100%" style="font-size: 11px;margin-bottom: 50px;" cellpadding="0" cellspacing="0">
              <thead>
                  <tr>
                      <th width="80">Product</th>
                      <th width="45">Qty</th>
                      <th width="50">Price</th>
                      <th width="50">Tax</th>
                      <th width="65">Discount</th>
                      <th width="65">Delete</th>
                  </tr>
              </thead>
              <tbody id="dataList">

              </tbody>
          </table>
            <hr style="margin-top: -10%;">
            <div class="row pos-result" style="font-weight: bold;" id="totaldisctax">
              
            </div>
            <input type="hidden" name="hold_value" id="hold_value" value="<?= rand(10,20000);?>">
            <input type="hidden" name="uname" value="<?php echo $this->session->userdata('name');?>">
            <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
            <input type="hidden" name="transactionid" class="form-control" placeholder="Repair" value="POS<?= rand(10,20000);?>">
            <hr>
            <div class="col-lg-12" style="text-align: center;">
             <a href="<?php echo base_url('admin/pos'); ?>"><button class="btn btn-danger" type="button" style="width: 40%; height: 100px;">Clear Sale</button></a>
              <!-- <button class="btn btn-danger" style="width: 40%; height: 100px;" >Clear Sale</button> -->
              <a href="" data-toggle="modal" data-target="#signModal"><button class="btn btn-success" style="width: 40%; height: 100px;">Payment</button></a>
            </div>                                                      
          </div>
        </div>
        <div class="modal fade" id="signModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="flex-reparation col-lg-12">
                  <div class="flex-child col-lg-12">
                    <div class="flex-row">
                      <input type="hidden" name="paymentholdid">
                      <input type="hidden" name="paymentdateadd"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>">
                      <input type="hidden" name="paymentbranch" value="<?php echo $this->session->userdata('branch');?>">
                      <input type="hidden" name="paymentmadeby" value="<?php echo $this->session->userdata('name');?>">
                      <input type="hidden" name="transactionID">
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
              <input type="hidden" id="id_selected" name="id_selected" value="">
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <!-- <input type='button' id='click' value='click'> -->
                <button class="btn btn-primary" type="submit">Add Payment</button>
              </div>      
            </div>
          </div>
        </div>
      </form> 
    </div>
  </div>
</div>


<script type="text/javascript">
  $("#listsearch").change(function() {
    var g = $('#listsearch').val();
    var id = $('#listaddproduct option[value="' + g +'"]').attr('id');
    $("#id_selectedproduct").val(id);

    totalIt(id);
  });
  function totalIt(id)
        {
          getDetailsProduct(id);
        }

    function getDetailsProduct(id)
    {
      var data = {'id':id}
      $.ajax({
                      url: '<?= base_url() ?>func_pos/getDetailsProduct',
                      type: 'POST',
                      dataType: 'json',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){

                        var id = response.p_id;
                        var p_name = response.p_name;
                        var p_price = response.p_price;
                        var p_tax = response.p_tax;
                        // var p_price = response.p_;

                        var id_dummy = id;


                        var hold_value = $("#hold_value").val();

                        // alert(i_name);
                        //$("#lab_cerner").val(response.CERNER_MRN);

                        storeproduct(id_dummy,p_name,p_price,hold_value,p_tax); // add 


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
    function kiratax(id_dummy)
    {
      var tax = $("#valtax"+id_dummy+"").val();
      var unit = $("#unit"+id_dummy+"").val();

      //var total_unit = val*unit;
      //$("#unit"+id_dummy+"").val(total_unit);
      var hold_value = $("#hold_value").val();

      update_storetax(id_dummy,tax,unit,hold_value);
      //alert(total_unit);
    }
    function kiradisc(id_dummy)
    {
      var disc = $("#valdisc"+id_dummy+"").val();
      var unit = $("#unit"+id_dummy+"").val();

      //var total_unit = val*unit;
      //$("#unit"+id_dummy+"").val(total_unit);
      var hold_value = $("#hold_value").val();

      update_storedisc(id_dummy,disc,unit,hold_value);
      //alert(total_unit);
    }

    function storeproduct(id,name,price,hold_value,p_tax)
    {
      var data = {'id':id,'name':name,'price':price,'hold_value':hold_value,'p_tax':p_tax}
      $.ajax({
                      url: '<?= base_url() ?>func_pos/saveValue',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        getTotalPos();
                      }
            });
    }


    function update_store(id,qt,unit,hold_value)
    {
      var data = {'id':id,'qt':qt,'unit':unit,'hold_value':hold_value}
      $.ajax({
                      url: '<?= base_url() ?>func_pos/update_store',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        getTotalPos();
                      }
            });
    }
    function update_storetax(id,tax,unit,hold_value)
    {
      var data = {'id':id,'tax':tax,'unit':unit,'hold_value':hold_value}
      $.ajax({
                      url: '<?= base_url() ?>func_pos/update_storetax',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        getTotalPos();
                      }
            });
    }
    function update_storedisc(id,disc,unit,hold_value)
    {
      var data = {'id':id,'disc':disc,'unit':unit,'hold_value':hold_value}
      $.ajax({
                      url: '<?= base_url() ?>func_pos/update_storedisc',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        getTotalPos();
                      }
            });
    }

    function getTotalPos()
    {
      var hold_value = $("#hold_value").val();
      var data = {'hold_value':hold_value}
      $.ajax({
                      url: '<?= base_url() ?>func_pos/getTotal',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        // var test1 = response + tax;
                        // $("#total_subtotal").val(response.total);
                        $("#totaldisctax").html(response);
                        getDetailHold(hold_value);
                      
                        // var a = Number(document.getElementById('valtax').value);
                        // //var b = Number(document.getElementById('total_subtotal').value);
                        // var b = response;
                        // var c = parseFloat(a);

                        // $('[name="alltotaltax"]').val(c);
                      }
            });
    }

    function getDetailHold(hold_value)
    {
      var data = {'hold_value':hold_value}
      $.ajax({
                      url: '<?= base_url() ?>func_pos/getDetailsHold',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){

                          var id = response.id;
                          var p_name = response.pro_name;
                          var p_price = response.pro_price;

                          var id_dummy = id;


                          $('#dataList').html(response);
                      }
              });
    }

    function deletehold(id){
    // if(confirm('Are you sure?')) {
        var data = {'id':id}
      $.ajax({
                      url: '<?= base_url() ?>func_pos/deleteprohold',
                      type: 'POST',
                      dataType: 'json',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){

                          var a = Number(document.getElementById('alltotaltax').value);
                          var b = response.pro_price;
                          var c = parseFloat(a) - parseFloat(b);
                          var d = Number(document.getElementById('allsubtotal').value);
                          var e = parseFloat(d) - parseFloat(b);
                          // $('[name="alltotaltax"]').val(c);
                          var proid = response.pro_id;
                          var proqty = response.pro_qty;
                          $('[name="allsubtotal"]').val(e);
                          deleteholdconfirm(id,proid,proqty);
                      },
                        error: function (jqXHR, textStatus, errorThrown){
                          alert('error at deleting data');
                      }
              });
      //ajax delete data dari database
    // }
    }

    function deleteholdconfirm(id,proid,proqty){
        // if(confirm('Are you sure?')) {
            var data = {'id':id,'proid':proid,'proqty':proqty}
          $.ajax({
                          url: '<?= base_url() ?>func_pos/deletehold',
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
  $(document).ready(function (){
    //view1();
  });
  // function clearsale(){
  //   var holdidd = document.getElementById("hold_value").value;
  //   var data = {'id':holdidd}
  //   $.ajax({
  //           url: '<?= base_url() ?>func_pos/clearpos',
  //           type: 'POST',
  //           dataType: 'html',
  //           data: data,
  //           beforeSend: function() {

  //           },
  //           success: function(response){

  //               // $('#view1').html(response);
  //           }
  //   });
  // }
  function view1(id)
  {
    var data = {'id':id}
    $.ajax({
                    url: '<?= base_url() ?>func_pos/viewsubpos',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

                        $('#view1').html(response);
                    }
            });
  }

  function addpayment(){
    $('#addpaymentModal').modal('show');
  }

  $("#customerlist").change(function() {
    var g = $('#customerlist').val();
    var id = $('#customerlist-list option[value="' + g +'"]').attr('id');
    $("#id_selected").val(id);
  });
</script>