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
  /*tbody {
      display:block;
      height:300px;
      overflow:auto;
  }
  thead, tbody tr {
      display:table;
      width:100%;
      table-layout:fixed;
  }*/
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
  }
  .box1 > img{
    position: absolute;
    width: 100%;
    height: 70%;
    left: 0px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }   
  .card-body{
    display: flex;
    flex-flow: row wrap;
  }
  .div1 {
    display: none; 
  }
  .flex-more{
    display:flex;
    flex-flow: row wrap;
  }
</style>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Purchase</h1>
  <hr>
  <?php foreach($purchase as $pu) {?>
  <div class="row">
    <form action="<?php echo base_url(). 'func_purchase/updatepurchase'; ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
      
    <div class="col-lg-12">
      
      <div class="card shadow mb-4">
        <!-- Product Basic Details -->
        
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Details</h6>
        </div>
        <div class="card-body col-lg-12">
          <div class="form-group input-group col-lg-4">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-calendar-alt"></i> </span>
            </div>
            <input type="text" name="date"  class="form-control" placeholder="<?php date('Y-M-D'); ?>" value="<?php echo date("Y-m-d"). ' ' .date("h:i:sa"); ?>" readonly>
              <!-- <input type="date" name="date" class="form-control" placeholder="<?php date('Y-M-D'); ?>"> -->
          </div>
          
          <div class="form-group input-group col-lg-4">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-laptop-code"></i> </span>
           </div>
              <input type="text" name="refno" class="form-control" placeholder="Reference No" value="<?php echo $pu->pur_ref?>">
          </div>
          <div class="form-group input-group col-lg-4">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-folder"></i> </span>
          </div>
            <select class="form-control" name="status">
              <option selected="" value="<?php echo $pu->pur_status?>"><?php echo $pu->pur_status?></option>
              <option value="Received">Received</option>
              <option value="Pending">Pending</option>
              <option value="Ordered">Ordered</option>
            </select>
          </div> 
          <div class="form-group input-group col-lg-4">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-file-signature"></i> </span>
           </div>
              <input type="file" name="file" class="form-control">
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <!-- Product Basic Details -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Supplier</h6>
        </div>
        <div class="card-body">
          <div class="form-group input-group col-lg-4">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-folder"></i> </span>
          </div>
            <input type="text" name="supplier" id="search" class="form-control" placeholder="Supplier" list="supplier" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                <datalist id="supplier">
                  <?= lookup_p_supplier();?>
                </datalist>
          </div> 
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <!-- Product Basic Details -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Supplier</h6>
        </div>
        <div class="card-body">
          <div class="form-group input-group col-lg-12">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-barcode"></i> </span>
              </div>
                <select class="form-control" name="itemid" id="dropdownItems" onchange="totalIt(this.value)" required>
                  <option value="">No Selected</option>
                  <?php foreach($item as $row):?>
                  <option value="<?php echo $row->id;?>"><?php echo $row->i_name;?></option>
                  <?php endforeach;?>
                </select>  
            </div>
            <div style="top:10px;">
              <h6 style="font-weight: bold;color: black;">Order Items</h6>
               <table class="table table-striped table-bordered" cellspacing="0" style="font-size: 13px;width: 152%;">
                <thead style="font-weight: bold;color: black;">
                  <tr>
                    <th>Product Name(Product Code)</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Tax</th>
                    <th>Subtotal(RM)</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot style="font-weight: bold;color: black;">
                  <tr>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><input type="text" name="total" id="total_subtotal" readonly></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody id="dataList">

                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group input-group col-lg-12">
            <div>
              <input type="checkbox" onclick="optionsmore();" id="more" value="one">More Options
            </div>
            <div class="div1 col-lg-12" id="fn">
              <br>
              <div class="flex-more col-lg-12" >
                <div class="form-group input-group col-lg-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-fw fa-folder"></i> </span>
                </div>
                  <select class="form-control" name="tax">
                    <option selected="" value="<?php echo $pu->pur_tax?>"><?php echo $pu->pur_tax?></option>
                    <option value="notax">No Tax</option>
                    <option value="VAT">VAT</option>
                  </select>
                </div> 
                <div class="form-group input-group col-lg-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-fw fa-percentage"></i> </span>
                  </div>
                  <input class="form-control" id="discount" name="discount" onchange="disc();" placeholder="Discount" value="<?php echo $pu->pur_discount?>" type="text">
                </div>
                <div class="form-group input-group col-lg-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-fw fa-dolly"></i> </span>
                  </div>
                  <input  class="form-control" name="ship" placeholder="Shipping" type="text" value="<?php echo $pu->pur_ship?>">
                </div>
              </div>
            </div>
          </div>
          
            <!-- Textarea -->
            <textarea class='editor' name='content'>
            <?php if(isset($content)){ echo $content; } ?> <?php echo $pu->pur_note?>
            </textarea>
            <br>
            <div>
              <button type="submit" class="btn btn-primary" name="submit" style="margin-top: 10px;margin-bottom: 10px;">Submit</button>
              <button type="cancel" class="btn btn-danger" name="submit" style="margin-top: 10px;margin-bottom: 10px;">Cancel</button>
            </div>
            
            <input type="hidden" name="holdd" id="hold_value" value="<?php echo $pu->hold_id?>">
          <?php }?>
          </form>
          <table class="table table-striped table-bordered" cellspacing="0" style="font-size: 13px;width: 152%;">
            <tbody>
              <tr>
                <td>Items</td>
                <td></td>
                <td>Total</td>
                <td></td>
                <td>Order Discount</td>
                <td></td>
                <td>Order Tax</td>
                <td></td>
                <td>Shipping</td>
                <td></td>
                <td>Grand Total</td>
                <td><input type="text" name="alltotal" id="alltotaltotal" readonly></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  tinymce.init({ 
    selector:'.editor',
    theme: 'modern',
    height: 200,
    width: 1120
  });

  function optionsmore(){
    var checkbox = document.getElementById('more');
      if (checkbox.checked != true){
        $("#fn").hide();
      }else{
        $("#fn").show('slow', function(){

        });
      }
  }
  function disc(){
    var discountt = $("#discount").val();
    var totalall = $("#total_subtotal").val();
    var per = 100;
    var calpercentage = discountt / per;
    var calall = calpercentage * totalall;
    var conclusion = totalall - calall;
    // document.getElementById("alltotaltotal").innerHTML = conclusion;
    $('[name="alltotal"]').val(conclusion);
  }
  function totalIt(id)
  {
    getDetail(id);
  }

  function getDetail(id)
  {
    var data = {'id':id}
    $.ajax({
                    url: '<?= base_url() ?>func_purchase/getDetails',
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
    var discount = $("#discount"+id_dummy+"").val();
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
                    url: '<?= base_url() ?>func_purchase/saveValue',
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
                    url: '<?= base_url() ?>func_purchase/update_store',
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
                    url: '<?= base_url() ?>func_purchase/getTotal',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                      // var test1 = response + tax;
                      $("#total_subtotal").val(response);
                      getDetailHold(hold_value);
                    }
          });
  }

  function getDetailHold(hold_value)
  {
    var data = {'hold_value':hold_value}
    $.ajax({
                    url: '<?= base_url() ?>func_purchase/getDetailsHold',
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
                        $('[name="alltotal"]').val(data.total);

                        $('#dataList').html(response);
                    }
            });
  }

  function deletehold(id){
  // if(confirm('Are you sure?')) {
      var data = {'id':id}
    $.ajax({
                    url: '<?= base_url() ?>func_purchase/deletehold',
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
</script>