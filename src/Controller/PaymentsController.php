<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Payments Controller
 *
 *
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController {

    public $Images = null;
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Images = TableRegistry::get('Images');
        $this->CheckAuthen->forceLogin();
    }

    public function index() {
        $orderId = $this->request->getQuery('order');
        $order = $this->Httprequest->get(SITE_API . 'sv-orders/get-order/' . $orderId);
        $order = $order['data'];
        if ($order['payment_method'] == 'transfer') {
            return $this->redirect(['action' => 'transfer', 'order' => $order['id']]);
        } elseif ($order['payment_method'] == 'creditcard') {
            return $this->redirect(['action' => 'creditcard', 'order' => $order['id']]);
        } else {
            return $this->redirect(['controller' => 'cart', 'action' => 'checkout', 'order' => $orderId]);
        }
    }

    public function transfer() {
        $orderId = $this->request->getQuery('order');

        if ($this->request->is(['POST'])) {
            $postData = $this->request->getData();
            //$this->log($postData,'debug');
            //Sace slip
            //$result = $this->Httprequest->post(SITE_API . 'sv-images/save-slip', ['image_file' => $postData['image_file']]);
            $image = $this->saveSlip($postData['image_file']);
            //$this->log($image, 'debug');
            //die();
            $postData['image_id'] = $image['id'];
            //$this->log($postData,'debug');
            $result = $this->Httprequest->post(SITE_API . 'sv-payments/update', $postData);
            $payment = $result['data'];
            //$this->log($result,'debug');
            if (!is_null($payment)) {
                $result = $this->Httprequest->post(SITE_API . 'sv-orders/update-order', ['payment_status' => 'PAID', 'order_id' => $orderId]);
                //$this->log($result,'debug');
                return $this->redirect(['action' => 'success']);
            }
        }
        $imeOpts = $this->generateTimeOption();
        $order = $this->Httprequest->get(SITE_API . 'sv-orders/get-order/' . $orderId);
        $order = $order['data'];
        //$this->log($order,'debug');
        $this->set(compact('order', 'imeOpts'));
    }

    public function creditcard() {
        $orderId = $this->request->getQuery('order');

        $order = $this->Httprequest->get(SITE_API . 'sv-orders/get-order/' . $orderId);
        $order = $order['data'];

        $this->set(compact('order'));
    }

    public function success() {
        
    }

    private function saveSlip($file) {
        $this->loadComponent('UploadImage');

        if (!is_null($file['name']) && $file['name'] != '') {
            $result = $this->UploadImage->upload($file, '', null, null, 'slips' . DS);
            //$this->log($result,'debug');

            $image = $this->Images->newEntity();
            $image->fullpath = $result['url'];
            $image->path = $result['image_path'];
            $image->name = $result['image_name'];
            $this->Images->save($image);
            
            return $image;
        }
    }

    private function generateTimeOption() {
        $data = [];
        //$this->log($data, 'debug');
        for ($i = 0; $i <= 5; $i++) {
            $str = (string) $i;

            for ($j = 0; $j <= 9; $j++) {
                $_str = (string) $str . (string) $j;
                $data[$_str] = $_str;
                // array_push($data, ["'".$str."'" => $str]);
            }
        }

        $h = [
            '00' => '00',
            '01' => '01',
            '02' => '02',
            '03' => '03',
            '04' => '04',
            '05' => '05',
            '06' => '06',
            '07' => '07',
            '08' => '08',
            '09' => '09',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20',
            '21' => '21',
            '22' => '22',
            '23' => '23'
        ];

        return ['h' => $h, 'm' => $data];
    }

}
