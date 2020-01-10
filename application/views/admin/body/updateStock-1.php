<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>
  <hr>
  <form class="row" action="<?php echo base_url('func_stock/updateStock'); ?>" method="post" id="form" enctype="multipart/form-data">
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <!-- Product Basic Details -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
        </div>
        <?php
          foreach ($product2 as $p2) {
        ?>
        <div class="card-body">
          <input type="hidden" name="hold_id" value="<?php echo $p2->hold_id?>">
          <input type="hidden" name="upid" value="<?php echo $p2->p_id?>">
          <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-mobile-alt"></i></span>
            </div>
            <select name="uptype" class="form-control">
              <option selected="" value="<?php echo $p2->p_type?>"><?php echo $p2->p_type?></option>
              <option>Standard</option>
              <option>Service</option>
            </select>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-barcode"></i> </span>
           </div>
              <input name="upcode" class="form-control" placeholder="Product Code" type="text" value="<?php echo $p2->p_code?>">
          </div> 
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-file-signature"></i> </span>
           </div>
              <input name="upname" class="form-control" placeholder="Product Name" type="text" value="<?php echo $p2->p_name?>">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-folder"></i> </span>
          </div>
          <input type="text" name="upcategory" id="search" onchange="get_categories()" class="form-control" list="category" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
            <datalist id="category">
              <?= lookup_p_category();?>
            </datalist>
            <!-- <select name="upcategory" class="form-control">
              <option selected="" value="<?php echo $p2->p_category?>"> <?php echo $p2->p_category?></option>
              <option>Camera</option>
              <option>Add On Warranty</option>
            </select> -->
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-folder-open"></i> </span>
            </div>
            <input type="text" name="upsubcategory" id="" class="form-control" list="psubcategory" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
            <datalist id="psubcategory">

            </datalist>
            <!-- <select name="upsubcategory" class="form-control">
              <option selected="" value="<?php echo $p2->p_subCategory?>"> <?php echo $p2->p_subCategory?></option>
              <option>Camera</option>
              <option>Add On Warranty</option>
            </select> -->
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-pen"></i> </span>
            </div>
              <textarea name="updetail" class="form-control" placeholder="Product Details" rows="5"><?php echo $p2->p_detail?></textarea>
          </div> <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-image"></i> </span>
           </div>
              <input name="upimage" class="form-control" placeholder="Product Image" type="file">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-boxes"></i> </span>
           </div>
              <input name="upunit" class="form-control" placeholder="Product Unit" type="text" value="<?php echo $p2->p_unit?>">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-money-check-alt"></i> </span>
            </div>
              <input name="upcost" class="form-control" placeholder="Product Cost" type="number" value="<?php echo $p2->p_cost?>">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-fw fa-money-bill-alt"></i> </span>
            </div>
              <input name="upprice" class="form-control" placeholder="Product Price" type="number" value="<?php echo $p2->p_price?>">
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
                <input type="text" name="upsupplier" id="search" class="form-control" placeholder="Supplier" list="supplier" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;" value="<?php echo $p2->p_supplier?>">
                <datalist id="supplier">
                  <?= lookup_p_supplier();?>
                </datalist>
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-fw fa-mobile-alt"></i></span>
              </div>
              <select name="upmodel" class="form-control">
                <option selected="" value="<?php echo $p2->p_model?>"> <?php echo $p2->p_model?></option>
                <option>Galaxy S10</option>
                <option>Service</option>
              </select>
            </div> 
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-exclamation-triangle"></i> </span>
             </div>
                <input name="upalertquantity" class="form-control" placeholder="Alert Quantity" type="number" value="<?php echo $p2->p_alertQuantity?>">
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-th-large"></i> </span>
              </div>
                <input name="upquantity" class="form-control" placeholder="Quantity" type="number" value="<?php echo $p2->p_quantity?>">
            </div>                                                                         
        </div>
      </div>
      <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Product Tax</h6>
        </div>
        <div class="card-body">
          <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-dollar-sign"></i></span>
            </div>
            <select name="uptax" class="form-control">
              <option selected="" value="<?php echo $p2->p_tax?>"> <?php echo $p2->p_tax?></option>
              <option>Galaxy S10</option>
              <option>Service</option>
            </select>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-fw fa-search-dollar"></i></span>
            </div>
            <select name="uptaxmethod" class="form-control">
              <option selected="" value="<?php echo $p2->p_taxMethod?>"> <?php echo $p2->p_taxMethod?></option>
              <option>Galaxy S10</option>
              <option>Service</option>
            </select>
          </div>
        </div> -->
      </div>
        <?php 
          }
        ?>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Submit Section</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Update Product  </button>
            </div> <!-- form-group// -->      
          <p class="text-center" style="color: red;">Please ensure that all the fill are inserted before submit </p> 
          </div>
        </div> 
      </div>
  </form>
</div>
<script type="text/javascript">
  function get_categories(){
    var send = $('[name="upcategory"]').val();
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
  $c_name = $this->input->post('uptype');
  $c_geolocate = $this->input->post('upcode');
  $c_city = $this->input->post('upname');
  $c_telephone = $this->input->post('upcategory');
  $c_vat = $this->input->post('upsubcategory');
  $c_file = $this->input->post('updetail');
  $c_company = $this->input->post('upimage');
  $c_address = $this->input->post('upunit');
  $c_postal = $this->input->post('upcost');
  $c_email = $this->input->post('upprice');
  $c_ssn = $this->input->post('upsupplier');
  $c_comment = $this->input->post('upmodel');
  $c_address = $this->input->post('upalertquantity');
  $c_postal = $this->input->post('upquantity');
  $c_email = $this->input->post('uptax');
  $c_ssn = $this->input->post('uptaxmethod');
?> -->