<?php 

foreach ($salesselect as $d) 
{
     $balance = $d->total - $d->totalpaid;
?>
<tr style="background-color: #e3e6f0;">
     <td><input type="checkbox" name=""></td>
     <td><?php echo $d->hold_id ?></td>
     <td><?php echo $d->date_pos?></td>
     <td><?php echo $d->c_name?></td>
     <td><?php echo $d->pro_name?></td>
     <td><?php echo $d->total?></td>
     <td><?php echo $d->totaltax ?></td>
     <td><?php echo $d->totalpaid?></td>
     <td><?php echo $balance?></td>
     <?php if($d->total == $d->totalpaid){?>
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
               <a class="dropdown-item" href="#"><i class="fa fa-fw fa-cloud"> &nbsp;Email Invoice</i></a>
               <a class="dropdown-item" href="#" onclick="view_paymentsales('<?php echo $d->hold_id?>')"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;View Payments</i></a>
               <a class="dropdown-item" href="#"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;Add Payments</i></a>
             </div>
          </div>
     </td>
</tr>
<?php 
}
?>