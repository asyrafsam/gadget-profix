<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Add New Product</h1>
  <hr>
  <form class="row" action="<?php echo base_url('func_stock/add_stock'); ?>" method="post" id="form" enctype="multipart/form-data">
    
    <input type="hidden" name="formid" value="<?= rand(10, 9999);?>">

    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <!-- Product Basic Details -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
        </div>
        <div class="card-body">
          <input type="hidden" name="ubranch" value="<?php echo $this->session->userdata('branch');?>">
          <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-mobile-alt"></i></span>
            </div>
            <select name="ptype" class="form-control">
              <option selected=""> Select Product Type</option>
              <option>Standard</option>
              <option>Service</option>
            </select>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-barcode"></i> </span>
           </div>
              <input name="pcode" class="form-control" placeholder="Product Code" type="text">
          </div> 
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-file-signature"></i> </span>
           </div>
              <input name="pname" class="form-control" placeholder="Product Name" type="text">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-folder"></i> </span>
          </div>
            <!-- <select name="pcategory" class="form-control">
              <option selected=""> Select Product Categories</option>
              <option>Camera</option>
              <option>Add On Warranty</option>
            </select> -->
            <input type="text" name="pcategory" id="search" onchange="get_categories()" class="form-control" list="category" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
            <datalist id="category">
              <?= lookup_p_category();?>
            </datalist>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-folder-open"></i> </span>
            </div>
            <!-- <select name="psubcategory" id="psubcategory" class="form-control">
              <option selected=""> Select Sub Categories</option>
              <option value="camera">Camera</option>
              <option>Add On Warranty</option>
            </select> -->
            <input type="text" name="psubcategory" id="" class="form-control" list="psubcategory" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
            <datalist id="psubcategory">

            </datalist>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-pen"></i> </span>
            </div>
              <textarea name="pdetail" class="form-control" placeholder="Product Details" rows="5"></textarea>
          </div> <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-image"></i> </span>
           </div>
              <input name="pimage" class="form-control" placeholder="Product Image" type="file">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-boxes"></i> </span>
           </div>
              <input name="punit" class="form-control" placeholder="Product Unit" type="text">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-money-check-alt"></i> </span>
            </div>
              <input name="pcost" class="form-control" placeholder="Product Cost" type="number">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-money-bill-alt"></i> </span>
            </div>
              <input name="pprice" class="form-control" placeholder="Product Price" type="number">
          </div>                                                                                                 
        </div>
      </div>
    </div>
    <!-- Supplier -->
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Supplier and Quantity Details</h6>
        </div>
        <div class="card-body">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-truck-moving"></i> </span>
              </div>
                <input type="text" name="psupplier" id="search" class="form-control" placeholder="Supplier" list="supplier" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                <datalist id="supplier">
                  <?= lookup_p_supplier();?>
                </datalist>
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-mobile-alt"></i></span>
              </div>
              <select name="pmodel" class="form-control">
                <option selected=""> Model</option>
                <option>Galaxy S10</option>
                <option>Service</option>
              </select>
            </div> 
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-exclamation-triangle"></i> </span>
             </div>
                <input name="palertquantity" class="form-control" placeholder="Alert Quantity" type="number">
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-th-large"></i> </span>
              </div>
                <input name="pquantity" class="form-control" placeholder="Quantity" type="number">
            </div>                                                                         
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Product Tax</h6>
        </div>
        <div class="card-body">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-dollar-sign"></i></span>
              </div>
              <select name="ptax" class="form-control">
                <option selected=""> Product Tax</option>
                <option>Galaxy S10</option>
                <option>Service</option>
              </select>
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-search-dollar"></i></span>
              </div>
              <select name="ptaxmethod" class="form-control">
                <option selected=""> Tax Method</option>
                <option>Galaxy S10</option>
                <option>Service</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Submit Section</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Register New Product  </button>
          </div> <!-- form-group// -->      
          <p class="text-center" style="color: red;">Please ensure that all the fill are inserted before submit </p> 
          </div>
        </div> 
      </div>
  </form>
</div>
<script type="text/javascript">
  function get_categories(){
    var send = $('[name="pcategory"]').val();
    var data = {'send':send}
    $.ajax({
                      url: '<?= base_url() ?>func_stock/getCategoryDetails',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){

                        // var clientname = $("#clientname").val(response.c_name);
                        // var clientno = $("#clientno").val(response.c_telephone);
                        // var clientemail = $("#clientemail").val(response.c_email);
                        $('#psubcategory').html(response);

                      }
              });
  }
</script>

<!-- <?php
  $c_name = $this->input->post('ptype');
  $c_geolocate = $this->input->post('pcode');
  $c_city = $this->input->post('pname');
  $c_telephone = $this->input->post('pcategory');
  $c_vat = $this->input->post('psubcategory');
  $c_file = $this->input->post('pdetail');
  $c_company = $this->input->post('pimage');
  $c_address = $this->input->post('punit');
  $c_postal = $this->input->post('pcost');
  $c_email = $this->input->post('pprice');
  $c_ssn = $this->input->post('psupplier');
  $c_comment = $this->input->post('pmodel');
  $c_address = $this->input->post('palertquantity');
  $c_postal = $this->input->post('pquantity');
  $c_email = $this->input->post('ptax');
  $c_ssn = $this->input->post('ptaxmethod');
?> -->