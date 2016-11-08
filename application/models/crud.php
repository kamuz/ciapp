<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CRUD extends CI_Model { 
    var $table = ''; // name table
    var $key_id = ''; // key ID
    var $add_rules = array(); // rules validation for function add
    var $edit_rules = array(); // rules validation for function edit

    function __construct(){
        parent::__construct();
    }

    /**
     * add data
     */
    function add(){

        // set rules of validation
        $this->form_validation->set_rules($this->add_rules);

        if($this->form_validation->run()){
            
            // create an array of fields to be added into database - added only those fields that appear in the list of validation
            $data = array();

            // we must get array like this $data['name'] = 'fireworks cs6 essential training';
            foreach ($this->add_rules as $one) {
                // build key for array $data. For example - $f = Array['field'];
                $f = $one['field'];
                // get value for array $data from input of form $data[Array['field']] = 'fireworks cs6 essential training';
                $data[$f] = $this->input->post($f); 
            }

            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
        else{
            return FALSE;
        }     
    }

    /**
     * edit data
     */
     function edit($id){
        // set rules of validation
        $this->form_validation->set_rules($this->edit_rules);

        if($this->form_validation->run()){
            
            // create an array of fields to be added into database - added only those fields that appear in the list of validation
            $data = array();

            // we must get array like this $data['name'] = 'fireworks cs6 essential training';
            foreach ($this->edit_rules as $one) {
                // build key for array $data. For example - $f = Array['field'];
                $f = $one['field'];
                // get value for array $data from input of form $data[Array['field']] = 'fireworks cs6 essential training';
                $data[$f] = $this->input->post($f); 
            }

            $this->db->where($this->key_id, $id);
            $this->db->update($this->table, $data);
            return TRUE;
        }
        else{
            return FALSE;
        } 
     }

    /**
     * delete data
     */
    function del($id){
        $this->db->where($this->key_id, $id);
        $this->db->delete($this->table);
    }

    /**
     * get info about good
     */
    function get($id){
        $this->db->where($this->key_id, $id);
        $query = $this->db->get($this->table);
        // for one element - we need to receive array without number index at once to element 
        return $query->row_array();
    }

    /**
     * get list of goods
     */
    function get_list($start_from = FALSE){

        // set list of sort
        $sort_by = $this->session->userdata('sort_by');
        $sort_dir = $this->session->userdata('sort_dir');

        // if not empty value - set param sort
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_dir);
        }

        // for search
        $search = $this->session->userdata('search');
        $search_by = $this->session->userdata('search_by');

        // if not empty value - set search
        if (!empty($search)) {
            $this->db->like($search_by, $search);
        }

        if ($start_from !== FALSE) {
            $this->db->limit($this->config->item('per_page'), $start_from); // limit quantity set quantity of item and position counter
        }
        
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}