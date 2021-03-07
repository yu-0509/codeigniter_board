<?php

class Login extends CI_Controller
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
            // var_dump($post_arr);

            // POST値のバリデーションルールセット
            $this->form_validation->set_rules('mail', 'メール', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('admin_password', 'パスワード', 'required|min_length[1]|max_length[20]');

            // バリデーション実施
            if (!$this->form_validation->run())
            {
                // 【エラー】ログイン画面再描画
                return $this->load->view('admin/login/login', $this->getLoginFailedInfo());
            }

            // ログインデータ取得
            $admin_data = $this->admin_user_model->readbymail($post_arr['mail']);

            if ($admin_data === [])
            {
                // 【エラー】ログイン画面再描画
                return $this->load->view('admin/login/login', $this->getLoginFailedInfo());
            }

            // var_dump($admin_data);

            if (password_verify($post_arr['admin_password'], $admin_data['password']))
            {
                // sessionにログイン状態保存
                $this->session->set_userdata('login_admin', true);

                // 管理画面に遷移
                return redirect('/codeigniter/public/admin/board/view');
            }
            else
            {
                // 【エラー】ログイン画面再描画
                return $this->load->view('admin/login/login', $this->getLoginFailedInfo());
            }
        }
        else
        {
            // ログイン画面描画
            return $this->load->view('admin/login/login', $data);
        }
    }

    /**
     * ログイン失敗時のパラメータを取得
     *
     * @return array
     */
    private function getLoginFailedInfo()
    {
        $failed = [];

        $failed = [
            'login' => false,
            'fail_message' => "ログインに失敗しました。",
        ];

        return $failed;
    }
}