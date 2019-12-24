<?php 

foreach ($drawerselect as $d) 
{
?>
<tr style="background-color: #e3e6f0;">
    <td><?php echo $d->id ?></td>
    <td><?php echo $d->openBy?></td>
    <td><?php echo $d->closedTime?></td>
    <td><?php echo $d->openingCash?></td>
    <td><?php echo $d->closedBy?></td>
    <td><?php echo $d->closedTime?></td>
    <td><?php echo $d->closingCash ?></td>
</tr>
<?php 
}
?>

<script type="text/javascript">

</script>