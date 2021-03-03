<?php

class Login_admin extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('message_model');
        $this->load->library('form_validation');
        $data = [];

        if (!empty($this->input->post('btn_submit')))
        {
            // POST値の取得
            $post_arr = $this->input->post();

            // sessionに表示名保存
            $this->session->set_userdata('user_name', $post_arr['user_name']);

            var_dump($this->input->post());

            // POST値のバリデーションルールセット
            $this->form_validation->set_rules('user_name', 'ユーザ名', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('admin_password', 'パスワード', 'required|min_length[1]|max_length[20]');

            // バリデーション実施
            if ($this->form_validation->run())
            {
                // sessionにログイン状態保存
                $this->session->set_userdata('login_admin', true);

                // 管理画面に遷移
                redirect('/codeigniter/public/board_admin');
            }
            else
            {
                // エラー
                $data['login'] = false;
                $data["fail_message"] = "ログインに失敗しました。";

                // ログイン画面再描画
                return $this->load->view('login_admin', $data);
            }
        }
        else
        {
            // ログイン画面描画
            return $this->load->view('login_admin', $data);
        }
    }
}