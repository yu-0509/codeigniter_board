<?php

class Board_admin extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('message_model');
        $this->load->library('form_validation');
        $data = [];

        if (!empty($this->input->post('btn_logout')))
        {
            // session破棄
            $this->session->sess_destroy();

            // ログイン画面に遷移
            redirect('/codeigniter/public/login_admin');
        }

        if (!empty($this->input->post('btn_submit')))
        {
            // POST値の取得
            $post_arr = $this->input->post();

            // sessionに表示名保存
            $this->session->set_userdata('view_name', $post_arr['view_name']);

            // var_dump($this->input->post());
            // var_dump($post_arr['view_name']);   // 表示名
            // var_dump($post_arr['message']);     // メッセージ
        }

        if ($this->session->has_userdata('view_name'))
        {
            $data['view_data'] = $this->session->userdata('view_name');
        }

        $data['message_list'] = $this->message_model->read_message();

        // var_dump($data);

        // 画面描画
        $this->load->view('board_admin', $data);
    }
}