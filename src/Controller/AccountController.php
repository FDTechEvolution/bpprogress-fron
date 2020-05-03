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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $user = $this->request->getSession()->read('User');
        
        
        $user = $this->Httprequest->get(SITE_API.'sv-users/get-user/'.$user['data']['id']);
        //$this->log($user,'debug');
        $user = $user['data'];
        
        $orders = $this->Httprequest->get(SITE_API.'sv-orders/get-order-by-user/'.$user['id']);
        $orders = $orders['data'];
        $this->log($orders,'debug');
        $this->set(compact('user','orders'));
    }

    public function myorder() {
        
    }

}
