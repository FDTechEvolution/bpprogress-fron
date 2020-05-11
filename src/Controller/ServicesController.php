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

    public function updateAddress() {
        if ($this->request->is(['POST', 'AJAX', 'PUT'])) {
            $postData = $this->request->getData();
            //$this->log($postData,'debug');
            $result = $this->Httprequest->post(SITE_API . 'sv-users/update-address', $postData);
            $address = $result['data'];

            $this->responData = ['status' => 200, 'msg' => '', 'data' => $address];
        }
        $this->modifyHeader();
        $this->RequestHandler->respondAs('json');
        $json = json_encode($this->responData, JSON_UNESCAPED_UNICODE);
        $this->response = $this->response->withStringBody($json);
        $this->response = $this->response->withType('json');

        return $this->response;
    }

    public function session($userId = null) {
        $this->modifyHeader();
        $this->RequestHandler->respondAs('json');
        //$this->log($userId,'debug');
        if (!is_null($userId) && $userId != '' && $userId != 'null') {
            $user = $this->Httprequest->get(SITE_API . 'sv-users/get-user/' . $userId);
            if ($user['data'] != '') {
                $this->request->getSession()->write('User', $user);
                $this->responData = ['status' => 200, 'msg' => '', 'data' => 'LOGGED'];
            } else {
                $this->request->getSession()->destroy();
                $this->responData = ['status' => 200, 'msg' => '', 'data' => 'NOT_LOGGED'];
            }

            //$this->log($user,'debug');
        } else {
            $this->request->getSession()->destroy();
            $this->responData = ['status' => 200, 'msg' => '', 'data' => 'NOT_LOGGED'];
        }

        $json = json_encode($this->responData, JSON_UNESCAPED_UNICODE);
        $this->response = $this->response->withStringBody($json);
        $this->response = $this->response->withType('json');

        return $this->response;
    }

    public function api() {
        $data = [];
        $url = $this->request->getQuery('url');
        

        $this->responData['method'] = $this->request->getMethod();
        if ($this->request->is(['GET'])) {
            $result = $this->Httprequest->get($url);
            //$this->log($result,'debug');
            $data = $result['data'];
            $this->responData['status'] = 200;
            $this->responData['data'] = $data;
        } else {
            $postData = $this->request->getData();
            
            $result = $this->Httprequest->post($url, $postData);
           // $this->log($result, 'debug');
            $data = $result['data'];

            $this->responData['status'] = 200;
            $this->responData['data'] = $data;
            $this->responData['result'] = $postData;
        }



        $this->modifyHeader();
        $this->RequestHandler->respondAs('json');
        $json = json_encode($this->responData, JSON_UNESCAPED_UNICODE);
        $this->response = $this->response->withStringBody($json);
        $this->response = $this->response->withType('json');

        return $this->response;
    }

}
