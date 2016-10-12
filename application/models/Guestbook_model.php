<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Guestbook_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    /**
     * Set rules for message form
     * @return array
     */
    public function set_rules_for_guestbook()
    {
        $rules_data = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'trim|required|min_length[3]|max_length[255]|strip_tags|htmlspecialchars'
            ),
            array(
                'field' => 'message',
                'label' => 'Message',
                'rules' => 'trim|required|min_length[6]|strip_tags|htmlspecialchars'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|max_length[255]|valid_email'
            ),           
        );
        return $rules_data;
    }

    /**
     * @param $data
     * Add new message into guestbook table
     */
    public function add_message($data)
    {
        $this->db->insert('guestbook', $data);
    }

    /**
     * @return mixed
     * Get all messages from guestbook table
     */
    public function all_messages($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('id', 'desc')->get('guestbook');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

    }

    /**
     * @return mixed
     * Get all messages from guestbook table
     */
    public function all_messages_count()
    {
        return $this->db->count_all_results('guestbook');
    }
    
}