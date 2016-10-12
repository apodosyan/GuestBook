<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    /**
     * Set rules for Admin form
     * @return array
     */
    public function set_rules_for_login()
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

        );
        return $rules_data;
    }

    private function get_secure_pass($password) {
        $salt = 'secure_salt';
        $salt = md5($salt.$password).sha1($salt.$password);
        $password = password_hash($password, PASSWORD_BCRYPT, array('salt' => $salt));
        return $password;
    }

    public function login_admin($login, $password) {
        $password = $this->get_secure_pass($password);
        $this->db->where(array('username'=>$login, 'password'=>$password));
        $query = $this->db->get('admins');
        if($query->num_rows()>0) {
            $admin = $query->row();
            unset($admin->password);
            $this->session->set_userdata('admin', $admin);
            $this->session->set_userdata('admin_logged', 'guestbook_admin');
            return true;
        }
        return false;
    }

    
}