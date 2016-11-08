<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Links extends CI_Controller {

    var $iname = 'link';

    public function __construct()
    {
       parent::__construct();
       $mdl_name = 'mdl_' . $this->iname; // name model
       $this->load->model($mdl_name); // load model
       $this->lib_auth->check_admin();
    }


    public function index($link_num = 0)
    {
        $this->lib_mng->show_index($this->iname, 'Список ссылок', $link_num);
    }

    public function add()
    {
        $this->lib_mng->add($this->iname, 'Добавление новой ссылки');
    }

    public function show($id)
    {
        $this->lib_mng->show($this->iname, $id, 'Просмотр ссылки');
    }

    public function edit($id)
    {
        $this->lib_mng->edit($this->iname, $id, 'Редактирование ссылки');
    }

    public function del($id)
    {
        $this->lib_mng->del($this->iname, $id);
    }

    public function sort($field)
    {
        $this->lib_mng->set_sort($this->iname, $field);
    }

    public function search()
    {
        $this->lib_mng->do_search($this->iname);
    }

}