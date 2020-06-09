<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Forgot Controller
 *
 *
 * @method \App\Model\Entity\Forgot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ForgotController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        
    }

    public function reset() {
        if ($this->request->is(['POST'])) {
            $postData = $this->request->getData();
            $this->log($postData, 'debug');
            $result = $this->Httprequest->post(SITE_API.'sv-users/reset-password',$postData);
            if($result['status']==200){
                $this->Flash->success('เราได้ส่งรหัสผ่านใหม่ไปยังหมายเลขโทรศัพท์ของคุณแล้ว');
                return $this->redirect(['controller'=>'login']);
            }
        }
    }

}
