<?php

class Tiktok_model extends CI_Model
{
    public function get_connected_accounts($user_id)
    {
        return $this->db->get_where("tiktok_accounts", ["user_id" => $user_id])->result_array();
    }

    public function save_account($user_id, $account_data)
    {
        $data = [
            "user_id" => $user_id,
            "access_token" => $account_data['access_token'],
            "refresh_token" => $account_data['refresh_token'],
            "expires_in" => $account_data['expires_in'],
            "user_id_tiktok" => $account_data['open_id'],
            "added_at" => date("Y-m-d H:i:s")
        ];
        $this->db->insert("tiktok_accounts", $data);
    }
}