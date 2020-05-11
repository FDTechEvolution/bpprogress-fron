<div class="product_page_bg">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3>รายละเอียดคำสั่งซื้อ No.<?= $order['docno'] ?></h3>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-10 col-12 offset-md-1">
                        <div class="row">
                            <?php
                            $step = 1;
                            if ($order['status'] == 'WT') {
                                $step = 2;
                            } elseif ($order['status'] == 'SENT') {
                                $step = 3;
                            } elseif ($order['status'] == 'RECEIPT') {
                                $step = 4;
                            }
                            ?>
                            <div class="col-3 text-center">
                                <div class="alert alert-<?= $step > 0 ? 'success' : 'light' ?>" role="alert">
                                    <h1><i class="fas fa-cart-plus"></i></h1>
                                    <h4 class="alert-heading">สั่งซื้อแล้ว</h4>
                                    <p>รอผู้ชายตรวจสอบและยืนยัน</p>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <div class="alert alert-<?= $step > 1 ? 'success' : 'light' ?>" role="alert">
                                    <h1><i class="fas fa-truck-loading"></i></h1>
                                    <h4 class="alert-heading">กำลังดำเนินการ</h4>
                                    <p>กำลังแพคสินค้า</p>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <div class="alert alert-<?= $step > 2 ? 'success' : 'light' ?>" role="alert">
                                    <h1><i class="fas fa-truck"></i></h1>
                                    <h4 class="alert-heading">กำลังจัดส่ง</h4>
                                    <p>บริษัทขนส่งกำลังนำส่ง </p>
                                </div>
                                <?=$order['status']=='SENT'?'หมายเลขพัสดุ '.$order['trackingno']:''?>
                            </div>
                            <div class="col-3 text-center">
                                <div class="alert alert-<?= $step > 3 ? 'success' : 'light' ?>" role="alert">
                                    <h1><i class="fas fa-handshake"></i></h1>
                                    <h4 class="alert-heading">รับสินค้าแล้ว</h4>
                                    <p>สินค้าถึงมือคุณเรียบร้อยแล้ว</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-12">
                        <h4>รายการสั่งซื้อ</h4>
                    </div>
                    <div class="col-12">
                        <table id="tb-list-product" class="table">
                            <thead>
                                <tr>

                                    <th class="product_thumb text-center">รูปสินค้า</th>
                                    <th class="product_name text-left">ชื่อสินค้า</th>
                                    <th class="product-price text-right">ราคา</th>
                                    <th class="product_quantity text-right">จำนวน</th>
                                    <th class="product_total text-right">ราคารวม</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order['order_lines'] as $index => $line): ?>
                                    <tr>
                                        <td class="text-center">
                                            <image src="<?= $line['product']['product_images'][0]['image']['fullpath'] ?>" width="70" />
                                        </td>
                                        <td class="text-left"><?= $line['product']['name'] ?></td>
                                        <td class="text-right"><?= number_format($line['unit_price']) ?></td>
                                        <td class="text-right"><?= $line['qty'] ?></td>
                                        <td class="text-right"><?= number_format($line['amount']) ?></td>
                                    </tr>
                                   
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4>ที่อยู่สำหรับจัดส่ง</h4>
                        <?php 
                        $addr = $order['address'];
                        $address = sprintf('%s ต.%s อ.%s จ.%s %s โทร.%s',$addr['address_line'],$addr['subdistrict'],$addr['district'],$addr['province'],$addr['zipcode'],$addr['mobile']);
                        ?>
                        <p><?=h($address)?></p>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-7 text-right"><h3 class="text-primary">ยอดรวมทั้งสิ้น</h3></div>
                            <div class="col-5 text-right"><h3 class="text-primary"><?= number_format($order['totalamt'])?></h3></div>
                            <div class="col-7 text-right"><h4>วิธีชำระเงิน</h4></div>
                            <div class="col-5 text-right"><h4><?=$order['payment_method']?></h4></div>
                        </div>
                    </div>
                </div>
               
            </div>

        </div>
    </div>
</div>