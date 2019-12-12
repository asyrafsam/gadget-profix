<?php 
	foreach ($productdataa as $posdata) {
?>

<!-- Here the latest need to update -->
<a onclick="view2('<?php echo $posdata->sub_id?>')" class="box1 col-lg-2 col-sm-4" style="margin-top:50px;">
	<img src="../images/nature.jpg">
	<p><?php echo $posdata->subCat_name?></p>
</a>
<?php
}
?>
<a onclick="backviewallcat()" style="position: absolute;">categories>subcategories</a>
<script type="text/javascript">
function backviewallcat()
  {
    // var data = {'id':id}
    $.ajax({
                    url: '<?= base_url() ?>func_pos/backviewallcat',
                    type: 'POST',
                    dataType: 'html',
                    // data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

                        $('#view1').html(response);
                    }
            });
  }
function view2(id)
  {
    var data = {'id':id}
    $.ajax({
                    url: '<?= base_url() ?>func_pos/viewsubposproduct',
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