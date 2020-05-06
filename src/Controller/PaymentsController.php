<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Payments Controller
 *
 *
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController {
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->CheckAuthen->forceLogin();
    }

    public function transfer(){
        $orderId = $this->request->getQuery('order');
        
        if($this->request->is(['POST'])){
            $postData = $this->request->getData();
            //$this->log($postData,'debug');
            $result = $this->Httprequest->post(SITE_API.'sv-payments/update',$postData);
            $payment = $result['data'];
            $this->log($result,'debug');
            if(!is_null($payment)){
                $result = $this->Httprequest->post(SITE_API . 'sv-orders/update-order', ['payment_status'=>'PAID','order_id'=>$orderId]);
                
                return $this->redirect(['action'=>'success']);
            }
        }
   
        $order = $this->Httprequest->get(SITE_API.'sv-orders/get-order/'.$orderId);
        $order = $order['data'];
        //$this->log($order,'debug');
        $this->set(compact('order'));
    }
    
    public function creditcard(){
        $orderId = $this->request->getQuery('order');
        
        $order = $this->Httprequest->get(SITE_API.'sv-orders/get-order/'.$orderId);
        $order = $order['data'];
        
        $this->set(compact('order'));
    }
    
    public function success(){
        
    }
}
