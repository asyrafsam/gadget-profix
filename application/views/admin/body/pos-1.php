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
        <form id="custom-search-form" class="form-search form-horizontal pull-right">
            <div class="input-append span12">
                <input type="text" class="search-query mac-style" placeholder="Search Product" style="border-radius: 10px;border: 1.2px solid #e6e6e6;height: 40px;">
                <button type="submit" class="btn"><i class="fas fa-search"></i></button>
            </div>
        </form>
      </div>
      
        <div class="flex-head" id="view1">

          <?php 
            foreach ($posdata as $pos) {
          ?>
          <a onclick="view1('<?php echo $pos->hold_id?>')" class="box1 col-lg-2 col-sm-4" style="margin-top:50px;">
            <img src="../images/nature.jpg">
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
            <input type="text" name="customerlist" id="search" class="form-control" placeholder="Customer Name" list="customerlist" style="float: right; width: 250px;border:1px solid #989898;" required>
            <datalist id="customerlist">
              <?= lookup_rr_client();?>
            </datalist>
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
            <input type="hidden" name="hold_value" id="hold_value" value="<?= rand(10,10000);?>">
            <input type="hidden" name="uname" value="<?php echo $this->session->userdata('name');?>">
            <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
            <input type="hidden" name="transactionid" class="form-control" placeholder="Repair" value="POS<?= rand(10,10000);?>">
            <hr>
            <div class="col-lg-12" style="text-align: center;">
              <button class="btn btn-danger" style="width: 40%; height: 100px;">Clear Sale</button>
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

  $(document).ready(function (){
    //view1();
  });
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
</script>