<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_mng{

    public function add($name, $title)
    {
        $CI = &get_instance(); // access to class CI_Controller
        $md = 'mdl_' . $name; // form name model
        $CI->load->model($md); // load model

        if ($CI->{$md}->add() !== FALSE) {
            redirect('admin/' . $name . 's'); // redirect to list of links (pages)
        } else {
            $CI->lib_view->admin_page($name . '/add', array(), $title); // show form add link (page)
        }
        
    }

    public function show($name, $id, $title)            
    {
        $CI = &get_instance();
        $md = 'mdl_' . $name;
        $CI->load->model($md);
        $data = $CI->{$md}->get($id);

        if (empty($data)) {
            die('Такой записи нет в базе');
        }

        $CI->lib_view->admin_page($name . '/view', $data, $title);
        
    }

    public function show_index($name, $title = '', $start_page = 0)            
    {
        // will be not reset list?
        if ($start_page === 'list') 
        {
            $this->reset_set(); // here reset list
            $start_page = 0; // set 0 for reset
        }

        // if not number 
        if (!is_numeric($start_page)) {
            $start_page = 0;
        }

        // get model
        $CI = &get_instance();
        $md = 'mdl_' . $name;
        $CI->load->model($md);

        // load library Pagination
        $CI->load->library('pagination');

        // get all quantity of item in list
        $total = $CI->{$md}->get_list();

        // array of settings for pagination
        $config = array(
            'base_url' => base_url() . 'admin/' . $name . 's/index/',
            'total_rows' => count($total),
            'per_page' => $CI->config->item('per_page'),
            'uri_segment' => 4
        );

        // set settings
        $CI->pagination->initialize($config); 

        // free memory
        unset($total);

        // get records from model crud
        $list = $CI->{$md}->get_list($start_page);

        $data = array();
        $data['list'] = $list; // create from numeric array to associative array
        $data['page_links'] = $CI->pagination->create_links(); // create $page_link to view

        $CI->lib_view->admin_page($name . '/index', $data, $title);
        
    }

    public function edit($name, $id, $title)
    {
        $CI = &get_instance(); 
        $md = 'mdl_' . $name; 
        $CI->load->model($md);

        $data = $CI->{$md}->get($id); // load data for this object 

        if ($CI->{$md}->edit($id) !== FALSE) {
            redirect('admin/' . $name . 's'); // redirect to list of links (pages)
        } else {
            $CI->lib_view->admin_page($name . '/edit', $data, $title); // show form add link (page)
        }
        
    }

    public function del($name, $id)
    {
        $CI = &get_instance(); 
        $md = 'mdl_' . $name; 
        $CI->load->model($md);

        $CI->{$md}->del($id);
        redirect('admin/' . $name . 's');       
    }

    public function set_sort($name, $field)
    {
        $CI = &get_instance();
        $md = 'mdl_' . $name;
        $CI->load->model($md);

        // array with data for session
        $data = array();
        $data['sort_by'] = $field;
        $data['sort_dir'] = 'ASC';

        // if in session current sort - change opposite
        if (($CI->session->userdata('sort_by') == $field) AND ($CI->session->userdata('sort_dir') == 'ASC')) 
        {
            $data['sort_dir'] = 'DESC';
        }

        // record into session
        $CI->session->set_userdata($data);

        redirect('admin/' . $name . 's');
    } 

    public function reset_set()
    {
        $CI = &get_instance();

        // array of fields for crear
        $data = array();
        $data['sort_by'] = '';
        $data['sort_dir'] = '';
        $data['search'] = '';
        $data['search_by'] = '';

        // delete data of session
        $CI->session->unset_userdata($data);

    }

    public function do_search($name)
    {
        $CI = &get_instance();

        $search = $CI->input->post('str');
        $search_by = $CI->input->post('field');

        // if nothing input into form - redirect
        if (empty($search)) {
            redirect('admin/' . $name . 's');
        }

        // set data for session
        $data = array();
        $data['search'] = $search;
        $data['search_by'] = $search_by;

        // record to the session
        $CI->session->set_userdata($data);

        // redirect to list of records
        redirect('admin/' . $name . 's');
    }

    
}