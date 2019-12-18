<div class="flex-row col-lg-12" style="text-align: left;">
  <table class="col-lg-8" style="margin-bottom: 30px;">
    <?php 
    foreach($productdataa as $details)
      {
        $correctdate = $details->date_pos;
        $timestamp = strtotime($correctdate);
    ?>
    <tr>
      <td>Date: &nbsp;<?php echo date('d/m/Y', $timestamp);?></td>
    </tr>
    <tr>
      <td>Reference: &nbsp;<?php echo $details->transaction_id?></td>
    </tr>
    <?php 
      }
    ?>
  </table>
  <table class="col-lg-4" style="margin-bottom: 30px;">
    <?php foreach($productdataa as $detailscust){?>
    <tr>
      <td>From: &nbsp;<?php echo $detailscust->user_incharge?></td>
    </tr>
    <tr>
      <td>To: &nbsp;<?php echo $detailscust->c_name?></td>
    </tr>
    <?php }?>
  </table>
</div>
<div class="flex-row col-lg-12">
  <table class="table" cellspacing="0" style="font-size: 13px;width: 100%;">
    <thead style="background-color: #f0f0f0;color: #000;text-align: center;font-weight: bold;">
      <tr>
        <td>No</td>
        <td>Description</td>
        <td>Quantity</td>
        <td>Unit Price</td>
        <td>Tax</td>
        <td>Discount</td>
        <td>Subtotal</td>
      </tr>
    </thead>
    <tbody style="background-color: #f0f0f0;color: #000;text-align: center;font-weight: bold;">
      <?php 
        $i = 1;
        foreach ($getproductdetails as $product) 
        {
      ?>
      <tr>
        <td><?php echo $i++?></td>
        <td><?php echo $product->pro_name?></td>
        <td><?php echo $product->pro_qty?></td>
        <td>RM<?php echo $product->p_price?></td>
        <td>RM<?php echo $product->pro_tax?></td>
        <td>RM<?php echo $product->pro_disc?></td>
        <td>RM<?php echo $product->pro_price?></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
    <tfoot>
      <?php 
        foreach ($getcalculation as $calc) {
          $balance = $calc->total - $calc->total_paid;
      ?>
      <tr>
        <td colspan="6" style="text-align: right;">Total Amount (RM):</td>
        <td><?php echo $calc->total?></td>
      </tr>
      <tr>
        <td colspan="6" style="text-align: right;">Paid (RM):</td>
        <td><?php echo $calc->total_paid?></td>
      </tr>
      <tr>
        <td colspan="6" style="text-align: right;">Balance (RM):</td>
        <td><?php echo $balance?></td>
      </tr>
      <?php
        }
      ?>
    </tfoot>
  </table>
</div>