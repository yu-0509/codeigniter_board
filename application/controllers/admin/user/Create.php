<?php

class Create extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin_user_model');
        $this->load->library('form_validation');
        $data = [];

        if (!empty($this->input->post('btn_submit')))
        {
            // POST値の取得
            $post_arr = $this->input->post();

            // POST値のバリデーションルールセット
            $this->form_validation->set_rules('name', '名前', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('mail', 'メールアドレス', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('admin_password', 'パスワード', 'required|min_length[1]|max_length[20]');

            if ($this->form_validation->run())
            {
                // 登録データ準備
                $data = [
                    'name' => $post_arr['name'],
                    'mail'   => $post_arr['mail'],
                    'password' => $post_arr['admin_password'],
                ];

                // DB登録
                $result = $this->admin_user_model->create($data);

                if ($result !== null)
                {
                    $data = [
                        'create' => true,
                        'success_message' => "登録しました。",
                    ];
                }
                else
                {
                    $data = [
                        'create' => false,
                        'fail_message' => "入力値を確認してください。",
                    ];
                }

                // ユーザ登録画面描画
                return $this->load->view('admin/user/create', $data);
            }
            else
            {
                $data = [
                    'create' => false,
                    'fail_message' => "入力値を確認してください。",
                ];
            }

            // ユーザ登録画面描画
            return $this->load->view('admin/user/create', $data);
        }
        else
        {
            // ユーザ登録画面描画
            return $this->load->view('admin/user/create');
        }
    }

}