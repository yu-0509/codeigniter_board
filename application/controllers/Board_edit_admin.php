<?php

class Board_edit_admin extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('message_model');
        $this->load->library('form_validation');

        if ($this->session->has_userdata('login_admin') !== true)
        {
            // 未ログインの場合はログイン画面に遷移
            redirect('/codeigniter/public/login_admin');
        }

        if (!empty($this->input->post('board_edit_show')))
        {
            //POST値取得
            $post_arr = $this->input->post();

            // 編集データ取得
            $data = $this->message_model->read($post_arr['message_id']);

            // 編集画面描画
            $this->load->view('board_edit_admin', $data[0]);
        }
        elseif (!empty($this->input->post('btn_submit')))
        {
            // POST値の取得
            $post_arr = $this->input->post();

            // POST値のバリデーションルールセット
            $this->form_validation->set_rules('message_id', 'id', 'required');
            $this->form_validation->set_rules('view_name', '表示名', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('message', 'メッセージ', 'required|min_length[1]|max_length[20]');

            if ($this->form_validation->run())
            {
                // 更新データ準備
                $data = [
                    'view_name' => $post_arr['view_name'],
                    'message' => $post_arr['message'],
                ];

                // DB更新
                $this->message_model->update($post_arr['message_id'], $data);

                // 一覧画面に遷移
                redirect('/codeigniter/public/board_admin');
            }
            else
            {
                // TODO エラー表示
                $data['update'] = false;
                $data["fail_message"] = "更新に失敗しました。入力値を確認してください。";


                // 再描画用の値をセット
                $data['view_name'] = $post_arr['view_name'];
                $data['message'] = $post_arr['message'];
                $data['id'] = $post_arr['message_id'];

                // 編集画面再描画
                $this->load->view('board_edit_admin', $data);
            }
        }
    }
}