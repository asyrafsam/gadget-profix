<div class=" col-lg-12">
    <div class="centre_box status_box" id="result">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    foreach ($selectrepair as $getDetails) {
                ?>
                <div class="col-md-6" style="text-align: center;">
                    <p><span style="font-size: 50px;">Status</span><br>
                    <span id="status" style="font-size: 43px;background-color:<?php echo $getDetails->r_statusBGColor?>;color: <?php echo $getDetails->r_statusTextColor?>;"><?php echo $getDetails->r_status?></span></p>
                </div>


                <div class="col-md-6">
                    <div class="col-md-12 col-lg-12 bio-row">
                        <p><span class="bold"><i class="fa fa-fw fa-user"></i> Client </span><span id="client_name"><?php echo $getDetails->c_name?></span></p>
                    </div>
                     <div class="col-md-12 col-lg-12 bio-row">
                        <p><span class="bold"><i class="fa fa-comment"></i> Comment </span><span id="comment"><?php echo $getDetails->r_comment?></span></p>
                    </div>
                    <div class="col-md-12 col-lg-12 bio-row">
                        <p><span class="bold"><i class="fa fa-comment"></i> Diagnostics </span><span id="diagnostics"><?php echo $getDetails->r_diagnostics?></span></p>
                    </div>
                    <div class="col-md-12 col-lg-6 bio-row date_closing_div">
                        <p><span class="bold"><i class="fa fa-calendar"></i> Closing Date </span><span id="date_closing"><?php echo $getDetails->r_closedate?></span></p>
                    </div>
                    <div class="col-md-12 col-lg-6 bio-row nofloat">
                        <p><span class="bold"><i class="fa fa-money"></i> Grand Total </span><span id="grand_total"><?php echo $getDetails->r_total?></span></p>
                    </div>
                    
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>