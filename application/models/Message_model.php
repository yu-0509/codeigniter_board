<?php

class Message_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * データ登録
     *
     * @param [type] $message
     * @return void
     */
    public function create($message)
    {
        $data = [
            'view_name' => $message['view_name'],
            'message'   => $message['message'],
            'post_date' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('message', $data);
    }

    /**
     * データ読み出し
     *
     * @return void
     */
    public function read()
    {
        $query = $this->db->get('message');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return [];
        }
    }
}