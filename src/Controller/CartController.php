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


        if ($this->request->is(['POST'])) {
            $postData = $this->request->getData();

            $this->log($postData, 'debug');
            $orderLines = $postData['order_lines'];

            $checkStock = true;
            if($postData['ispreorder'] == 'Y'){
                $result = $this->Httprequest->post(SITE_API . 'sv-orders/save', $postData);
                $this->log($result,'debug');
                $order = $result['data'];

                return $this->redirect(['action' => 'process', $order['id']]);
            }else{
                foreach ($orderLines as $index => $line) {
                    $url = sprintf('%ssv-orders/check-stock-by-product?product_id=%s&qty=%s', SITE_API, $line['product_id'], $line['qty']);
                    $result = $this->Httprequest->get($url);
                    $result = $result['data'];
                    // $this->log($result, 'debug');
                    if ($result['status'] == false) {
                        $checkStock = false;
                        $this->Flash->error('จำนวนสินค้าไม่เพียงพอ');
                        //$this->Flash->error(__('The shop could not be deleted. Please, try again.'));
                    }
                }
            }

            if ($checkStock) {
                $result = $this->Httprequest->post(SITE_API . 'sv-orders/save', $postData);
                $this->log($result,'debug');
                $order = $result['data'];

                return $this->redirect(['action' => 'process', $order['id']]);
            }
        }
    }

    public function process($orderId = null) {
        $this->set(compact('orderId'));
    }

    public function checkout() {
        $orderId = $this->request->getQuery('order');
        if ($this->request->is(['POST'])) {
            $postData = $this->request->getData();
            $postData['status'] = 'NEW';
            //$this->log($postData,'debug');
            $result = $this->Httprequest->post(SITE_API . 'sv-orders/update-order', $postData);
            $order = $result['data'];
            if ($result['status'] == 200) {
                if ($order['payment_method'] == 'transfer') {
                    return $this->redirect(['controller' => 'payments', 'action' => 'transfer', 'order' => $order['id']]);
                } elseif ($order['payment_method'] == 'creditcard') {
                    return $this->redirect(['controller' => 'payments', 'action' => 'creditcard', 'order' => $order['id']]);
                } else {
                    return $this->redirect(['action' => 'success']);
                }
            }
        }
        $order = $this->Httprequest->get(SITE_API . 'sv-orders/get-order/' . $orderId);
        $order = $order['data'];
        $this->log($order, 'debug');

        $user = $this->Httprequest->get(SITE_API . 'sv-users/get-user/' . $order['user_id']);
        $user = $user['data'];
        $this->set(compact('order', 'user'));
    }

    public function success() {
        
    }

    public function void() {
        $orderId = $this->request->getQuery('order');
        $postData['status'] = 'VO';
        $postData['order_id'] = $orderId;
        //$this->log($postData,'debug');
        $result = $this->Httprequest->post(SITE_API . 'sv-orders/void', $postData);
        if ($result['status'] != 200) {
            $this->Flash->error($result['msg']);
        }
        return $this->redirect(['controller' => 'account', 'action' => 'index']);
    }

}
