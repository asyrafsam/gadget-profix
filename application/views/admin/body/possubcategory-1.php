<?php 
	foreach ($productdataa as $posdata) {
?>
<a onclick="totalIt('<?php echo $posdata->sub_id?>');" class="box1 col-lg-2 col-sm-4">
	<img src="../images/nature.jpg">
	<p><?php echo $posdata->subCat_name?></p>
</a>
<?php
}
?>