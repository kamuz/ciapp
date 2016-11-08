<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* For load images
*/
class Images extends CI_Controller
{

    // constructor
    function __construct()
   {
        parent::__construct();
        $this->lib_auth->check_admin();
   }
    
    // list of images
    public function index()
    {
        $this->load->helper('directory');
        $list = directory_map('./img/upload/', TRUE);

        //explode list of file
        $data = array();
        $data['list'] = $list;

        // show page of list
        $this->lib_view->admin_page('images/index', $data, 'Список картинок');
    }

    // delete file
    public function del($filename)
    {
        unlink('./img/upload/' . $filename);
        redirect('admin/images');
    }

    // show form for upload file
    public function show_upload()
    {
        $this->lib_view->admin_page('images/upload', array(), 'Загрузка картинки');
    }

    // upload file
    public function do_upload()
    {
        $this->load->library('upload');

        // config data
        $config = array();

        $config['upload_path'] = './img/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';

        // apply setting
        $this->upload->initialize($config);

        // make upload
        $this->upload->do_upload();

        redirect('admin/images');
    }

    public function imglist()
    {
        // load helper tinymce
        $this->load->helper('tinymce');

        // output headers for bun caching
        nocache_headers();

        // start js-array
        $code = 'var tinyMCEImageList = new Array(';

        // load helper directory
        $this->load->helper('directory');

        // list of files
        $filelist = directory_map('./img/upload/', TRUE);

        $firstelement = TRUE; // for first element that no-paste coma

        foreach($filelist as $one){
            if($firstelement){
                $firstelement == FALSE; // no-apply first element
            }else{
                $code .= ', '; // add coma
            }
            $code .= "\r\n";

            // add element of list
            $code .= '["' . $one . '", "' . base_url() . 'img/upload/' . $one . '"]';
        }
        // end js-array
        $code .= "\r\n );";
        
        echo '<pre>';

        echo $code;

        echo '</pre>';
        
    }
}