<?php 

/*
/controllers
   Tiktok_automation.php (เพิ่ม Analytics และ Account Management)
/models
   Tiktok_model.php (เพิ่มฟังก์ชัน Analytics)
/views/tiktok/
   analytics_view.php
   account_management_view.php


/controllers
   Tiktok_automation.php
/views/tiktok/
   dashboard_view.php
   auto_post_view.php
   auto_reply_view.php
   analytics_view.php
/models
   Tiktok_model.php



CREATE TABLE `tiktok_accounts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `access_token` text NOT NULL,
    `refresh_token` text NOT NULL,
    `expires_in` int(11) NOT NULL,
    `user_id_tiktok` varchar(255) NOT NULL,
    `added_at` datetime NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `tiktok_auto_replies` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `video_id` varchar(255) NOT NULL,
    `reply_text` text NOT NULL,
    `created_at` datetime NOT NULL,
    PRIMARY KEY (`id`)
);


CREATE TABLE `tiktok_analytics` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `video_title` varchar(255) NOT NULL,
    `views` int(11) NOT NULL,
    `likes` int(11) NOT NULL,
    `comments` int(11) NOT NULL,
    PRIMARY KEY (`id`)
);


*/

require_once("Home.php");

class Tiktok_automation extends Home
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != 1) {
            redirect('home/login_page', 'location');
        }

        $this->load->library("Tiktok_api"); // TikTok API Library
        $this->load->model("Tiktok_model");
        $this->member_validity();
    }

    public function dashboard()
    {
        $data['page_title'] = "TikTok Dashboard";
        $data['account_list'] = $this->Tiktok_model->get_connected_accounts($this->user_id);
        $data['body'] = "tiktok/dashboard_view";
        $this->_viewcontroller($data);
    }

    public function connect_account()
    {
        // Redirect to TikTok API for authorization
        $auth_url = $this->tiktok_api->get_auth_url();
        redirect($auth_url);
    }

    public function callback()
    {
        $auth_code = $this->input->get("code");
        $response = $this->tiktok_api->get_access_token($auth_code);

        if (isset($response['access_token'])) {
            $this->Tiktok_model->save_account($this->user_id, $response);
            $this->session->set_flashdata("success", "TikTok account connected successfully.");
        } else {
            $this->session->set_flashdata("error", "Failed to connect TikTok account.");
        }

        redirect("tiktok_automation/dashboard");
    }
}

public function analytics()
{
    $data['page_title'] = "TikTok Analytics";
    $data['body'] = "tiktok/analytics_view";

    // ดึงข้อมูลสถิติจากฐานข้อมูลหรือ TikTok API
    $data['analytics_data'] = $this->Tiktok_model->get_analytics_data($this->user_id);

    $this->_viewcontroller($data);
}



public function account_management()
{
    $data['page_title'] = "TikTok Account Management";
    $data['body'] = "tiktok/account_management_view";

    // ดึงบัญชี TikTok ทั้งหมดของผู้ใช้
    $data['accounts'] = $this->Tiktok_model->get_user_accounts($this->user_id);

    $this->_viewcontroller($data);
}

public function delete_account($account_id)
{
    $this->Tiktok_model->delete_account($account_id);
    $this->session->set_flashdata('success', 'Account deleted successfully.');
    redirect('tiktok_automation/account_management');
}



public function analytics()
{
    $data['page_title'] = "TikTok Analytics";
    $data['body'] = "tiktok/analytics_view";

    // ดึงข้อมูลสถิติจากฐานข้อมูลหรือ TikTok API
    $data['analytics_data'] = $this->Tiktok_model->get_analytics_data($this->user_id);

    $this->_viewcontroller($data);
}

public function account_management()
{
    $data['page_title'] = "TikTok Account Management";
    $data['body'] = "tiktok/account_management_view";

    // ดึงบัญชี TikTok ทั้งหมดของผู้ใช้
    $data['accounts'] = $this->Tiktok_model->get_user_accounts($this->user_id);

    $this->_viewcontroller($data);
}

public function delete_account($account_id)
{
    $this->Tiktok_model->delete_account($account_id);
    $this->session->set_flashdata('success', 'Account deleted successfully.');
    redirect('tiktok_automation/account_management');
}