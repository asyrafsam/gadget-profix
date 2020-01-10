<style type="text/css">
	body   { font-family: 'Arial', sans-serif; font-weight: bold;}
	#invoice-POS {
	  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
	  padding: 2mm;
	  margin: 0 auto;
	  width: 80mm;
	  background: #FFF;
	}
	#invoice-POS ::selection {
	  background: #f31544;
	  color: #FFF;
	}
	#invoice-POS ::moz-selection {
	  background: #f31544;
	  color: #FFF;
	}
	#invoice-POS h1 {
	  font-size: 1.5em;
	  color: #222;
	}
	#invoice-POS h2 {
	  font-size: .9em;
	}
	#invoice-POS h3 {
	  font-size: 1.2em;
	  /*font-weight: 300;*/
	  line-height: 2em;
	}
	#invoice-POS p {
	  font-size: .7em;
	  color: #666;
	  line-height: 1.2em;
	}
	#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
	  /* Targets all id with 'col-' */
	  border-bottom: 1px solid #EEE;
	}
	#invoice-POS #top {
	  min-height: 100px;
	}
	#invoice-POS #mid {
	  min-height: 80px;
	}
	#invoice-POS #bot {
	  min-height: 50px;
	}
	#invoice-POS #top .logo img {
	  height: 60px;
	  /*width: 60px;*/
	  /*background: url('') no-repeat;*/
	  /*background-size: 60px auto;*/
	}
	#invoice-POS .info {
	  display: block;
	  margin-left: 0;
	}
	#invoice-POS .title {
	  float: right;
	}
	#invoice-POS .title p {
	  text-align: right;
	}
	#invoice-POS table {
	  width: 100%;
	  border-collapse: collapse;
	}
	#invoice-POS .tabletitle {
	  font-size: .7em;
	  background: #EEE;
	}
	#invoice-POS .service {
	  border-bottom: 1px solid #EEE;
	}
	#invoice-POS .item {
	  width: 47mm;
	}
	#invoice-POS .itemtext {
	  font-size: .7em;
	}
	#invoice-POS #legalcopy {
	  margin-top: 5mm;
	}

	@media print {
		body * { visibility: hidden; }
		#invoice-POS * { visibility: visible; }
		#invoice-POS { margin: 0; padding: 0; padding-top: 5px }
	}
	@page  
	{ 
	    size: auto;   /* auto is the initial value */ 
	    margin: 0;  
	} 
