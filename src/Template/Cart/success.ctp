<div class="error_page_bg">
    <div class="container">
        <div class="error_section">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="">
                        <h2>เราได้รับคำสั่งซื้อของคุณแล้ว</h2>
                        <p>คุณสามารถติดตามสถานะ หรือ รายละเอียดการสั่งซื้อทั้งหมดของคุณ ได้ที่ <?=$this->Html->link('รายการสั่งซื้อของฉัน',['controller'=>'account','action'=>'myorder'],['style'=>'text-decoration:underline;'])?></p>

                        <?=$this->Html->link('กลับสู่หน้าหลัก',['controller'=>'home'],['class'=>'btn btn-primary'])?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>