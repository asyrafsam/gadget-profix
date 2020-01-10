
<style type="text/css">
  .flex-parent{
    display: flex;
    flex-flow: row;
  }
</style>
<?php date_default_timezone_set("Asia/Kuala_Lumpur");?>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Close Shift  </h1>
  <div class="col-lg-5" style="margin-top: -50px;left:35%;font-size: 20px;">
    <?php foreach ($drawercurrent as $current) {?>
    <h1 class="text-gray-800"> Balance: <?php echo $current->currentBalance;?>  </h1>
    <?php }?>
  </div>
  <div class="col-lg-3" style="float: right;margin-top: -30px;font-size: 20px;">
    <?php echo date('d-m-Y H:i:s')?>
  </div>
  <hr>
  <form class="row" action="<?php echo base_url('func_pos/closeDrawer'); ?>" method="post" id="form" enctype="multipart/form-data">
      <input type="hidden" name="formid" value="<?= rand(10, 9999);?>">
      <?php foreach ($drawercurrent as $current) {?>
        <input type="hidden" name="currentBalance" value="<?php echo $current->currentBalance;?>">
      <?php }?>
      <div class="col-lg-12">
        <div class="card shadow mb-4">
          <!-- Product Basic Details -->
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Currency Details</h6>
          </div>
          <div class="card-body">
            <input type="hidden" name="uname" value="<?php echo $this->session->userdata('name');?>">
              <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
              <div class="flex-parent">
                <div class="col-lg-3">
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM1000 </span>
                   </div>
                      <input name="money1" id="money1" class="form-control" placeholder="0" type="number" data-price="1000" onchange="CalculateRM1000()">
                  </div> 
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM200 </span>
                   </div>
                      <input name="money2" id="money2" class="form-control" placeholder="0" type="number" data-price="200" onchange="CalculateRM200()">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM50 </span>
                   </div>
                      <input name="punit" id="money3" class="form-control" placeholder="0" type="number" data-price="50" onchange="CalculateRM50()">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM10 </span>
                    </div>
                      <input name="pcost" id="money4" class="form-control" placeholder="0" type="number" data-price="10" onchange="CalculateRM10()">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM2 </span>
                    </div>
                      <input name="pprice" id="money5" class="form-control" placeholder="0" type="number" data-price="2" onchange="CalculateRM2()">
                  </div>                   
                </div>
                <div class="col-lg-3">
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                   </div>
                      <input name="result1" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div> 
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                   </div>
                      <input name="result2" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                   </div>
                      <input name="result3" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                    </div>
                      <input name="result4" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                    </div>
                      <input name="result5" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div>                   
                </div>
                <div class="col-lg-3">
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM500 </span>
                   </div>
                      <input name="pcode" id="money6" class="form-control" placeholder="0" type="number" data-price="500" onchange="CalculateRM500()">
                  </div> 
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM100 </span>
                   </div>
                      <input name="pname" id="money7" class="form-control" placeholder="0" type="number" data-price="100" onchange="CalculateRM100()">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM20 </span>
                   </div>
                      <input name="punit" id="money8" class="form-control" placeholder="0" type="number" data-price="20" onchange="CalculateRM20()">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM5 </span>
                    </div>
                      <input name="pcost" id="money9" class="form-control" placeholder="0" type="number" data-price="5" onchange="CalculateRM5()">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM1 </span>
                    </div>
                      <input name="pprice" id="money10" class="form-control" placeholder="0" type="number" data-price="1" onchange="CalculateRM1()">
                  </div>                   
                </div>
                <div class="col-lg-3">
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                   </div>
                      <input name="result6" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div> 
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                   </div>
                      <input name="result7" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                   </div>
                      <input name="result8" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                    </div>
                      <input name="result9" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> RM </span>
                    </div>
                      <input name="result10" class="form-control" type="number" value="0.00" placeholder="0" readonly>
                  </div>                   
                </div>                                   
              </div>
              <div class="col-lg-12">
                  <button class="btn btn-primary col-lg-12">Close Shift</button>
              </div>                                       
          </div>                         
        </div>
      </div>
    </form>
  </div>
<script type="text/javascript">
  function CalculateRM1000() 
  {
    var total = 0;
    var itemID = document.getElementById("money1");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result1"]').val(total);
  }
  function CalculateRM200() 
  {
    var total = 0;
    var itemID = document.getElementById("money2");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result2"]').val(total);
  }
  function CalculateRM50() 
  {
    var total = 0;
    var itemID = document.getElementById("money3");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result3"]').val(total);
  }
  function CalculateRM10() 
  {
    var total = 0;
    var itemID = document.getElementById("money4");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result4"]').val(total);
  }
  function CalculateRM2() 
  {
    var total = 0;
    var itemID = document.getElementById("money5");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result5"]').val(total);
  }
  function CalculateRM500() 
  {
    var total = 0;
    var itemID = document.getElementById("money6");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result6"]').val(total);
  }
  function CalculateRM100() 
  {
    var total = 0;
    var itemID = document.getElementById("money7");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result7"]').val(total);
  }
  function CalculateRM20() 
  {
    var total = 0;
    var itemID = document.getElementById("money8");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result8"]').val(total);
  }
  function CalculateRM5() 
  {
    var total = 0;
    var itemID = document.getElementById("money9");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result9"]').val(total);
  }
  function CalculateRM1() 
  {
    var total = 0;
    var itemID = document.getElementById("money10");
    var total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        
    $('[name="result10"]').val(total);
  }
</script>
