<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Products Controller
 *
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController {

     public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
   
        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->viewBuilder()->setLayout('product');
    }

    public function productDetails () {

    }

}
