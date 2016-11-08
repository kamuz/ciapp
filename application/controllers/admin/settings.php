<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
       parent::__construct();
       $this->lib_auth->check_admin();
    }

    public function index()
    {
        $rules = array (
        
            array (
                'field' => 'admin_login',
                'label' => 'Логин:',
                'rules' => 'required|az_numeric',
            ),
            
            array (
                'field' => 'admin_pass',
                'label' => 'Пароль:',
                'rules' => 'required|max_length[40]',
            ),

            array (
                'field' => 'per_page',
                'label' => 'Записей на страницу:',
                'rules' => 'required|numeric',
            ),
        
        );
        
        $this->form_validation->set_rules($rules);

        // write the data into the database
        if($this->form_validation->run()){
            $data = array(
                'admin_login' => $this->input->post('admin_login'),
                'admin_pass' => $this->input->post('admin_pass'),
                'per_page' => $this->input->post('per_page'),
            );
            
            // for each setting are doing a separate update operation
            foreach ($data as $key => $value) {
                $this->db->where('param', $key);
                // for update need an array
                $this->db->update('settings', array('value' => $value));
            }
            redirect('admin');
        }else{
            $this->lib_view->admin_page('settings', array(), 'Настройки');
        }
    }

}