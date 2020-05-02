<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Cart Controller
 *
 *
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController {

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
        
    }

}
