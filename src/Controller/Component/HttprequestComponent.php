<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Httprequest component
 */
class HttprequestComponent extends Component {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'apiUrl'=>NULL
    ];

    public function get($url = '') {
        //$apiUrl = $this->_defaultConfig['apiUrl'].$url;
        $apiUrl = $url;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result,true);
        //$this->log($obj,'debug');
        return $obj;
    }

}
