<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    private function get_secure_pass($password) {
        $salt = 'secure_salt';
        $salt = md5($salt.$password).sha1($salt.$password);
        $password = password_hash($password, PASSWORD_BCRYPT, array('salt' => $salt));
        return $password;
    }


    public function set_rules_for_new_admin()
    {
        $rules_data = array(
            array(
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'trim|required|max_length[255]|strip_tags|htmlspecialchars'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|strip_tags|htmlspecialchars'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|max_length[255]|valid_email'
            ),

        );
        return $rules_data;
    }

    public function all_admins_count()
    {
        return $this->db->count_all_results('admins');
    }

    
    public function get_admins($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('id', 'desc')->get('admins');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function add_admin($data) {
        $data['password'] = $this->get_secure_pass($data['password']);
        $this->db->insert('admins', $data);
    }


    public function del_admin($admin_id) {
        $admin_id = abs((int)$admin_id);
        if($admin_id) {
            $this->db->delete('admins', array('id' => $admin_id));
        }
    }
    public  function get_admin($admin_id){
        $admin_id = abs((int)$admin_id);
        if($admin_id) {
            $query =  $this->db->get_where('admins', array('id' => $admin_id));
            if($query->num_rows())
                return $query->row_array();
            return false;
        }
    }

    public function check_admin_exist($admin_id, $where = null) {
        $where['id'] = $admin_id;
        $query = $this->db->get_where('admins', $where);
        if($query->num_rows())
            return $query->row_array();
        return false;
    }

    public function update_admin($admin_id, $data){
        $this->db->where('id', $admin_id);
        $this->db->update('admins', $data);
    }

    public function search_messges($where){
        if($where['name'])
            $this->db->like('name',$where['name']);

        if($where['message'])
            $this->db->like('message', $where['message']);

        if($where['email'])
            $this->db->like('email', $where['email']);

        if($where['ip'])
            $this->db->like('ip', $where['ip']);

        if($where['id'])
            $this->db->where('id', $where['id']);

        if($where['added_from'])
            $this->db->where('added >=', $where['added_from']);

        if($where['added_to'])
            $this->db->where('added <=', $where['added_to']);

    }

    
    public function all_messages_count($where)
    {
        $this->search_messges($where);
        return $this->db->count_all_results('guestbook');
    }

    public function get_messages($limit, $start, $where) {
        $this->db->limit($limit, $start);
        $this->search_messges($where);

        $query = $this->db->order_by('id', 'desc')->get('guestbook');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public  function get_message($message_id){
        $message_id = abs((int)$message_id);
        if($message_id) {
            $query =  $this->db->get_where('guestbook', array('id' => $message_id));
            if($query->num_rows())
                return $query->row_array();
            return false;
        }
    }
    public function del_message($message_id) {
        $message_id = abs((int)$message_id);
        if($message_id) {
            $this->db->delete('guestbook', array('id' => $message_id));
        }
    }

    public function check_message_exist($message_id, $where = null) {
        $where['id'] = $message_id;
        $query = $this->db->get_where('guestbook', $where);
        if($query->num_rows())
            return $query->row_array();
        return false;
    }

    public function update_message($message_id, $data){
        $this->db->where('id', $message_id);
        $this->db->update('guestbook', $data);
    }



}