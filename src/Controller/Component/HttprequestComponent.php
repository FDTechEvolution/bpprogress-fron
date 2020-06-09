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
        //$this->log($url,'debug');
        //$apiUrl = $this->_defaultConfig['apiUrl'].$url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_POST, 0);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_TIMEOUT_MS, 200);

        $content = curl_exec($ch);
        //var_dump($postResult);
        $obj = json_decode($content, true);
        //$obj = $content;
        //$this->log($obj, 'debug');
        //var_dump($obj);
        //$this->log(curl_error($ch), 'debug');

        curl_close($ch);
        return $obj;
    }

    public function post($url = '', $data = null) {
        //$url = $this->_defaultConfig['apiUrl'].$url;
        //$this->log($url,'debug');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_TIMEOUT_MS, 200);

        $content = curl_exec($ch);
        //var_dump($postResult);
        $obj = json_decode($content, true);
        //var_dump($obj);
        curl_close($ch);
        return $obj;
    }

    public function postFile($url = '', $data = null) {

        
        $file_name_with_full_path = realpath($data['image_file']['tmp_name']);
        $handle = fopen($_FILES["image_file"]["tmp_name"], 'r');
        //$this->log($file_name_with_full_path,'debug');
        /* curl will accept an array here too.
         * Many examples I found showed a url-encoded string instead.
         * Take note that the 'key' in the array will be the key that shows up in the
         * $_FILES array of the accept script. and the at sign '@' is required before the
         * file name.
         */
        $post = array('image_file' => '@' . $handle);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $content = curl_exec($ch);
        //var_dump($postResult);
        $obj = json_decode($content, true);
        //var_dump($obj);
        curl_close($ch);
        return $obj;
    }

    function fetch($url, $z = null) {
        $z = tmpfile();

        $ch = curl_init();

        $useragent = isset($z['useragent']) ? $z['useragent'] : 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2';

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, isset($z['post']));

        if (isset($z['post']))
            curl_setopt($ch, CURLOPT_POSTFIELDS, $z['post']);
        if (isset($z['refer']))
            curl_setopt($ch, CURLOPT_REFERER, $z['refer']);

        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, ( isset($z['timeout']) ? $z['timeout'] : 5));
        curl_setopt($ch, CURLOPT_COOKIEJAR, $z['cookiefile']);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $z['cookiefile']);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
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
