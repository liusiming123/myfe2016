<?php
/**
 * Created by PhpStorm.
 * User: 韩小毛
 * Date: 2017/4/21
 * Time: 20:16
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("user_model");
        $this->load->model("seller_model");
    }
    public function index()
    {
        $sellerId =  $this->session->userdata('userinfo')->seller_id;
        $row = $this -> seller_model -> get_by_snack($sellerId);
        $this->load->view('seller_index',array(
            'snacks'=>$row
        ));
    }
    public function information()
    {

        if($this->session->userdata('userinfo')){
            $sellerId =  $this->session->userdata('userinfo')->seller_id;
            $row = $this -> seller_model -> get_by_snack($sellerId);
            $this->load->view('seller_infor',array(
                'snacks'=>$row
            ));
        }
    }
    public function add_snack()
    {
        $this->load->view('add_snack');
    }
    //卖家注册
    public function reg_seller()
    {

        $name = $this -> input ->get("realname");
        $id = $this -> input ->get("id");
        $password = $this -> input ->get("sellPassword");
        $sellTel = $this -> input -> get("sellTel");
        $rows = $this -> seller_model -> save_seller($name,$id,$sellTel,$password);
        if($rows>0){
            echo "success";
        }else{
            echo "fail";
        }
    }
    //验证卖家用户名是否可用
    public function check_realname()
    {
        $realname = $this -> input -> get('realname');
        $realname = $this -> seller_model -> get_by_realname($realname);
        if($realname){
            echo "fail";
        }else {
            echo "success";
        }
    }
    //卖家更新各种信息
    public function seller()
    {
        $sellerId =  $this->session->userdata('userinfo')->seller_id;
        $files = $this -> input -> post('files');
        $selName = $this-> input -> post('sel-name');
        $selDescribe = $this-> input -> post('sel-describe');
        $tel = $this-> input -> post('tel');
        $sex = $this-> input -> post('sex');
        $year = $this-> input -> post('year');
        $month = $this-> input -> post('month');
        $day = $this-> input -> post('day');
        $email = $this-> input -> post('email');
        $birth = $year.'-'.$month.'-'.$day;
        $rows = $this -> seller_model -> update_seller($sellerId,$files,$selName,$selDescribe,$tel,$sex,$birth,$email);
        $row = $this -> seller_model -> get_by_seller($sellerId);
        if($rows){
            $this -> session -> set_userdata(array(
                "userinfo" => $row
            ));
            redirect("seller/information");
        }else{
            echo "修改失败";
        }
    }
    //卖家上传商品
    public function add_goods()
    {
        $config['upload_path'] = './uploads/';//上传图片的路径
        $config['allowed_types'] = 'gif|jpg|png';//上传图片的类型
//        $config['file_name']=data('YmdHis').'_'.rand(10000.99999);//文件名，因为文件名有可能重复。
        $config['max_size'] = '30760';//最大大小，以kb为单位
        $config['max_width'] = '10200';//最大宽度
        $config['max_height'] = '7680';//最大高度
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {
            $upload_data = $this->upload->data();
            $photo = 'uploads/' . $upload_data['raw_name'] . $upload_data['file_ext'];
            $sellerId =  $this->session->userdata('userinfo')->seller_id;
//          $photo = $this -> input ->post("userfile");
            $snName = $this -> input ->post("sn-name");
            $snType = $this -> input ->post("sn-type");
            $snImport = $this -> input -> post("sn-import");
            $price = $this -> input -> post("price");
            $memberPrice = $this -> input -> post("member_price");
            $snDescribe = $this -> input -> post("sn_describe");

            $rows = $this -> seller_model -> save_snack($snName,$sellerId,$photo,$snType,$snImport,$price,$memberPrice,$snDescribe);
            if($rows>0){
            redirect('seller/information');
//                echo 'li';
            }else{
                echo "fail";
            }
        }


    }


//判断密码是否正确
    public function check_password()
    {
        $sellerId =  $this->session->userdata('userinfo')->seller_id;
        $password = $this -> input -> get('password');
        $row = $this -> seller_model -> get_by_password($sellerId,$password);
        if($row){
            echo "success";
        }else {
            echo "fail";
        }
    }
    //更改密码
    public function change_password()
    {
        $sellerId =  $this->session->userdata('userinfo')->seller_id;
        $password = $this -> input -> get('password');
        $rows = $this -> seller_model -> update_password($sellerId,$password);
        if($rows){
            redirect("user/login");
        }else{
            redirect("user/information");
        }
    }










}