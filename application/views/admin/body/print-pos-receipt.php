<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="<?php echo base_url('assets/css/receipt.css') ;?>" rel="stylesheet">
    <style type="text/css">
      th{
        background-color: #989898;
        color: #000000;
        font-weight: bolder;
      }
      
    </style>
    <script>
      function myPrint() {
          window.print();
      }
    </script>
  </head>
  <body>

    <header class="clearfix">
      <div id="logo">
        <img src="<?php echo base_url('images/ProfixLogin.png') ;?>">
      </div>

      <div id="company">
        <h2 class="name">GADGET PROFIX</h2>
        <div>No.2B Bandar Pasir Puteh, Jalan Kota Bharu</div>
        <div>017 999 0009</div>
        <div><a href="mailto:e-CakeMelaka@gmail.com">gadgetprofix@gmail.com</a></div>
      </div>
    </header>
    <main>
      <div>
      <?php 
        foreach ($custinfo as $cust) {
        
      ?>
      <div class="clearfix">
        <div id="info">
          <table1>
            <tr>
              <div class="information">
                <td>Name</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?php echo $cust->c_name?></td>
              </div>
            </tr>
            <tr>
              <div class="order">
                <td>Telephone No</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?php echo $cust->c_telephone?></td>
              </div>
            </tr>
          </table1>
        </div>
        <div id="receipt">
          <table1>
            <tr>
              <div class="staffid">
                <td>Address</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?php echo $cust->c_address?></td>
              </div>
            <tr>
              <div class="date">
                <td>Email</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?php echo $cust->c_email?></td>
              </div>
              <br>
            </tr>
          </table1>
        </div>
      </div>
      <?php
        }
      ?>
      <div class="col-lg-12">
        <table class="table1 col-lg-12" border="0" cellspacing="0" cellpadding="0">
          <tbody style="border: 2px solid #000000;">
            <tr>
              <th style="">PRODUCT NAME:</th>
              <th style="">PRICE:</th>
              <th style="">DISCOUNT:</th>
              <th style="">TAX:</th>
            </tr>
            <?php 
              foreach ($productinfo as $product) {
              
            ?>
            <tr>
              <td style="text-align: center;"><?php echo $product->pro_name?></td>
              <td style="text-align: center;"><?php echo $product->pro_price?></td>
              <td style="text-align: center;"><?php echo $product->pro_disc?></td>
              <td style="text-align: center;"><?php echo $product->pro_tax?></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0" class="col-lg-12">
        <tbody>
          <?php foreach ($paymentinfo as $calc) {
            $totaltax = $calc->alltotal + $calc->sumtax;
            $totalall = $totaltax - $calc->sumdisc;
           ?>
          <tr>
            <td class="titletd" style="width: 100px;">Total:</td>
            <td colspan="2" style="text-align: left;"><?php echo $calc->alltotal?></td>
          </tr>
          <?php }?>
          <?php foreach ($paidinfo as $paided) 
            {
            # code...
               $calcpaid = $totalall - $paided->pay_amount;
               if($calcpaid < 0){
                  $totalcalc = abs($calcpaid);
               }else{
                  $totalcalc = 0;
               }
           ?>
          <tr>
            <td class="titletd" style="width: 100px;">Paid:</td>
            <td colspan="2" style="text-align: left;"><?php echo $paided->pay_amount?></td>
          </tr>
          <?php 
            }
          ?>
          <tr>
            <td class="titletd" style="width: 100px;">Balance:</td>
            <td colspan="2" style="text-align: left;"><?php echo $totalcalc?>.00</td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="printpdf no-print" align="center"><button class="btn btn-danger" onclick="myPrint()">Print this report</button></div>
    </main>
    <footer>
      Print out by computer and is valid without signature.
    </footer>
  </body>
</html>