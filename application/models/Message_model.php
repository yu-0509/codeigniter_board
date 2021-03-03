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
    public function read_message()
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

    /**
     * 1データ読み出し
     *
     * @return void
     */
    public function read($id)
    {
        $query = $this->db->where('id', $id)->get('message');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return [];
        }
    }

    /**
     * データ更新
     *
     * @param [type] $id
     * @param [type] $data
     * @return void
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('message', $data);
    }

    /**
     * データ削除
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('message');
    }
}