<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guestbook_model');
    }

    public function index()
    {
        $this->load->helper("url");
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $rules = $this->guestbook_model->set_rules_for_guestbook();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()) {
            $data = array(
                'name' =>  $this->input->post('name', true),
                'message' =>  $this->input->post('message', true),
                'email' =>  $this->input->post('email', true),
                'parent_id' =>  $this->input->post('parent', true),
                'ip' => $this->input->ip_address(),
            );
            $this->guestbook_model->add_message($data);
            $this->session->set_flashdata('message_added', true);             
            redirect(base_url());
        }
        $this->load->model('pagination_model');
        $config = $this->pagination_model->pagination();
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->guestbook_model->all_messages_count();

        $this->pagination->initialize($config);


        $page = $this->input->get('per_page');
        $messages = $this->guestbook_model->all_messages($config["per_page"], $page);
        $reply_messages = $this->guestbook_model->reply_messages();
        $pagination = $this->pagination->create_links();
        $this->view_load->view('guestbook_view', compact('messages', 'reply_messages', 'pagination'));
    }
}
