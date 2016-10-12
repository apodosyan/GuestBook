<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_login_model');
    }

    public function index()
    {
        if($this->session->userdata('admin_logged') === 'guestbook_admin') {
            redirect(site_url('admin-1000'));
        }
        $rules = $this->admin_login_model->set_rules_for_login();
        $this->form_validation->set_rules($rules);        
        if ($this->form_validation->run()) {
            $login = $this->input->post('login', true);
            $password = $this->input->post('password', true);
            if($this->admin_login_model->login_admin($login, $password)) {
                redirect(site_url('admin-1000'));
            } else {
                $this->session->set_flashdata('wrong_login', true);
            }
        }
        $this->admin_view_load->view('admin/admin_login_view');
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin-1000'));
    }
    
    

}
