<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Payments Controller
 *
 *
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController {
    
    public function transfer(){
        
    }
    
    public function creditcard(){
        $orderId = $this->request->getQuery('order');
        
        $order = $this->Httprequest->get(SITE_API.'sv-orders/get-order/'.$orderId);
        $order = $order['data'];
        
        $this->set(compact('order'));
    }
}
