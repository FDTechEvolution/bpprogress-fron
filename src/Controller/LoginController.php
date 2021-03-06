<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Login Controller
 *
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends AppController {

    public function index() {
        //$this->log($this->Cookie->check('User'),'debug');
        if ($this->Cookie->check('User')) {
            //return $this->redirect(['controller'=>'home','action'=>'index']);
        }
    }

    public function verify($userId = null) {

        if (!is_null($userId) && $userId != '' && $userId != 'null') {
            $user = $this->Httprequest->get(SITE_API . 'sv-users/get-user/' . $userId);
            if ($user['data'] != '') {
                $this->Cookie->write('User', $user['data']);
                //$this->request->getSession()->write('User', $user['data']);
            } else {
                $this->request->getSession()->destroy();
                $this->Cookie->delete('User');
            }

            //$this->log($user,'debug');
        } else {
            $this->request->getSession()->destroy();
            $this->Cookie->delete('User');
        }
        return $this->redirect(['controller' => 'home']);
        //return $this->redirect(['controller' => 'home']);
    }

}
