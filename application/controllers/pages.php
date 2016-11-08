<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller{

    public function show($page_id)
    {
        $this->lib_view->user_page($page_id);
    }

    public function index()
    {
        redirect('index.html');
    }
    public function contact()
    {
        // rules of validation
        $rules = array(
            array(
                'field' => 'email',
                'label' => 'Ваш e-mail:',
                'rules' => 'required|valid_email',
            ),
            array(
                'field' => 'subject',
                'label' => 'Тема сообщения:',
                'rules' => 'required|max_lenght[150]|xss-clean',
            ),
            array(
                'field' => 'text',
                'label' => 'Чего нужно?',
                'rules' => 'required|xss_clean',
            ),
            array(
                'field' => 'captcha',
                'label' => 'Код с картинки',
                'rules' => 'required|numeric|min-length[6]|max-lenght[6]',
            )
        );
        
        // set rules validation
        $this->form_validation->set_rules($rules);
        
        // test is whether the form validation
        $ok_form = $this->form_validation->run();
        
        // if all data from form have been validated
        if ($ok_form) {
            // check the value entered in the captcha to the value of the session
            $entered_captcha = $this->input->post('captcha');
            if($entered_captcha != $this->session->userdata('captcha_rnd_str')){
                $ok_form = FALSE; // if does not match the value from session
            }
        }
        
        // if validation is not completed - show the form
        if(!$ok_form){
            // load plugin captcha
            $this->load->helper('captcha');
            
            // helper for generating random strings
            $this->load->helper('string');
            $rnd_str = random_string('numeric', 6);
            
            // write a string to the session
            $ses_data = array();
            $ses_data['captcha_rnd_str'] = $rnd_str;
            $this->session->set_userdata($ses_data);
            
            // form the image captcha
            $vals = array(
                'word' => $rnd_str,
                'img_path' => './img/captcha/',
                'img_url' => base_url() . 'img/captcha/',
                'font_path' => './system/fonts/texb.ttf',
                'img_width' => 120,
                'img_height' => 30,
                'expiration' => 7200,
            );
            
            $cap = create_captcha($vals);
            
            $data = array();
            $data['imgcode'] = $cap['image']; // code image
            $this->lib_view->simple_page('contact', $data, 'Обратная связь');
            
        }else{
            
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $text = $this->input->post('text');
            
            $this->load->library('email');

            $this->email->from($email);
            $this->email->to('someone@example.com'); 
            $this->email->cc('another@another-example.com'); 
            $this->email->bcc('them@their-example.com'); 
            
            $this->email->subject($subject);
            $this->email->message($text);  
            
            $this->email->send();

            echo 'Отправленно';
        }
    }
}