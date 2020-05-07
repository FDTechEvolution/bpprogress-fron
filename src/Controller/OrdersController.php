<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Orders Controller
 *
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
    }

    public function view($orderId = null) {
        $orderId = $this->request->getQuery('order');

        $order = $this->Httprequest->get(SITE_API . 'sv-orders/get-order/' . $orderId);
        $order = $order['data'];

        $this->set(compact('order'));
    }

}
