<?php

class View extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('message_model');
        $this->load->library('form_validation');
        $data = [];

        if (!empty($this->input->post('btn_logout')) 
            || empty($this->session->userdata('login_admin')))
        {
            // session破棄
            $this->session->sess_destroy();

            // ログイン画面に遷移
            redirect('/codeigniter/public/admin/login/login');
        }

        // DBデータ取得
        $data['message_list'] = $this->message_model->read_message();

        // 一覧画面描画
        $this->load->view('admin/board/view', $data);
    }
}