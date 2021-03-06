<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * CheckAuthen component
 */
class CheckAuthenComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $components = ['Cookie'];
    
    public function forceLogin(){
        
        $user = $this->Cookie->read('User');
        //$this->log($user,'debug');
        if(is_null($user) || $user ==''){
             $controller = $this->_registry->getController();
              return $controller->redirect(['controller'=>'login']);
        }
    }
    
}
