<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('home');
    }

    public function index() {
        $result = $this->Httprequest->get(SITE_API.'sv-products/get-new-products');
        $lastProducts = $result['data'];
       
        $this->set(compact('lastProducts'));
        
    }

}
