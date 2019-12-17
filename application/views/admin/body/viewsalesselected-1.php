<?php 

foreach ($salesselect as $d) 
{
     $balance = $d->total - $d->total_paid;
?>
<tr style="background-color: #e3e6f0;">
     <td><input type="checkbox" class="chkbox" name="checksales" id="checksales" onclick="test(<?php echo $d->id; ?>)" value="<?php echo $d->id?>"></td>
     <td><?php echo $d->hold_id ?></td>
     <td><?php echo $d->date_pos?></td>
     <td><?php echo $d->c_name?></td>
     <td><?php echo $d->pro_name?></td>
     <td><?php echo $d->total?></td>
     <td><?php echo $d->totaltax ?></td>
     <td><?php echo $d->total_paid?></td>
     <td><?php echo $balance?></td>
     <?php if($d->total <= $d->total_paid){?>
     <td><button class="btn btn-success" style="height: 30px;font-size: 12px;">Paid</button></td>
     <?php }else{?>
     <td><button class="btn btn-danger" style="height: 30px;font-size: 12px;">Not fully paid</button></td>
     <?php }?>
     <td>
          <div class="dropdown no-arrow">
             <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <button class="btn btn-primary" style="font-size: 12px">Action</button>
             </a>
             <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
               <div class="dropdown-header">Action :</div>
               <a class="dropdown-item" href="#"><i class="fa fa-fw fa-eye"> &nbsp;Sale Details</i></a>
               <a class="dropdown-item" href="#"><i class="fa fa-fw fa-print"> &nbsp;&nbsp;View Sale</i></a>
               <a class="dropdown-item" href="<?php echo base_url(). 'func_report/sendMailSales/'.$d->hold_id; ?>"><i class="fa fa-fw fa-cloud"> &nbsp;Email Invoice</i></a>
               <a class="dropdown-item" href="#" onclick="view_paymentsales('<?php echo $d->transaction_id?>')"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;View Payments</i></a>
                           <a class="dropdown-item" href="#" onclick="add_paymentsales('<?php echo $d->transaction_id?>')"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;Add Payments</i></a>
             </div>
          </div>
     </td>
</tr>
<?php 
}
?>

<script type="text/javascript">
  function test(id)
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
                url: '<?= base_url() ?>func_report/getDetailsSales',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                  
                  var custname = response.c_name;
                  var custaddress = response.c_address;
                  var custphone = response.c_telephone;
                  var custemail = response.c_email;
                  var custbranch = response.custbranch;
                  // var proid = response.pro_id;
                  var proname = response.pro_name;
                  var proqty = response.pro_qty;
                  var proprice = response.pro_price;
                  var protax = response.pro_tax;
                  var transactionid = response.transaction_id;
                  var userincharge = response.user_incharge;
                  var ubranch = response.u_branch;
                  var hold_value = $("#hold_value").val();

                  storeSales(id,custname,custaddress,custphone,custemail,custbranch,proname,proqty,proprice,protax,transactionid,userincharge,ubranch,hold_value); // add 
                }
        });


      } else {
          //alert('unchecked');
          deletePrint(id);
      }
  });
  function deletePrint(id)
  {
    var hold_value =  $("#hold_value").val();
    var data = {'id':id,'hold_value':hold_value}
    $.ajax({
                    url: '<?= base_url() ?>func_report/deletePrint',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

                    }
            });
  }
  function storeSales(id,custname,custaddress,custphone,custemail,custbranch,proname,proqty,proprice,protax,transactionid,userincharge,ubranch,hold_value){
    var data = {'detailsid':id,'custname':custname,'custaddress':custaddress,'custphone':custphone,'custemail':custemail,'custbranch':custbranch,'proname':proname,'proqty':proqty,'proprice':proprice,'protax':protax,'transactionid':transactionid,'userincharge':userincharge,'ubranch':ubranch,'hold_value':hold_value}
    $.ajax({
                    url: '<?= base_url() ?>func_report/storeSales',
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