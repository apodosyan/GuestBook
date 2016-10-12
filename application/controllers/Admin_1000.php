<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_1000 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin_logged') !== 'guestbook_admin') {
            redirect(site_url('admin_login'));
        }
        $this->load->model('admin_model');
    }

    public function index()
    {
        $this->load->library('pagination');
        $this->load->model('pagination_model');
        $config = $this->pagination_model->pagination();
        $config['base_url'] = site_url('admin-1000/index/');
        $config['total_rows'] = $this->admin_model->all_admins_count();
        $this->pagination->initialize($config);
        $page = $this->input->get('per_page');
        $admins = $this->admin_model->get_admins($config["per_page"], $page);
        $pagination = $this->pagination->create_links();
        $this->admin_view_load->view('admin/admins_view', compact('admins', 'pagination'));

    }


    public function add_admin()
    {
        $rules = $this->admin_model->set_rules_for_new_admin();
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run()) {
            $data = array(
                'username' => $this->input->post('login', true),
                'email' => $this->input->post('email', true),
                'password' => $this->input->post('password', true),
                'ip' => $this->input->ip_address()
            );
            $this->admin_model->add_admin($data);
            $this->session->set_flashdata('Admin_added', true);
            redirect(site_url('admin-1000/index'));

        }
        $this->admin_view_load->view('admin/add_admin_view');

    }

    public function del_admin($admin_id = 0) {
        $this->admin_model->del_admin($admin_id);
        redirect(site_url('admin-1000/index'));
    }

    public function edit_admin($admin_id = 0) {
        $admin_id = abs((int)$admin_id);
        if(!$this->admin_model->check_admin_exist($admin_id))
            show_404();
        $config = $this->admin_model->set_rules_for_new_admin();
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $data = array(
                'username' => $this->input->post('login', true),
                'email' => $this->input->post('email', true),
                'password' => $this->input->post('password', true),
                'ip' => $this->input->ip_address()
            );
            $this->admin_model->update_admin($admin_id, $data);
            $this->session->set_flashdata('admin_updated', true);
            redirect(site_url('admin-1000/index'));
            
        }
        $admin = $this->admin_model->get_admin($admin_id);
        $this->admin_view_load->view('admin/edit_admin_view', compact('admin'));
    }

    
    public function show_messages()
    {
        $this->load->library('pagination');
        $this->load->model('pagination_model');
        $where = array(
            'id' =>  $this->input->get('id', true),
            'name' =>  $this->input->get('name', true),
            'message' =>  $this->input->get('message', true),
            'email' =>  $this->input->get('email', true),
            'added_from' =>  $this->input->get('added_from', true),
            'added_to' =>  $this->input->get('added_to', true),
            'ip' =>  $this->input->get('ip', true),
        );
        $config = $this->pagination_model->pagination();
        $url = base_url(uri_string()).'/?'.$_SERVER['QUERY_STRING'];
        if(strrpos($url, '&per_page')) {
            $url = substr($url, 0, strrpos($url, '&per_page'));
        }
        $config['base_url'] = $url;
        $config['total_rows'] = $this->admin_model->all_messages_count($where);
        $this->pagination->initialize($config);
        $page = $this->input->get('per_page');      
        $messages = $this->admin_model->get_messages($config["per_page"], $page, $where);
        $pagination = $this->pagination->create_links();        
        $this->admin_view_load->view('admin/show_messages_view', compact('messages', 'pagination'));
    }

    public function del_message($message_id = 0) {
        $this->admin_model->del_message($message_id);
        redirect(site_url('admin-1000/show_messages'));
    }

    public function edit_message($message_id = 0) {
        $message_id = abs((int)$message_id);
        if(!$this->admin_model->check_message_exist($message_id))
            show_404();
        $this->load->model('guestbook_model');
        $config = $this->guestbook_model->set_rules_for_guestbook();
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $data = array(
                'name' =>  $this->input->post('name', true),
                'message' =>  $this->input->post('message', true),
                'email' =>  $this->input->post('email', true),
            );
            $this->admin_model->update_message($message_id, $data);
            $this->session->set_flashdata('message_updated', true);
            redirect(site_url('admin-1000/show_messages'));

        }
        $message = $this->admin_model->get_message($message_id);
        $this->admin_view_load->view('admin/edit_message_view', compact('message'));
    }

    
}