</style>
<body>

  <div id="invoice-POS">
    
    <center id="top">
	<?php foreach ($invoicedetails as $invoice) 
    	{
			$testimage = $invoice->invoiceLogo;
    ?>
      <div class="logo">
      	<img src="<?php  echo base_url()."uploads/".$testimage; ?>">
      </div>
      <div class="info"> 
        <h2>GADGET PROFIX</h2>
        
        <p> 
            Address : <?php echo $invoice->invoiceAddr;?></br>
            Email   : <?php echo $invoice->invoiceEmail;?></br>
            Telephone   : <?php echo $invoice->invoiceTel;?></br>
        </p>
        
      </div><!--End Info-->
  	<?php
    	}
    ?>
    </center><!--End InvoiceTop-->
	<div class="clearfix"></div>
    
    <div id="mid">
      <div class="info">
      	<h2></h2>
      	<center>
	    	<div id="" style="margin-left: -10px; margin-top: -3px;margin-bottom: 9px;">
		        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJoAAAAqCAIAAADEV9U1AAAACXBIWXMAAA7EAAAOxAGVKw4bAAABUklEQVR4nO2c0Q6DIAxFy7L//+XuwYR0pWgdDvV6zxOyAs4zAZfUoqrSp5QiIqpaSlkia6EG1EMbvNTUso1x5UN6aCNdOewzHKINdr3Zc7CFtjdXGTZpv7s9tG1dQMhr5TNyO6gTCuqEgjqhoE4oqBMK6oSCOqGgTiioEwrqhII6oaBOKKgTCuqEgjqhoE4oqBMK6oSCOqGgTiioEwrqhII6oaBOKKgTCuqEgjqhoE4oqBOKsp5gRu7Fe/6QYZ6iTbhc6GU0hpG7hnPJnZkT22ze63MyV5lsVbVeBVseiZTIfdXj0mzbyHzzXp/zuYrOf+ASxfdG5ptv/qqmccJkO438JQ4j85VymckWWWfIsiQPzofuzQnyvYjmb+vDeZxO6exf8mReOXEWyGtnyOCt2dv9nrj9sZwwLaw8k/xcmR9IonVufPSLrJ38GwGKx0222HwAsHIUSuAus3EAAAAASUVORK5CYII=' alt='LILI 191123' class='bcimg' />		    </div>
		</center>
		<?php 
			foreach ($reparationname as $name) {
		?> 
        <h2>Customer Name: <?php echo $name->r_name?> <?php echo $name->r_repairno?></h2>
        <?php 
        	}
        ?>
		<div class="clearfix"></div>
      </div>

    </div><!--End Invoice Mid-->
   
    <div id="bot">
		<div id="table">
			<table>
				
				<tr class="tabletitle">
					<td class="item"><h2>Repair Details</h2></td>
					<td class="Hours"></td>
					<td class="Rate price"></h2></td>
				</tr>
				<?php
					foreach ($item as $product) 
					{
				?>
				<tr class="service">
					<td colspan="3" class="tableitem"><p class="itemtext">
						<strong><?php echo $product->r_model?></strong>
						<small>						<br>
						<?php echo $product->r_defect?></small>
					</p></td>
				</tr>
				<?php 
					}
				?>
				<?php 
					foreach ($reparationdetails as $details) {
					$totaltax = $details->r_subtotal + $details->r_tax;
					$balance = $totaltax - $details->payTotal;

					if($balance < 0)
					{
						$balanceresult = abs($balance);

					}
				?>
				<tr class="tabletitle">
					<td></td>
					<td class="Rate"><h2>Service Charges</h2></td>
					<td class="payment"><h2><?php echo $details->r_tax?></h2></td>
				</tr>

				<tr class="tabletitle">
					<td></td>
					<td class="Rate"><h2>Grand Total</h2></td>
					<td class="payment"><h2><?php echo $totaltax?>.00</h2></td>
				</tr>

				<tr class="tabletitle">
					<td></td>
					<td class="Rate"><h2>Paid</h2></td>
					<td class="payment"><h2><?php echo $details->payTotal?></h2></td>
				</tr>

				<tr class="tabletitle">
					<td></td>
					<td class="Rate"><h2>Balance</h2></td>
					<td class="payment">
						<h2>
							<?php
								if(empty($balanceresult))
									{
										echo '';
									}else{
										echo $balanceresult;
									}
							?>.00
						</h2>
					</td>
				</tr>
				<?php
					}
				?>


			</table>

			<small style="text-align: right !important;">
                            </small>
		</div><!--End Table-->

		<div id="legalcopy">
			<p class="legal"> 
			</p>


		</div>
			<center>
				<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAABCAQMAAADZmpKrAAAABlBMVEUAAAD///+l2Z/dAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAA40lEQVQokV3SMYpFMQhAUSGtkK0ItgG3LtgGshXBVshkhvcnvm91qlyRADRWR4Iz/5KgYONdRTx6n9zesmgeX5rA+paEWDzvfXRqZ57uo73RRGVrkTMnMjgUaQIYmFWlm25B16I2xBuYQhEEDsw5tCgknTICioBZMjC1SEb0MD21qx6AsFO0KDK3Tz67XRnoQknSIup9rNlP7GrDDo+JVTLQHX+3uqKQpZaqVcuIl7zEMXgMkKq9qQ8RgSJoCZMYtEjCt6v8/YiPiEl4wXiLI9dqX5JJdk5+JZEtcL50ahbeZ9EPspQSxvqg2t0AAAAASUVORK5CYII=' alt='https://gadgettrading.net/repairs/' class='qrimg' />			</center>
			<div class="clearfix"></div>


        
	</div><!--End InvoiceBot-->
	
  </div><!--End Invoice-->
<script type="text/javascript">
	$( document ).ready(function() {
        setTimeout(function() {
            window.print();
        }, 500);
        // window.onafterprint = function(){
        //     setTimeout(function() {
        //         window.close();
        //     }, 10000);
        // }
    });
</script>
</body>
</html>
