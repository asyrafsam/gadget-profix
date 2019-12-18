<style type="text/css" media="all">
    body { color: #000; }
    #wrapper { max-width: 480px; margin: 0 auto; padding-top: 20px; }
    /*.btn { border-radius: 0; margin-bottom: 5px; }*/

    .bootbox .modal-footer { border-top: 0; text-align: right; }
    h3 { margin: 5px 0; }
    .order_barcodes img { float: none !important; margin-top: 5px; }
    @media print {
        .no-print { display: none; }
        #wrapper { max-width: 480px; width: 100%; min-width: 250px; margin: 0 auto; }
        .no-border { border: none !important; }
        .border-bottom { border-bottom: 1px solid #ddd !important; }
        table tfoot { display: table-row-group; }
    }

    #print_button {
        width: 25%;
        line-height: 25px;
        position: fixed;
        left: 15%;
        bottom: 0px;
        color: white;
        font-weight: bold;
        text-align: center;
        font-size: 17px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        cursor: pointer;
        background-color: crimson;
        margin-bottom: 0; 

    }
    #print_button:hover {
        background-color: #3A3A3A;
    }

    #back_button {
        width: 25%;
        line-height: 25px;
        position: fixed;
        left: 40%;
        bottom: 0px;
        color: white;
        font-weight: bold;
        text-align: center;
        font-size: 17px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        cursor: pointer;
        background-color: green;
        margin-bottom: 0; 

    }

    #back_button:hover {
        background-color: #3A3A3A;
    }



    #email_button {
        width: 25%;
        line-height: 25px;
        position: fixed;
        left: 65%;
        bottom: 0px;
        color: white;
        font-weight: bold;
        text-align: center;
        font-size: 17px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        cursor: pointer;
        background-color: crimson;
        margin-bottom: 0; 

    }

    #email_button:hover {
        background-color: #3A3A3A;
    }
    
</style>
<body>
    <div id="wrapper">
        <div id="receiptData">
            <div class="no-print"></div>
            <div id="receipt-data">
                <div class="text-center">
                    <img width="400px" src="https://gadgettrading.net/repairs/assets/uploads/logos/3a6460ef42df0a8e23debadefd2770cd.png" alt=""><h3 style="text-transform:uppercase;">GADGET PROFIX</h3>
                    <p>No.2B Bandar Pasir Puteh, Jalan Kota Bha<br>gadgetprofix@gmail.com<br><br>Tel: 017 999 0009</p>                
                </div>
                <?php 
                    foreach ($getposdetails as $details) {
                    $correctdate = $details->date_pos;
                    $timestamp = strtotime($correctdate);
                ?>
                <p>Date: <?php echo date('d/m/Y', $timestamp);?><br>Sale No/Ref: <?php echo $details->transaction_id?><br>Sales Associate: <?php echo $details->user_incharge?></p><p>Customer: <?php echo $details->c_name?>&nbsp;<?php echo $details->c_id?><br></p>
                <?php 
                    }
                ?>
                <div style="clear:both;"></div>
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price (Quantity)</th>
                            <th class="text-right">Tax</th>
                            <th class="text-right">Discount</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1; 
                            foreach ($getproductdetails as $product) {
                        ?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $product->pro_name?>&#8230;</td>
                            <td>RM<?php echo $product->p_price?> (<?php echo $product->pro_qty?>)</td>
                            <td class="text-right">RM<?php echo $product->pro_tax?> (*NT)</td>
                            <td class="text-right">RM<?php echo $product->pro_disc?> (*NT)</td>
                            <td class="text-right">RM<?php echo $product->pro_price?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </tbody>
                    <tfoot>
                        <?php 
                            foreach ($getcalculation as $calc) {
                        ?>
                        <tr>
                            <th colspan="5">Tax</th>
                            <th class="text-right">RM<?php echo $calc->totaltax?></th>
                        </tr>
                        <tr>
                            <th colspan="5">Total</th>
                            <th class="text-right">RM<?php echo $calc->total?></th>
                        </tr>
                        <tr>
                            <th colspan="5">Discount</th>
                            <th class="text-right">RM<?php echo $calc->pro_disc?></th>
                        </tr>
                        <tr>
                            <th colspan="5">Grand Total</th>
                            <th class="text-right">RM<?php echo $calc->total?></th>
                        </tr>
                        <?php
                            }
                        ?>
                    </tfoot>
                </table>
                <table class="table table-striped table-condensed">
                    <tbody>
                        <?php 
                            foreach($getcalculation as $calculation)
                            { 
                                $balance = $calculation->total - $calculation->total_paid;
                        ?>
                        <tr>
                            <td>Paid by: Cash</td>
                            <td colspan="2">Amount: RM<?php echo $calculation->total_paid?></td>
                            <td>Change: <?php echo $balance?></td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>                                 
                <div class="well">
<!--                     <div class="order_barcodes text-center">
                         <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMYAAABKCAIAAABvi7ypAAAACXBIWXMAAA7EAAAOxAGVKw4bAAABI0lEQVR4nO3SS6qEMBQAUdP733PeQBBJntI0NTxnFOP1hzXmnMezMcZxHHPOMcY5eS32gXPnPnzNLzvn2H3g+7u9POK6ZHnKPnCt74fLB+7zT3fbN5++InnJ5arv1/vm/nOXX/Pv+78383k5Bz+QFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRGTFDFJEZMUMUkRkxQxSRH7Ay6YlpFWt+LJAAAAAElFTkSuQmCC' alt='SALE/2019/0002' class='bcimg' />                    
                     </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>

        <div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
            <hr>
            <button id="print_button" onclick="window.print();" class="btn btn-block btn-primary">Print</button>
            <!-- href="https://gadgettrading.net/repairs/panel/pos" -->
            <a id="back_button" href="<?php echo base_url('admin/viewsales');?>" class="btn btn-block btn-primary">Back To POS</a>
            <?php foreach($getposdetails as $getholdid){?>
            <a id="email_button" class="btn btn-block btn-primary" href="<?php echo base_url(). 'func_report/sendMailSales/'.$getholdid->hold_id; ?>">Email Invoice</a>
            <?php }?>
            <div style="clear:both;"></div>
        </div>
    </div>
</body>
</html>