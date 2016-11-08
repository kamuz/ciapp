<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_page extends CRUD { 
    var $table = 'pages';
    var $key_id = 'page_id';

    var $add_rules = array (

        array (
            'field' => 'page_id',
            'label' => 'ID страницы',
            'rules' => 'required|az_numeric|uniq[link_id]'                  
        ),
        
        array (
            'field' => 'title',
            'label' => 'Название',
            'rules' => 'required'
        
        ),
        
        array (
            'field' => 'text',
            'label' => 'Текст',
            'rules' => ''
        
        ),  

        array (
            'field' => 'date',
            'label' => 'Дата',
            'rules' => 'required|numeric'
        
        ),

        array (
            'field' => 'showed',
            'label' => 'Показывать',
            'rules' => ''
        
        )        
    
    );

    var $edit_rules = array (
        
        array (
            'field' => 'title',
            'label' => 'Название',
            'rules' => 'required'
        
        ),
        
        array (
            'field' => 'text',
            'label' => 'Текст',
            'rules' => ''
        
        ),  

        array (
            'field' => 'showed',
            'label' => 'Показывать',
            'rules' => ''  
        )        
    
    );
}