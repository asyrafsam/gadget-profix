<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="<?php echo base_url('assets/css/receipt.css') ;?>" rel="stylesheet">
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
    <?php 
      foreach($reparationdetails as $d){
        $totaltax = $d->r_subtotal + $d->r_tax;
        $balance = $totaltax - $d->payTotal;
    ?>
    <main>
      <div>
      <div class="clearfix">
        <div id="info">
          <table1>
            <tr>
              <div class="information">
                <td>Name</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?php echo $d->r_name?></td>
              </div>
            </tr>
            <tr>
              <div class="order">
                <td>Telephone No</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td>0<?php echo $d->r_telephone?></td>
              </div>
            </tr>
          </table1>
        </div>
        <div id="receipt">
          <table1>
            <tr>
              <div class="staffid">
                <td>Model</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?php echo $d->r_model?></td>
              </div>
            <tr>
              <div class="date">
                <td>Opening Date</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?php echo $d->r_opened?></td>
              </div>
              <br>
            </tr>
          </table1>
        </div>
      </div>
      <div class="col-lg-12">
        <table class="table1 col-lg-12" border="0" cellspacing="0" cellpadding="0">
          <tbody style="border: 2px solid #000000;">
            <tr>
              <td class="titletd" style="">Type:</td>
              <td colspan="2" style="text-align: left;background-color: #f8f8f8"><?php echo $d->r_type?></td>
              <td class="titletd" style="">Category:</td>
              <td colspan="2" style="text-align: left;"><?php echo $d->r_category?></td>
            </tr>
            <tr>
              <td class="titletd" style="">Grand Total:</td>
              <td colspan="2" style="text-align: left;"><?php echo $totaltax?>.00</td>
              <td class="titletd" style="">Balance:</td>
              <td colspan="2" style="text-align: left;"><?php echo $balance?>.00</td>
            </tr>
            <tr>
              <td class="titletd" style="">Name:</td>
              <td colspan="2" style="text-align: left;"><?php echo $d->r_name?></td>
              <td class="titletd" style="">Defect:</td>
              <td colspan="2" style="text-align: left;"><?php echo $d->r_defect?></td>
            </tr>
            <tr>
              <td class="titletd" style="">Paid:</td>
              <td colspan="2" style="text-align: left;"><?php echo $d->payTotal?></td>
              <td class="titletd" style="">Code:</td>
              <td colspan="2" style="text-align: left;"><?php echo $d->r_repairno?></td>
            </tr>
          </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0" class="col-lg-12">
        <tbody>
          <tr>
            <td class="titletd" style="width: 100px;">Comment:</td>
            <td colspan="2" style="text-align: left;"><?php echo $d->r_comment?></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="printpdf no-print" align="center"><button class="btn btn-danger" onclick="myPrint()">Print this report</button></div>
    </main>
    <?php 
      }
    ?>
    <footer>
      Print out by computer and is valid without signature.
    </footer>
  </body>
</html>