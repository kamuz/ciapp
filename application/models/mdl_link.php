<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_link extends CRUD { 
    var $table = 'links';
    var $key_id = 'link_id';

    var $add_rules = array (

        array (
            'field' => 'link_id',
            'label' => 'ID ссылки',
            'rules' => 'required|az_numeric|uniq[link_id]'                  
        ),
        
        array (
            'field' => 'descr',
            'label' => 'Описание',
            'rules' => 'required|valid_title'
        
        ),
        
        array (
            'field' => 'url',
            'label' => 'URL',
            'rules' => 'required|valid_url'
        
        ),           
    
    );

    var $edit_rules = array (

        array (
            'field' => 'descr',
            'label' => 'Описание',
            'rules' => 'required|valid_title'
        
        ),
        
        array (
            'field' => 'url',
            'label' => 'URL',
            'rules' => 'required|valid_url'
        
        ),           
    
    );
}