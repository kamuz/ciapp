<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_view  {
    // function view admin-panel
    function admin_page($pagename, $data = array(), $title){
        
        $d = array();
        $d['page_title'] = $title;

        $CI = &get_instance(); // access to CodeIgniter class

        $CI->load->view('admin/header.php', $d);

        $CI->load->view('admin/' . $pagename, $data);

        $fdata = array();
        $fdata['validation_errors'] = validation_errors(); // output list of all errors validation

        $CI->load->view('admin/footer.php', $fdata);

    }

    function user_page($pagename = ''){  

        $CI = &get_instance(); 

        // put middle content
        $CI->db->where('page_id', $pagename);
        $query = $CI->db->get('pages');

        if ($query->num_rows() > 0) {
            $row = $query->row_array();

            $c = array();
            $c['content'] = $row['text'];

            if($row['showed'] != 1){
                die('Эта страница скрыта');
            }
        } else {
            die('Такой страницы не существует');
        }

        $d = array();
        $d['page_title'] = $row['title'];

        $CI->load->view('header.php', $d);
        $CI->load->view('content', $c);
        $CI->load->view('footer.php');

    }

    function simple_page($page, $data = array(), $title){  
    
        $CI = &get_instance();

        $d = array();
        $d['page_title'] = $title;

        $CI->load->view('header.php', $d);
        
        
        $CI->load->view($page, $data);
        
        $fdata = array();
        $fdata['validation_errors'] = validation_errors();
        
        $CI->load->view('footer.php', $fdata);

    }

}
