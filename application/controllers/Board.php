<?php

class Board extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');
        $data = [];

        if (!empty($this->input->post('btn_submit')))
        {
            // POST値の取得
            $post_arr = $this->input->post();
            var_dump($this->input->post());
            var_dump($post_arr['view_name']);   // 表示名
            var_dump($post_arr['message']);     // メッセージ

            // POST値のバリデーションルールセット
            $this->form_validation->set_rules('view_name', '表示名', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('message', 'メッセージ', 'required|min_length[1]|max_length[20]');

            // バリデーション実施
            if ($this->form_validation->run())
            {
                $data['create'] = true;
                $data["success_message"] = "入力値OKです";
            }
            else
            {
                $data['create'] = false;
                $data["fail_message"] = "入力値を確認してください";
            }
        }

        var_dump($data);

        // 画面描画
        $this->load->view('board', $data);
    }
}