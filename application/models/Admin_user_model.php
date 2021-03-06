<?php

class Admin_user_model extends CI_Model
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
    public function create($user)
    {
        $data = [
            'name' => $user['name'],
            'mail'   => $user['mail'],
            'password' => $user['password'],
            'create_date' => date('Y-m-d H:i:s'),
            'update_date' => date('Y-m-d H:i:s'),
        ];

        $result = $this->db->insert('admin_user', $data);

        if (!$result)
        {
            return null;
        }

        return $this->db->insert_id();
    }

    /**
     * データ読み出し
     *
     * @return void
     */
    public function read_message()
    {
        $query = $this->db->get('admin_user');

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
    public function readbymail($mail)
    {
        $query = $this->db->where('mail', $mail)->get('admin_user');

        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result[0];
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
        $this->db->update('admin_user', $data);
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
        $this->db->delete('admin_user');
    }
}
