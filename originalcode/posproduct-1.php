<?php 
	foreach ($productpos as $posproduct) {
    
    $test = $posproduct->p_subCategory;
    
?>

<!-- Here the latest need to update -->

<a onclick="totalIt('<?php echo $posproduct->p_id?>');" class="box1 col-lg-2 col-sm-4" style="margin-top:50px;">
	<img src="../images/nature.jpg">
	<p><?php echo $posproduct->p_name?></p>
</a>
<?php
}
if(empty($test)){
    $test2 = '';
    ?>
    <p style="color: #ff0000;position: absolute;">Product Not Registered</p>
    <?php
    foreach ($posdata as $pos) {
        $test3 = $pos->hold_id;
        ?>
        <a onclick="view1('<?php echo $pos->hold_id?>')" class="box1 col-lg-2 col-sm-4" style="margin-top:50px;">
            <img src="../images/nature.jpg">
            <p><?php echo $pos->cat_name?></p>
        </a>
        <?php
    }

}else{
    $test2 = $test;
    ?>
    <a onclick="backviewsubcat('<?php echo $test2?>');" style="position: absolute;">categories>subcategories>product</a>
    <?php
}
?>


<script type="text/javascript">
    function backviewcategory(id)
      {
        var data = {'id':id}
        $.ajax({
                        url: '<?= base_url() ?>func_pos/backviewcategory',
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
    function backviewsubcat(id)
      {
        var data = {'id':id}
        $.ajax({
                        url: '<?= base_url() ?>func_pos/backviewsubcat',
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
    function backviewcat()
        {
          getDetailsProduct(id);
        }
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
                        $("#total_subtotal").val(response);
                        getDetailHold(hold_value);
                      
                        var a = Number(document.getElementById('protax').value);
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
</script>