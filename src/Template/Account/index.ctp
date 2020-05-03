<div class="account_page_bg">
    <div class="container">
        <section class="main_content_area">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">บัญชีผู้ใช้งาน</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">รายการสั่งซื้อ</a></li>

                                <li><a href="#address" data-toggle="tab" class="nav-link">จัดการที่อยู่</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>บัญชีผู้ใช้งาน </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="#">

                                                <label>ชื่อ - นามสกุล</label>
                                                <input type="text" name="fullname" id='fullname' value="<?= $user['fullname'] ?>">

                                                <label>อีเมล</label>
                                                <input type="text" name="email-name">
                                                <label>หมายเลขโทรศัพท์</label>
                                                <input type="number" name="mobile" id="mobile" value="<?= $user['mobile'] ?>">
                                                <div class="save_button primary_btn default_button">
                                                    <button type="button">บันทึก</button>
                                                </div>
                                                <p>ต้องการ เปลี่บนรหัสผ่าน? <a href="#">เปลี่ยน</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="orders">
                                <h3>รายการสั่งซื้อ</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                
                                                <th>วันที่สั่งซื้อ</th>
                                                <th>หมายเลขคำสั่งซื้อ</th>
                                                <th>สถานะ</th>
                                                <th class="text-right">จำนวนเงิน</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $index => $order): ?>
                                                <tr>

                                                    <td><?=$order['docdate'] ?></td>
                                                    <td><?= $this->Html->link($order['docno'],'#') ?></td>
                                                    <td><?= $order['status'] ?></td>
                                                    <td class="text-right"><?= number_format($order['totalamt']) ?></td>
                                                    
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="address">

                                <h4 class="billing-address">จัดการที่อยู่</h4>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>