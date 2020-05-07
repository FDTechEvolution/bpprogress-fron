<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Account Controller
 *
 *
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountController extends AppController {

    public $OrderStatus = [
        'DR'=>'ฉบับร่าง',
        'NEW'=>'รอผู้ขายยืนยัน',
        'WT'=>'รอจัดส่ง',
        'SENT'=>'ส่งแล้ว',
        'RECEIPT'=>'รับสินค้าแล้ว',
        'VO'=>'ยกเลิก'
    ];
    
    public $PaymentStatus = [
        'PAID'=>'ชำระเงินแล้ว',
        'NOTPAID'=>'ยังไม่ได้ชำระเงิน'
    ];
    public $PaymentMethod = [
        'cod'=>'เก็บเงินปลายทาง',
        'transfer'=>'โอนเงิน',
        'creditcard'=>'บัตรเครดิต',
        'cash'=>'เงินสด'
    ];
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $user = $this->Cookie->read('User');
        
        
        $user = $this->Httprequest->get(SITE_API.'sv-users/get-user/'.$user['id']);
        //$this->log($user,'debug');
        $user = $user['data'];
        
        $orders = $this->Httprequest->get(SITE_API.'sv-orders/get-order-by-user/'.$user['id']);
        $orders = $orders['data'];
        $orderStatus = $this->OrderStatus;
        $paymentStatus = $this->PaymentStatus;
        $paymentMethod = $this->PaymentMethod;
        
        
        $this->set(compact('user','orders','orderStatus','paymentStatus','paymentMethod'));
    }

    public function myorder() {
        
    }

}
