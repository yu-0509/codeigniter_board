<?php

class Board extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $this->load->model('message_model');
        $this->load->library('form_validation');
        $data = [];

        if (!empty($this->input->post('btn_submit')))
        {
            // POST値の取得
            $post_arr = $this->input->post();

            // sessionに表示名保存
            $this->session->set_userdata('view_name', $post_arr['view_name']);

            // var_dump($this->input->post());
            // var_dump($post_arr['view_name']);   // 表示名
            // var_dump($post_arr['message']);     // メッセージ

            // POST値のバリデーションルールセット
            $this->form_validation->set_rules('view_name', '表示名', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('message', 'メッセージ', 'required|min_length[1]|max_length[20]');

            // バリデーション実施
            if ($this->form_validation->run())
            {
                // DB登録
                $this->message_model->create($post_arr);

                // 登録後処理
                $data['create'] = true;
                $data["success_message"] = "登録が完了しました。";
            }
            else
            {
                // エラー
                $data['create'] = false;
                $data["fail_message"] = "登録に失敗しました。入力値を確認してください。";
            }
        }

        if ($this->session->has_userdata('view_name'))
        {
            $data['view_data'] = $this->session->userdata('view_name');
        }

        $data['message_list'] = $this->message_model->read_message();

        // var_dump($data);

        // 画面描画
        $this->load->view('board', $data);
    }
}