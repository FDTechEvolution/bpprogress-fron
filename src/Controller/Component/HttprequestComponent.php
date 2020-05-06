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
        'apiUrl' => NULL
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

        $obj = json_decode($result, true);
        //$this->log($obj,'debug');
        return $obj;
    }

    public function post($url = '', $data = null) {
        //$url = $this->_defaultConfig['apiUrl'].$url;
        //$this->log($url,'debug');
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $content = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($content, true);
            $this->log($content,'debug');
            return $obj;
        } catch (Exception $ex) {
            $this->log($ex, 'debug');
            return $ex;
        }
    }

    public function postWithFile($url = '', $data = null) {
        //$url = $this->_defaultConfig['apiUrl'].$url;
        //$this->log($url,'debug');
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt(
                    $request,
                    CURLOPT_POSTFIELDS,
                    array(
                        'file' =>
                        '@' . $_FILES['file']['tmp_name']
                        . ';filename=' . $_FILES['file']['name']
                        . ';type=' . $_FILES['file']['type']
            ));
            $content = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($content, true);
            return $obj;
        } catch (Exception $ex) {
            $this->log($ex, 'debug');
            return $ex;
        }
    }

}
