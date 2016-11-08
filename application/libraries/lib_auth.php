<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_auth {
	
	public function do_login($login, $pass) {
        $CI = &get_instance();

        // set right variables
        $right_login = $CI->config->item('admin_login');
        $right_pass = $CI->config->item('admin_pass');

        // checking for compliance
        if(($right_login == $login) && ($right_pass == $pass)){
            // if correct - write the session
            $ses = array();
            $ses['admin_logined'] = 'ok';
            // additional protection - of a hash
            $ses['admin_hash'] = $this->the_hash();

            // write to the session
            $CI->session->set_userdata($ses);

            // reditect to the index admin page
            redirect('admin');
        } else{
            redirect('admin/login');
        }
	}

    public function check_admin()
    {
        $CI = &get_instance();

        if (($CI->session->userdata('admin_logined') == 'ok') && ($CI->session->userdata('admin_hash') == $this->the_hash())){
            return TRUE;
        }else{
            redirect('admin/login');
        }
    }

    // creates an additional hash check
    public function the_hash()
    {
        $CI = &get_instance();

        // create hash = password + IP + add word
        $hash = md5($CI->config->item('pass') . $_SERVER['REMOTE_ADDR'] . 'cicms');
    }

    // clean the session data
    public function logout()
    {
        $CI = &get_instance();

        $ses = array();
        $ses['admin_logined'] = '';
        $ses['admin_hash'] = '';

        $CI->session->unset_userdata($ses); // delete session data

        redirect('admin/login');
    }
}

