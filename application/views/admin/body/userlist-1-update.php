
<style type="text/css">
  .flex-parent{
    display: flex;
    flex-flow: row;
  }
  .input-group-text{
    width: 160px;
  }
</style>
<?php date_default_timezone_set("Asia/Kuala_Lumpur");?>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Update User  </h1>
  <hr>
  <form class="row" action="<?php echo base_url('func_setting/updateuser'); ?>" method="post" id="form" enctype="multipart/form-data">
      <input type="hidden" name="formid" value="<?= rand(10, 9999);?>">
      <div class="col-lg-12">
        <div class="card shadow mb-4">
          <!-- Product Basic Details -->
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
          </div>
          <div class="card-body">
            <input type="hidden" name="uname" value="<?php echo $this->session->userdata('name');?>">
              <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
              <div class="flex-parent">
                <div class="col-lg-12">
                  <?php foreach ($userdetails as $details) 
                  {
                    # code...
                  ?>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> First Name </span>
                   </div>
                   <input name="userid" id="money1" class="form-control" value="<?php echo $details->id?>" type="hidden">
                      <input name="fname" id="money1" class="form-control" value="<?php echo $details->u_name?>" type="text">
                  </div> 
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> Last Name </span>
                   </div>
                      <input name="lname" id="money2" class="form-control" value="<?php echo $details->ul_name?>" type="text">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> Image Upload </span>
                   </div>
                      <input name="image" id="money3" class="form-control" type="file">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> Company Name </span>
                    </div>
                      <input name="company" id="money4" class="form-control" value="<?php echo $details->u_company?>" type="text">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> Email </span>
                    </div>
                      <input name="email" id="money5" class="form-control" value="<?php echo $details->u_email?>" type="text">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> Phone </span>
                   </div>
                      <input name="phone" class="form-control" value="<?php echo $details->u_phone?>" type="number">
                  </div> 
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> Password </span>
                   </div>
                      <input name="pass" id="pass" class="form-control" value="<?php echo $details->u_pass?>" type="password">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> Confirm Password </span>
                   </div>
                      <input name="re-pass" id="re-pass" class="form-control" type="password">
                      <!-- <span id='message'></span> -->
                  </div>
                  <?php
                    }
                  ?>
                  <h4>User Group</h4> 
                  <?php 
                    foreach ($usergroup as $group) {
                     ?>
                      <input type="radio" name="usergroup" value="<?php echo $group->groupName?>" style="margin-left: 10px;"> <p style="position: absolute; color: #000000;font-weight: bold;margin-top: -25px;left: 40px;"><?php echo $group->groupName;?></p><br>
                     <?php
                    }
                  ?> 
                  <br>
                  <br>                 
                </div>                                 
              </div>
              <div class="col-lg-12">
                  <button class="btn btn-primary col-lg-12">Update User</button>
              </div>                                       
          </div>                         
        </div>
      </div>
    </form>
  </div>
<script type="text/javascript">
  $('#pass, #re-pass').on('keyup', function () {
  if ($('#pass').val() == $('#re-pass').val()) {
    $('#re-pass').html('Matching').css('background-color', '#90ee90');
  } else 
    $('#re-pass').html('Not Matching').css('background-color', '#ffcccb');
});
</script>
