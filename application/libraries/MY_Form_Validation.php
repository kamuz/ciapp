<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_Validation extends CI_Form_Validation{

    // call parrent class
    function __controller()
    {
        parent::CI_Form_Validation();
        // load new language file
        $CI = &get_instance();
        $CI->lang->load('validation_new');
    }

    /**
    * function verification на наличие lowercase symbol and number
    */ 
    function az_numeric($str) {
        return ( ! preg_match("/^([a-z0-9])+$/i", $str)) ? FALSE : TRUE;
    }  
    
    /**
    * validation url
    */ 
    function valid_url ($str) {
        return (!preg_match('/^(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:;.?+=&%@!\-\/]))?$/',$str)) ? FALSE : TRUE;
    }

    
    /**
     * validation title
     */ 
    function valid_title ($str)
    {
     return (!preg_match ('/^[А-Яа-яЁё\w\d\s\.\,\+\-\_\!\?\#\%\@\№\/\(\)\[\]\:\&\$\*]{1,250}$/'
                    ,$str)) ? FALSE : TRUE;
    }       
    
    /**
     * verification on uniqueness
     */
    function uniq ($str, $param) {
        // object CI
        $CI = &get_instance ();
        // name of table
        $tname = str_replace ('_id','s',$param);
        
        $CI->db->where ($param,$str);                     
        return ($CI->db->count_all_results($tname)==0);
    }
}