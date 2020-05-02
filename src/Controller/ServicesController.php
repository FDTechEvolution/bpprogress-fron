<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Services Controller
 *
 *
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicesController extends AppController {

    public $responData = ['status' => 403, 'msg' => '', 'data' => []];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->autoRender = false;
    }

    private function modifyHeader() {
        $this->response = $this->response
                ->cors($this->request)
                ->allowOrigin(['*'])
                ->allowMethods(['GET', 'POST', 'AJAX'])
                // ->exposeHeaders(['Link'])
                //->maxAge(300)
                ->build();
    }

    public function saveAddress() {
        $this->modifyHeader();
        $this->RequestHandler->respondAs('json');

        if ($this->request->is(['POST', 'AJAX', 'PUT'])) {
            $postData = $this->request->getData();
            $result = $this->Httprequest->post(SITE_API . 'sv-users/save-address', $postData);
            $address = $result['data'];

            $this->responData = ['status' => 200, 'msg' => '', 'data' => $address];
        }




        $json = json_encode($this->responData, JSON_UNESCAPED_UNICODE);
        $this->response = $this->response->withStringBody($json);
        $this->response = $this->response->withType('json');

        return $this->response;
    }
    
   

}
