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
    input[type="text"] { border: none }
    input[type="number"] { border: none }
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
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary" style="float: left;">POS Section</h6>
          <select style="float: right; width: 250px;" required>
            <option value="">Customer Name</option>
          </select>
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
                <tr>
                    <td width="80">Tiger</td>
                    <td width="45">10</td>
                    <td width="50">110.00</td>
                    <td width="50">10%</td>
                    <td width="65">10%</td>
                    <td width="65">200.00</td>
                </tr>
            </tbody>
        </table>
          <hr style="margin-top: -10%;">
          <div class="row pos-result" style="font-weight: bold;">
            <div class="total col-lg-6 right" style="float: right;">
              <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <input type="number" name="" style="width: 70px;float: right;" placeholder="0.00" readonly>
            </div>
            <div class="total col-lg-6 right" style="">
              <label>Subtotal :&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <input type="number" name="total_subtotal" id="total_subtotal" style="width: 70px;float: right;margin-bottom: 10px;" placeholder="0.00" readonly>
            </div>
            <div class="total col-lg-6 right" style="">
              <label>Order Tax :&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <input type="number" name="" style="width: 70px;float: right;" placeholder="0.00" readonly>
            </div>
            <div class="total col-lg-6 right" style="">
              <label>Discount :&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <input type="number" name="" style="width: 70px;float: right;" placeholder="0.00" readonly>
            </div>
          </div>
          <input type="hidden" name="hold_value" id="hold_value" value="<?= rand(10,10000);?>">

          <hr>
          <div class="col-lg-12" style="text-align: center;">
            <button class="btn btn-danger" style="width: 40%; height: 100px;">Clear Sale</button>
            <button class="btn btn-success" style="width: 40%; height: 100px;">Payment</button>
          </div>                                                      
        </div>
      </div> 
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


</script>