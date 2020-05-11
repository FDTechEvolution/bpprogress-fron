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

    public function category () {

    }
    
    public function search(){
        $this->viewBuilder()->setLayout('product');
        
        $productCategory = $this->request->getQuery('type');
        $searchTxt = $this->request->getQuery('search'); 
        
        $products = $this->Httprequest->get(SITE_API . 'sv-products/search?type=' .$productCategory.'&search='.$searchTxt);
        $products = $products['data'];
        $this->set(compact('products'));
        
    }

}
