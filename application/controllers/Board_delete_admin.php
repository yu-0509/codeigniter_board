<?php

class Board_delete_admin extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('message_model');
        $this->load->library('form_validation');
        $data = [];

        if ($this->session->has_userdata('login_admin') !== true)
        {
            // 未ログインの場合はログイン画面に遷移
            redirect('/codeigniter/public/login_admin');
        }

        if (!empty($this->input->post('board_delete_show')))
        {
            // POST値取得
            $post_arr = $this->input->post();

            // 削除データ取得
            $data = $this->message_model->read($post_arr['message_id']);

            // sessionに表示データ保存
            $this->session->set_userdata(
                array(
                    "message_id" => $data[0]['id'],
                    "view_name" => $data[0]['view_name'],
                    "message" => $data[0]['message'],
                    )
            );

            // 削除画面描画
            $this->load->view('board_delete_admin', $data[0]);
        }
        elseif (!empty($this->input->post('btn_submit')))
        {
            // POST値の取得
            $post_arr = $this->input->post();

            // POST値のバリデーションルールセット
            $this->form_validation->set_rules('message_id', 'id', 'required');

            if ($this->form_validation->run())
            {
                // DBデータ削除
                $this->message_model->delete($post_arr['message_id']);

                // sessionより、描画用の値を削除
                $this->session->unset_userdata(array(
                    "message_id" => "",
                    "view_name" => "",
                    "message" => "",
                    )
                );

                // 一覧画面に遷移
                redirect('/codeigniter/public/board_admin');
            }
            else
            {
                // エラー表示
                $data['delete'] = false;
                $data["fail_message"] = "削除に失敗しました。";

                // 再描画用の値をセット
                $data['view_name'] = $this->session->userdata('view_name');
                $data['message'] = $this->session->userdata('message');
                $data['id'] = $this->session->userdata('message_id');

                // 削除画面再描画
                $this->load->view('board_delete_admin', $data);
            }
        }
    }
}