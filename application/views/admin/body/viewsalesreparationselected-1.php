<?php 

foreach ($salesselect as $d) 
{
    $totaltax = $d->r_subtotal + $d->r_tax;
    $all = $totaltax - $d->r_paid;
    // $balance = $d->r_total - $d->payTotal;
?>
<tr style="background-color: #e3e6f0;">
  <td><!-- <input type="checkbox" class="chkbox" name="checksales" id="checksales" onclick="getDetailSalesReparation(<?php echo $p->r_code; ?>)" value="<?php echo $p->r_code?>"> -->
  <input type="checkbox" class="chkbox" name="checksales" id="checksales" onclick="getDetailSales(<?php echo $d->hold_id; ?>)" value="<?php echo $d->hold_id?>">
  </td>
  <td><?php echo $d->r_repairno ?></td>
  <td><?php echo $d->r_opened?></td>
  <td><?php echo $d->c_name?></td>
  <td><?php echo $d->product_name?></td>
  <td><?php echo $totaltax?>.00</td>
  <td><?php echo $d->r_tax ?></td>
  <td><?php echo $d->r_paid?></td>
  <td><?php echo $all?>.00</td>
  <?php if($d->r_total <= $d->payTotal){?>
  <td><button class="btn btn-success" style="height: 30px;font-size: 12px;">Paid</button></td>
  <?php }else{?>
  <td><button class="btn btn-danger" style="height: 30px;font-size: 12px;width: 100px;">Not fully paid</button></td>
  <?php }?>
  <td>
    <div class="dropdown no-arrow">
       <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <button class="btn btn-primary" style="font-size: 12px">Action</button>
       </a>
       <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
         <div class="dropdown-header">Action :</div>
         <a class="dropdown-item" href="#" onclick="view_reparation('<?php echo $d->r_code?>')"><i class="fa fa-fw fa-eye"> &nbsp;Sale Details</i></a>
         <!-- <a class="dropdown-item" href="<?php echo base_url(). 'admin/print_view_sales/'.$p->r_code; ?>"><i class="fa fa-fw fa-print"> &nbsp;&nbsp;View Sale</i></a> -->
         <a class="dropdown-item" href="<?php echo base_url(). 'func_report/sendMailSalesReparation/'.$d->hold_id; ?>"><i class="fa fa-fw fa-cloud"> &nbsp;Email Invoice</i></a>
         <a class="dropdown-item" href="#" onclick="view_payment('<?php echo $d->r_code?>')"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;View Payments</i></a>
         <a class="dropdown-item" href="#" onclick="add_payment('<?php echo $d->r_code?>')"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;Add Payments</i></a>
       </div>
    </div>
  </td>
</tr>
<?php 
}
?>

<script type="text/javascript">
    function getDetailSales(id)
  {
    $("#id_sales").val(id);
  }
  $("[name='checksales']").click(function() {
      var id = $("#id_sales").val();
      var checked = $(this).is(':checked');
      if (checked) {
          //alert('checked');
          var data = {'id':id}
          $.ajax({
                url: '<?= base_url() ?>func_report/getDetailsSalesReparation',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                  
                  var r_reparation_id = response.hold_id;
                  var custname = response.c_name;
                  var custaddress = response.c_address;
                  var custphone = response.c_telephone;
                  var custemail = response.c_email;
                  var custbranch = response.custbranch;
                  // var proid = response.pro_id;
                  var proname = response.product_name;
                  var proqty = response.quantity;
                  var proprice = response.unit_price;
                  var protax = response.r_tax;
                  var r_repairno = response.r_repairno;
                  var userincharge = response.r_assigned;
                  var ubranch = response.u_branch;
                  var hold_value = $("#hold_value").val();

                  storeSales(r_reparation_id,custname,custaddress,custphone,custemail,custbranch,proname,proqty,proprice,protax,r_repairno,userincharge,ubranch,hold_value); // add 
                }
        });


      } else {
          
          deletePrint(id);
      }
  });
  function deletePrint(id)
  {
    var hold_value =  $("#hold_value").val();
    var data = {'id':id,'hold_value':hold_value}
    $.ajax({
                    url: '<?= base_url() ?>func_report/deletePrintReparation',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

                    }
            });
  }
  function storeSales(r_reparation_id,custname,custaddress,custphone,custemail,custbranch,proname,proqty,proprice,protax,r_repairno,userincharge,ubranch,hold_value){
    var data = {'holdid':r_reparation_id,'custname':custname,'custaddress':custaddress,'custphone':custphone,'custemail':custemail,'custbranch':custbranch,'proname':proname,'proqty':proqty,'proprice':proprice,'protax':protax,'rrepairno':r_repairno,'userincharge':userincharge,'ubranch':ubranch,'hold_value':hold_value}
    $.ajax({
                    url: '<?= base_url() ?>func_report/storeSalesreparation',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                      //var clname = response.
                      //printClient(c_id,hold_value);
                    }
          });

  }
</script>