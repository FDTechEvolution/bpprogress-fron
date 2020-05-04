<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Cart Controller
 *
 *
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController {

     public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->CheckAuthen->forceLogin();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        
        
        if($this->request->is(['POST'])){
            $postData = $this->request->getData();
            //$this->log($postData,'debug');
            $result = $this->Httprequest->post(SITE_API.'sv-orders/save',$postData);
            $order = $result['data'];
            
            return $this->redirect(['action'=>'process',$order['id']]);
        }
    }
    public function process($orderId = null){
        $this->set(compact('orderId'));
    }
    
    public function checkout(){
        $orderId = $this->request->getQuery('order');
        if($this->request->is(['POST'])){
            $postData = $this->request->getData();
            $postData['status'] = 'NEW';
            //$this->log($postData,'debug');
            $result = $this->Httprequest->post(SITE_API.'sv-orders/update-order',$postData);
            $order = $result['data'];
            if($result['status'] ==200){
                if($order['payment_method']=='transfer'){
                     return $this->redirect(['controller'=>'payments','action'=>'transfer']);
                }elseif($order['payment_method']=='creditcard'){
                     return $this->redirect(['controller'=>'payments','action'=>'creditcard']);
                }else{
                    return $this->redirect(['action'=>'success']);
                }
                
            }
        }
        $order = $this->Httprequest->get(SITE_API.'sv-orders/get-order/'.$orderId);
        $order = $order['data'];
        
        $user = $this->Httprequest->get(SITE_API.'sv-users/get-user/'.$order['user_id']);
        $user = $user['data'];
        $this->set(compact('order','user'));
    }
    
    public function success(){
        
    }

}
