<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lunit extends CI_Controller{
    function login()
    {
        $rules = array(
            array(
                'field' => 'login',
                'label' => 'Логин:',
                'rules' => 'required|az_numeric',
            ),
            array(
                'field' => 'pass',
                'label' => 'Пароль:',
                'rules' => 'required|max_length[40]',
            ),
        );
        
        $this->form_validation->set_rules($rules);
        
        // if validation was - trying to make entry
        if($this->form_validation->run()){
            $this->lib_auth->do_login($this->input->post('login'), $this->input->post('pass'));
        }else{
            $this->lib_view->simple_page('login', array(), 'Вход администратора');
        }
        
    }
    
    function logout()
    {
        // test - whether the entry
        $this->lib_auth->check_admin();
        $this->lib_auth->logout();
    }

    function index()
    {
        $this->lib_auth->check_admin();
        $data = array();
        
        // sum clicks         
        $this->db->select_sum('clicks');
        $query = $this->db->get('links');
        
        $res = $query->row_array();
        $data['clicks'] = $res['clicks'];
        
        // max click
        $this->db->select_max('clicks');
        $query = $this->db->get('links');
        
        $res = $query->row_array();
        $data['max'] = $res['clicks'];
        
        // name of most popular links
        $this->db->where('clicks', $data['max']);
        $query = $this->db-> get('links');
        
        $res = $query->row_array();
        $data['popular'] = $res['descr'];
        
        // number of pages         
        $data['pages'] = $this->db->count_all_results('pages');   
        $this->lib_view->admin_page('main', $data, 'Главная');
    }
}