<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Verot\Upload\Upload;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * UploadImage component
 *  * Description of Utils
 * use vendor https://www.verot.net/php_class_upload_samples.htm
 * enter require_once(ROOT . DS.'vendor' . DS  . 'class-upload-php-master' . DS . 'src' . DS . 'class.upload.php');
 * 
 * https://github.com/verot/class.upload.php
 */
class UploadImageComponent extends Component {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'uploadRootPath' => 'img/'
    ];

    public function upload($file = null, $name = '', $image_x = 800, $image_y = null, $path = null, $crop = true) {
        $result = [
            'status' => false,
            'file' => $file,
            'image_path' => $path,
            'image_name' => '',
            'msg' => ''
        ];
        $handle = new Upload($file);
        if ($handle->uploaded) {
            $fullPath = $this->_config['uploadRootPath'] . $path;
            $dir = new Folder(WWW_ROOT . $fullPath, true, 0755);
            //Check name
            if ($name == '') {
                $name = time() . "_" . rand(000000, 999999);
            }

            $handle->file_new_name_body = $name;


            if ($crop) {
                $handle->image_resize = true;
                $handle->image_ratio = true;
                $handle->image_ratio_crop = true;
                $handle->image_x = 800;
                $handle->image_y = 800;
            }
            //$handle->image_x = $image_x;
            //$handle->image_ratio_y = true;
            //$handle->image_ratio_crop = 'L';
            $handle->process(WWW_ROOT . $fullPath);
            //$imgResult = $handle->processed;
            if ($handle->processed) {
                $result = [
                    'status' => true,
                    'image_path' => $fullPath,
                    'image_name' => $handle->file_dst_name,
                    'url' => SITE_URL . $fullPath . $handle->file_dst_name,
                    'data' => $handle
                ];
                $handle->clean();
            } else {
                $result = [
                    'status' => false,
                    'image_name' => $name,
                    'file' => $file,
                    'image_path' => $fullPath,
                    'msg' => $handle->error
                ];
                //echo 'error : ' . $handle->error;
            }
        }

        return $result;
    }

}
