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